<?php
require_once ('config/Config.php');
require_once ('ModelGraphQLX3.php');
require_once ('WebService/modelWS/ToolsWS.php');

class PurchaseReceipt extends ModelGraphQLX3 {
	
	function showOne($_id) {
		$queryGraphQL=$this->readFileGraphQl('PurchaseReceipt_read.graphql');
		$queryGraphQL=str_replace("%<_id>%",$_id,$queryGraphQL);
		//echo($queryGraphQL);
		
		$response=$this->query($queryGraphQL);
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
	function create($ordnum,$receiptSite,$receiptDate,$supplier, $lines) {

		$queryGraphQL=$this->readFileGraphQl('PurchaseReceipt_mutation.graphql',false);
		$queryGraphQL=str_replace("%<receiptSite>%",$receiptSite,$queryGraphQL);
		$queryGraphQL=str_replace("%<receiptDate>%",$receiptDate,$queryGraphQL);
		$queryGraphQL=str_replace("%<supplier>%",$supplier,$queryGraphQL);
		
		$queryGraphQL=str_replace(" %<fragmentLines>%",$lines,$queryGraphQL);
		$queryGraphQL = str_replace("\r\n","",$queryGraphQL);
		$queryGraphQL = str_replace('"','\"',$queryGraphQL);
		//var_dump($queryGraphQL);
		//echo($queryGraphQL);
		$response=$this->query($queryGraphQL);
		//echo($response);
		$json=json_decode($response);

		
		$create = $json->{'data'}->{'xtremX3Purchasing'}->{'purchaseReceipt'}->{'create'};
        //var_dump($create);

		if (is_null($create)) {
			return ToolsWS::getError ( "unsuccessful creation" );
		}
		$id = $create->{'id'};
		/*$ret="";
		$ret .= "<div class='col-lg-5 col-md-3 col-sm-2'>";
					$ret .= "<table class='table table-striped table-bordered table-condensed'>";
					$ret .="<thead><tr><th>Receipt num</th>";
					$ret .="</tr></thead><tbody><tr><td><a HREF='page_soh_read.php?sohnum=".$id."' >".$id."</a>";
					$ret .="</td></tr></tbody></table>";
		*/
		return $id;

	}
	
	function display($receiptNum) {

		
		$ret="";
		//$ret .= "<div class='col-lg-5 col-md-3 col-sm-2'>";
		/*			$ret .= "<table class='table table-striped table-bordered table-condensed'>";
					$ret .="<thead><tr><th>Receipt num</th>";
					$ret .="</tr></thead><tbody><tr><td><a HREF='page_soh_read.php?sohnum=".$receiptNum."' >".$receiptNum."</a>";
					$ret .="</td></tr></tbody></table>";
		*/
		$ret = ToolsWS::getSucces ( "Receipt created : ".$receiptNum );
		return $ret;

	}
}

 ?>
