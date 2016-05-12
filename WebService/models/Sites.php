<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WS1/WebService/modelWS/MY_Model.php');

class Site extends MY_Model {
	function showFcy($fcy) {
		$WS = "*" ; 

		$cle = new CAdxParamKeyValue() ;
		$cle->key = "FCY"; 
		$cle->value = $fcy ; 

		$this->CAdxResultXml = $this->read("FCY",$cle);
		$result = $this->CAdxResultXml->resultXml;

		return $result;
	}
}

class ListeFcy extends MY_Model {
	function showListe() {
		$WS = "*" ; 
		$this->CAdxResultXml = $this->query("FCY",$WS ,1000);
		$result = $this->CAdxResultXml->resultXml;

		$dom = new DomDocument();
		$dom->loadXML($result);
		$RES = $dom->getElementsByTagName('LIN');
		
		/** Boucle sur les sites pour faire une liste déroulante **/
		echo "<SELECT name='SITE'>";
		foreach ($RES as $R) {
			$commande = $R->getElementsByTagName('FLD');
			foreach($commande as $c) {		
				
				$name = $c->getAttribute('NAME') ; 
				$valeur = $c->nodeValue ; 
				
				if ($name=="FCY") {
					echo "<OPTION VALUE='$valeur'>$valeur</OPTION>";
				}
			}
		}
		echo "</SELECT>";
		
		return $result;
	}
}
?>