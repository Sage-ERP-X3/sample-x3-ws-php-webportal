<?php
require_once ('config/Config.php');
require_once ('ModelGraphQLX3.php');
require_once ('WebService/modelWS/ToolsWS.php');

class PurchaseReceipt extends ModelGraphQLX3 {
	
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
