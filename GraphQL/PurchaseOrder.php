<?php
require_once ('config/Config.php');
require_once ('ModelGraphQLX3.php');
require_once ('tools-api/ToolsWS.php');
require_once ('tools-api/consolePHP.php');
class PurchaseOrder extends ModelGraphQLX3 {
	function showOneDetailOrder($_id) {
		$queryGraphQL=$this->readFileGraphQl('PurchaseOrder_read.graphql');
		
		$vars  ='';
		$vars .='{';
		$vars .='  "id": "'.$_id.'"';
		$vars .='  }';
		$response=$this->query($queryGraphQL,$vars);
		//console_php_log('GraphQL response',$response);
		$json=json_decode($response);

		
		$read = $json->{'data'}->{'x3Purchasing'}->{'purchaseOrder'}->{'read'};
        

		if (is_null($read)) {
			return ToolsWS::getSucces ( "No result" );
		}
		$str = "";
		// header
		$str .= "<div class='row'>";

		$str .= "<div class=' hidden col-lg-3 col-md-2 col-sm-1'>";			
		$str .= "<label class='control-label' for='ordnum'>Order number</label>";
		$str .= "<input class='form-control' type='text' id='ordnum' placeholder='";
		$str .= $_id;
		$str .= "' disabled >";
		//$str .="<div class='hidden' id='sohnum'>";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='formpurshasesite'>Purchase site</label>";
		$str .= "<input class='form-control' name='formpurshasesite' type='text' placeholder='' value='";
		$str .= $read->{'purchaseSite'}->{'_id'};// - ".$read->{'purchaseSite'}->{'name'};
		$str .= "' readonly >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='formsupplier'>Supplier</label>";
		$str .= "<input class='form-control' name='formsupplier' type='text' placeholder='' value='";
		// #5 : With the version X3 2022R3, crash menu X3 PURCHASING / LIST OF ORDERS
		$str .= $read->{'orderFromSupplier'}->{'code'}->{'code'};
		$str .= "' readonly >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='disabledInput'>Internal Order Reference</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'internalOrderReference'};
		$str .= "' disabled >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='disabledInput'>Receipt status</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'receiptStatus'};
		$str .= "' disabled >";
		$str .= "</div>";

		$str .= "</div>";
		$str .= "<br/>";

		// Lines
		$str .= "<table class='table table-striped table-bordered table-condensed'>";
		$str .= "<thead><tr><th>Line number</th><th>Product</th><th>Description</th><th>Quantity order</th><th>Quantity received</th><th>Order unit</th><th>Quantity to receive</th></tr></thead><tbody>";
		$edges = $read->{'purchaseOrderLines'}->{'query'}->{'edges'};
		foreach ( $edges as $edge ) {
			$str .= "<tr>";

			$str .= "<td>";
			$str .= '<input type="text" class="form-control" name="formtablinenumber[]" value="';
			$str .= $edge->{'node'}->{'lineNumber'};
			$str .= '" readonly>';
			$str .= "</td>";
			
			$str .= "<td>";
			$str .= '<input type="text" class="form-control" name="formtabproduct[]" value="';
			$str .= $edge->{'node'}->{'product'}->{'code'};
			$str .= '" readonly>';
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'product'}->{'description1'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'quantityInOrderUnitOrdered'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'quantityInStockUnitReceived'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= '<input type="text" class="form-control" name="formtaborderunit[]" value="';
			$str .= $edge->{'node'}->{'orderUnit'}->{'code'};
			$str .= '" readonly>';
			$str .= "</td>";
			
			// enter quantity
			$str .= "<td>";
			$str .= '<input type="text" class="form-control" name="formtabqtytoreceive[]" placeholder="0" value="0">';
			$str .= "</td>";

			$str .= "</tr>";
		}
		$str .= "</tbody></table>";
		$str .= "</div>";

		return $str;
	}
	function showOneListRecept($_id) {
		$queryGraphQL=$this->readFileGraphQl('PurchaseReceipt_query.graphql',true);
		
		$vars  ='';
		$vars .='{';
		#$vars .='"filter": "{lines:{_every:true,purchaseOrder:\''.$_id.'\'}}",';
		#$vars .='"filter": "{lines:{_every:true,purchaseOrderNumber:\''.$_id.'\'}}",';
		$vars .='"filter": "{purchaseOrder:{_id:\''.$_id.'\'}}",';
		$vars .='"orderBy":"{_id:-1}"';
		$vars .='  }';
		$response=$this->query($queryGraphQL,$vars);
		$json=json_decode($response);

		$query = $json->{'data'}->{'x3Purchasing'}->{'purchaseReceiptLine'}->{'query'};
        
		$str = "";
		
		// Lines
		$str .= "<table class='table table-striped table-bordered table-condensed'>";
		$str .= "<thead><tr><th>Receipt date</th><th>Receipt</th><th>Receipt site</th><th>Supplier</th></tr></thead><tbody>";
		$edges = $query->{'edges'};
		foreach ( $edges as $edge ) {
			$str .= "<tr>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'receiptDate'};
			$str .= "</td>";

			$str .= "<td>";
			$val= $edge->{'node'}->{'_id'};
			$str .= '<a href="page_pth_gq_read.php?_id='.$val.'">'.$val.'</a>';
			$str .= "</td>";
			
			$str .= "<td>";
			$str .= $edge->{'node'}->{'receiptSite'}->{'_id'}." - ".$edge->{'node'}->{'receiptSite'}->{'name'};
			
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'supplier'}->{'_id'};
			$str .= "</td>";

			$str .= "</tr>";
		}
		$str .= "</tbody></table>";
		$str .= "</div>";

