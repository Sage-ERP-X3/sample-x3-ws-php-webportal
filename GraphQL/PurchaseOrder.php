<?php
require_once ('config/Config.php');
require_once ('ModelGraphQLX3.php');

class PurchaseOrder extends ModelGraphQLX3 {
	function showOne($_id) {
		$queryGraphQL=$this->readFileGraphQl('PurchaseOrder_read.graphql');
		$queryGraphQL=str_replace("%<_id>%",$_id,$queryGraphQL);
		//echo($queryGraphQL);
		$response=$this->query($queryGraphQL);
		$json=json_decode($response);

		//var_dump($json);
		$read = $json->{'data'}->{'xtremX3Purchasing'}->{'purchaseOrder'}->{'read'};
        
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
		$str .= "<label class='control-label' for='disabledInput'>Purchase site</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'purchaseSite'}->{'_id'}." - ".$read->{'purchaseSite'}->{'name'};
		$str .= "' disabled >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='disabledInput'>Supplier</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'orderFromSupplier'}->{'code'}." - ".$read->{'purchaseSite'}->{'name'};
		$str .= "' disabled >";
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
		$str .= "<thead><tr><th>Line number</th><th>Product</th><th>Description</th><th>Quantity order</th><th>Quantity received</th><th>Order unit</th></tr></thead><tbody>";
		$edges = $read->{'purchaseOrderQuantityLines'}->{'query'}->{'edges'};
		foreach ( $edges as $edge ) {
			$str .= "<tr>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'lineNumber'};
			$str .= "</td>";
			
			$str .= "<td>";
			$str .= $edge->{'node'}->{'product'}->{'code'};
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
			$str .= $edge->{'node'}->{'orderUnit'}->{'code'};
			$str .= "</td>";
			
			$str .= "</tr>";
		}
		$str .= "</tbody></table>";
		$str .= "</div>";

		return $str;
	}
	
	function showList( $businessPartnerId='', $receiptStatus='' ) {
		
		$queryGraphQL=$this->readFileGraphQl('PurchaseOrder_query.graphql');
		$filterBusinessPartnerId='{}';
		
		if ($businessPartnerId!='') {
		 $filterBusinessPartnerId='{_id:\''.$businessPartnerId.'\'}';
		}
		$filterReceiptStatus='{}';
		
		if ($receiptStatus!='') {
		 $filterReceiptStatus='{receiptStatus:\''.$receiptStatus.'\'}';
		}
		
		$queryGraphQL=(str_replace("%<orderFromSupplier>%",$filterBusinessPartnerId,$queryGraphQL));
		$queryGraphQL=(str_replace("%<receiptStatus>%",$filterReceiptStatus,$queryGraphQL));
		
		$response=$this->query($queryGraphQL);
		$json=json_decode($response);

		//var_dump($json);
		$edges = $json->{'data'}->{'xtremX3Purchasing'}->{'purchaseOrder'}->{'query'}->{'edges'};
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
			$str .= "<td>". $node->{'orderFromSupplier'}->{'code'}."</td>";
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
	
	function create($WS) {
		$this->CAdxResultXml = $this->save ( Config::$WS_ORDER, $WS );
		$adxResultXml = $this->CAdxResultXml;
		$ret="";
		$messages = array();
		$status = $adxResultXml->status;
		if ($status == 1) {
			$ret.=ToolsWS::getSucces('Order created');
			//return $ret;
			// echo "order créée<BR/>";
		} else {
			$ret.=ToolsWS::getError('Order not created');
			//return $ret;
			// echo "Erreur, commande non créée<BR/>";
		}
			
		// echo "Messages: <BR/>";
		if (property_exists(get_class($adxResultXml), 'messages')){
			$messages = $adxResultXml->messages;
		
			foreach ( $messages as $value ) {
				$ret .= $value->message;
				$ret .= "<BR/>";
			}
		}
		// echo "resultXml<BR/>";
		// echo "$result2->resultXml<BR/>";
		if ($status == 0) {
		 return $ret;
		}
		$dom = new DomDocument ();
		$resultXml = $adxResultXml->resultXml;
		$dom->loadXML ( $resultXml );
		
		
		$fld = $dom->getElementsByTagName ( 'FLD' );
		$ret .= "<div class='row'>";
		
		foreach ( $fld as $f ) {	
			$val = $f->getAttribute ( 'NAME' );
			$val2 = $f->nodeValue;
			if ($val == "SOHNUM") {
					$ret .= "<div class='col-lg-5 col-md-3 col-sm-2'>";
					$ret .= "<table class='table table-striped table-bordered table-condensed'>";
					$ret .="<thead><tr><th>Order num</th>";
					$ret .="</tr></thead><tbody><tr><td><a HREF='page_soh_read.php?sohnum=".$val2."' >".$val2."</a>";
					$ret .="</td></tr></tbody></table>";
			}
		}
		return $ret;
	}
	
}

 ?>
