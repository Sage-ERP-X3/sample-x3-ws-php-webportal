<?php
require_once ('WebService/modelWS/ModelX3.php');
class Stock extends ModelX3 {
	function Liste($WS) {
		$this->CAdxResultXml = $this->run ( Config::$WS_STOCK, $WS );
		$result = $this->CAdxResultXml->resultXml;
		if ($this->CAdxResultXml->status==0) {
			return ToolsWS::getSucces("No result");
		}
		// $result contient le fichier XML des réponses
		$dom = new DomDocument ();
		$dom->loadXML ( $result );
		$RES = $dom->getElementsByTagName ( 'LIN' );
		$str = "<table class='table table-striped table-bordered table-condensed'>";
		$str .= "<thead><tr><th>Site</th><th>Article</th><th>Lot</th><th>Dispo</th></tr></thead><tbody>";
	
		foreach ( $RES as $R ) {
			$ligneStock = $R->getElementsByTagName ( 'FLD' );
			$str .= "<tr>";
			foreach ( $ligneStock as $c ) {
				$val = $c->getAttribute ( 'NAME' );
				$val2 = $c->nodeValue;
				if (($val=="O_STOFCY") and ($val2=="")) {
					break 2;
				}
				$str .= "<td>";
				$str .= $c->nodeValue;
				$str .= "</td>";
			}
			$str .= "</tr>";
		}
		$str .= "</tbody></table>";
		$str .= "</div>";
	
		return $str;
	}
}
 ?>