		return $str;
	}
	
	function showList( $businessPartnerId='', $purchaseSite='', $receiptStatus='' ) {
		
		$first = 50;

		$queryGraphQL=$this->readFileGraphQl('PurchaseOrder_query.graphql',true);
		
		$filterBusinessPartnerId='{}';
		if ($businessPartnerId!='') {
		 $filterBusinessPartnerId='{_id:\''.$businessPartnerId.'\'}';
		}
		
		$filterPurchaseSite='{}';
		if ($purchaseSite!='') {
		 $filterPurchaseSite='{_id:\''.$purchaseSite.'\'}';
		}
		$filterReceiptStatus='{}';
		if ($receiptStatus!='') {
		 $filterReceiptStatus='{receiptStatus:\''.$receiptStatus.'\'}';
		}
		
		
		$vars  ='';
		$vars .='{';
		$vars .='"first": '.$first.',';
		$vars .='"filter": "[{orderFromSupplier:'.$filterBusinessPartnerId.'},{purchaseSite:'.$filterPurchaseSite.'},'.$filterReceiptStatus.']",';
		$vars .='"orderBy":"{purchaseSite:{_id:-1},_id:-1}"';
		$vars .='  }';
		$response=$this->query($queryGraphQL,$vars);
		//var_dump($response);
		//console.log("$response",$response);
		$json=json_decode($response);
		//var_dump($json);

		$edges = $json->{'data'}->{'x3Purchasing'}->{'purchaseOrder'}->{'query'}->{'edges'};
		$str = "<table class='table table-striped table-bordered table-condensed'>";
		$str .= "<thead><tr><th>Order number</th><th>Site</th><th>Supplier</th><th>Internal order reference</th><th>Receipt status</th><th>Signature status</th><th>Is closed</th></tr></thead><tbody>";
	
		$node="";
		$bool;
		foreach ( $edges as $edge ) {
			$node= $edge->{'node'};
			$str .= "<tr>";

			$str .= "<td>";
			$str .= "<a href='page_poh_gq_read.php?_id=".$node->{'_id'}."'>";
			$str .= $node->{'_id'};
			$str .= "</a>";
			$str .= "</td>";
	
			$str .= "<td>". $node->{'purchaseSite'}->{'_id'} ." - ".$node->{'purchaseSite'}->{'name'}."</td>";
			// #5 : With the version X3 2022R3, crash menu X3 PURCHASING / LIST OF ORDERS
			$str .= "<td>". $node->{'orderFromSupplier'}->{'code'}->{'code'}."</td>";
			$str .= "<td>". $node->{'internalOrderReference'}."</td>";
			$str .= "<td>". $node->{'receiptStatus'}."</td>";
			$str .= "<td>". $node->{'signatureStatus'}."</td>";
			$bool = ($node->{'isClosed'}) ? 'True' : 'False';
			$str .= "<td>". $bool."</td>";

			$str .= "</tr>";
}
			//$response = $edges[0]->{'node'}->{'_id'};
			$str .= "</tbody></table>";
			return $str;

	}
	
	}

 ?>
