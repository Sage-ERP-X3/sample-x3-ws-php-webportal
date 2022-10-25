<?php
require_once ('config/Config.php');
require_once ('ModelGraphQLX3.php');
require_once ('tools-api/ToolsWS.php');

class PurchaseReceipt extends ModelGraphQLX3 {
	
	function showOne($_id) {
		$queryGraphQL=$this->readFileGraphQl('PurchaseReceipt_read.graphql',true);
		//$queryGraphQL=str_replace("%<_id>%",$_id,$queryGraphQL);
		
		$vars  ='';
		$vars .='{';
		$vars .='  "id": "'.$_id.'"';
		$vars .='  }';
		//echo($queryGraphQL);
		//echo($vars);
		
		$response=$this->query($queryGraphQL,$vars);
		//var_dump($response);
		$json=json_decode($response);

		
		$read = $json->{'data'}->{'xtremX3Purchasing'}->{'purchaseReceipt'}->{'read'};
        //var_dump($read);

		if (is_null($read)) {
			return ToolsWS::getSucces ( "No result" );
		}
		$str = "";
		// header
		$str .= "<div class='row'>";

		$str .= "<div class=' hidden col-lg-3 col-md-2 col-sm-1'>";			
		$str .= "<label class='control-label' for='receiptnum'>Receipt number</label>";
		$str .= "<input class='form-control' type='text' id='receiptnum' placeholder='";
		$str .= $_id;
		$str .= "' disabled >";
		//$str .="<div class='hidden' id='sohnum'>";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='disabledInput'>Receipt site</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'receiptSite'}->{'_id'}.' -'.$read->{'receiptSite'}->{'name'};
		$str .= "' disabled >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='disabledInput'>Receipt date</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'receiptDate'};
		$str .= "' disabled >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='disabledInput'>Supplier</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'supplier'}->{'_id'};
		$str .= "' disabled >";
		$str .= "</div>";

		$str .= "</div>";
		$str .= "<br/>";
		// Lines
		$str .= "<table class='table table-striped table-bordered table-condensed'>";
		$str .= "<thead><tr><th>Line number</th><th>Purchase order</th><th>Purchase order line</th><th>Purchase order sequence</th><th>Quantity received</th></tr></thead><tbody>";
		$edges = $read->{'lines'}->{'query'}->{'edges'};
		foreach ( $edges as $edge ) {
			$str .= "<tr>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'lineNumber'};
			$str .= "</td>";
			
			$str .= "<td>";
			$str .= $edge->{'node'}->{'purchaseOrder'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'purchaseOrderLineNumber'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'purchaseOrderSequenceNumber'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'quantityInReceiptUnitReceived'};
			$str .= "</td>";

			$str .= "</tr>";
		}
		$str .= "</tbody></table>";
		$str .= "</div>";

		return $str;
	}
	function create($arrayInput) {

		$queryGraphQL=$this->readFileGraphQl('PurchaseReceipt_mutation.graphql',true);
		
		$vars  ='';
		$vars = json_encode($arrayInput);
		
		$response=$this->query($queryGraphQL,$vars);
		//console_php_log('GraphQL response',$response);
		$json=json_decode($response);

		
		$create = $json->{'data'}->{'xtremX3Purchasing'}->{'purchaseReceipt'}->{'create'};
        
		if (is_null($create)) {
			return ToolsWS::getError ( "unsuccessful creation" );
		}
		$id = $create->{'id'};
		return $id;

	}
	
	function display($receiptNum) {

		
		$ret="";
		
		$mess=  'Receipt created : '.'<a href="page_pth_gq_read.php?_id='.$receiptNum.'">'.$receiptNum.'</a>';
		$ret = ToolsWS::getSucces ( $mess );
		return $ret;

	}
}

 ?>
