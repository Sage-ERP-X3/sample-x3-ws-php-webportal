<?php
require_once ('WebService/modelWS/ModelX3.php');
class Product extends ModelX3 {
	function showOne($crit) {
		$listFieldLines = array (
				"ITMREF",
				"QTY",
				"ITMDES1" 
		);
		$listFieldHeader = array (
				"SOHNUM",
				"BPCORD",
				"ORDDAT",
				"CUSORDREF",
				"SALFCY",
				"BPCNAM" 
		);
		$WS = "*";
		$cle = new CAdxParamKeyValue ();
		$cle->key = "SOHNUM";
		$cle->value = $crit;
		// echo("oma");echo($cle->key);
		// echo("oma");echo($cle->value);
		$this->CAdxResultXml = $this->read ( Config::$WS_ORDER, Array (
				$cle 
		) );
		if ($this->CAdxResultXml->status == 0) {
			return ToolsWS::getSucces ( "No result" );
		}
		$resultXml = $this->CAdxResultXml->resultXml;
		// $result contient le fichier XML des réponses
		
		$dom = new DomDocument ();
		$dom->loadXML ( $resultXml );
		// $xpath = new DOMXpath($dom);
		
		$str = "";
		// header
		$fld = $dom->getElementsByTagName ( 'FLD' );
		$str .= "<div class='row'>";
		
		foreach ( $fld as $f ) {
			
			$val = $f->getAttribute ( 'NAME' );
			if (in_array ( $val, $listFieldHeader )) {
				$val2 = $f->nodeValue;
				
				if ($val == "SOHNUM") {
					$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
					$str .= "<label class='control-label' for='sohnum'>Order num</label>";
					$str .= "<input class='form-control' type='text' id='sohnum' placeholder='";
					// $str .="<div class='hidden' id='sohnum'>";
					$str .= $val2;
					$str .= "' disabled >";
				} elseif ($val == "BPCORD") {
					$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
					$str .= "<label class='control-label' for='disabledInput'>Client</label>";
					$str .= "<input class='form-control' type='text' placeholder='";
					$str .= $val2;
					$str .= "' disabled >";
				} elseif ($val == "ORDDAT") {
					$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
					$str .= "<label class='control-label' for='disabledInput'>order date</label>";
					$str .= "<input class='form-control' type='text' placeholder='";
					$originalDate = $val2;
					$newDate = date ( "d-m-Y", strtotime ( $originalDate ) );
					$str .= $newDate;
					$str .= "' disabled >";
				} elseif ($val == "CUSORDREF") {
					$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
					$str .= "<label class='control-label' for='disabledInput'>Reference</label>";
					$str .= "<input class='form-control' type='text' placeholder='";
					$str .= $val2;
					$str .= "' disabled >";
				} elseif ($val == "SALFCY") {
					$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
					$str .= "<label class='control-label' for='disabledInput'>Site</label>";
					$str .= "<input class='form-control' type='text' placeholder='";
					$str .= $val2;
					$str .= "' disabled >";
				} elseif ($val == "BPCNAM") {
					$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
					$str .= "<label class='control-label' for='disabledInput'>Name of site</label>";
					$str .= "<input class='form-control' type='text' placeholder='";
					$str .= $val2;
					$str .= "' disabled >";
				}
				$str .= "</div>";
			}
		}
		$str .= "</div>";
		$str .= "<br/>";
		// Lines
		$RES = $dom->getElementsByTagName ( 'LIN' );
		
		// $str.="<label class='control-label' for='disabledInput'>No commande</label>";
		// $str.="<input class='form-control' id='disabledInput' type='text' placeholder='";
		// $str.=$dom->getElementsByTagName('SOHNUM');
		// $str.=" disabled=''>";
		$str .= "<table class='table table-striped table-bordered table-condensed'>";
		$str .= "<thead><tr><th>Product</th><th>Designation</th><th>Quantity</th></tr></thead><tbody>";
		
		foreach ( $RES as $R ) {
			
			$commande = $R->getElementsByTagName ( 'FLD' );
			// echo "<tr>";
			$str .= "<tr>";
			foreach ( $commande as $c ) {
				$val = $c->getAttribute ( 'NAME' );
				if (in_array ( $val, $listFieldLines )) {
					// echo "<td>";
					$str .= "<td>";
					
					$val2 = $c->nodeValue;
					
					$str .= $c->nodeValue;
					
					$str .= "</td>";
				}
			}
			$str .= "</tr>";
		}
		$str .= "</tbody></table>";
		$str .= "</div>";
		
		return $str;
	}
	function showListe() {
		//$WS = "";
		$WS = new CAdxParamKeyValue ();
		$WS->key = "ITMSTA";
		$WS->value = "<>5";
		$this->CAdxResultXml = $this->query ( Config::$WS_PRODUCT, Array ($WS) , 100 );
		$result = $this->CAdxResultXml->resultXml;
		// $result contient le fichier XML des réponses
		$dom = new DomDocument ();
		$dom->loadXML ( $result );
		$RES = $dom->getElementsByTagName ( 'LIN' );
		$str = "<table class='table table-striped table-bordered table-condensed'>";
		$str .= "<thead><tr><th>Product num</th><th>Description</th><th>Category</th><th>Product status</th><th>EAN code</th><th>Search key</th></tr></thead><tbody>";
		
		foreach ( $RES as $R ) {
			$commande = $R->getElementsByTagName ( 'FLD' );
			$str .= "<tr>";
			foreach ( $commande as $c ) {
				$str .= "<td>";
				$val = $c->getAttribute ( 'NAME' );
				$val2 = $c->nodeValue;
				if ($val == "SOHNUM") {
					$str .= "<a HREF='page_soh_read.php?sohnum=$val2'>";
					$str .= $c->nodeValue;
					$str .= "</a>";
				} elseif ($val == "ITMSTA") {
					switch ($c->nodeValue) {
						case 1 :
							$str .= "Active";
							break;
						case 2 :
							$str .= "In development";
							break;
						case 3 :
							$str .= "Shortage";
							break;
						case 4 :
							$str .= "Not Renewed";
							break;
						case 5 :
							$str .= "Obsolete";
							break;
						case 6 :
							$str .= "Not Usable";
							break;
					}
				} else {
					$str .= $c->nodeValue;
				}
				$str .= "</td>";
			}
			$str .= "</tr>";
		}
		$str .= "</tbody></table>";
		$str .= "</div>";
		
		return $str;
	}
	function create($WS) {
		$this->CAdxResultXml = $this->save ( Config::$WS_ORDER, $WS );
		$adxResultXml = $this->CAdxResultXml;
		$ret = "";
		$messages = array ();
		$status = $adxResultXml->status;
		if ($status == 1) {
			$ret .= ToolsWS::getSucces ( 'Order created' );
			// return $ret;
			// echo "order créée<BR/>";
		} else {
			$ret .= ToolsWS::getError ( 'Order not created' );
			// return $ret;
			// echo "Erreur, commande non créée<BR/>";
		}
		
		// echo "Messages: <BR/>";
		if (property_exists ( get_class ( $adxResultXml ), 'messages' )) {
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
				$ret .= "<thead><tr><th>Order num</th>";
				$ret .= "</tr></thead><tbody><tr><td><a HREF='page_soh_read.php?sohnum=" . $val2 . "' >" . $val2 . "</a>";
				$ret .= "</td></tr></tbody></table>";
			}
		}
		return $ret;
	}
}

?>
