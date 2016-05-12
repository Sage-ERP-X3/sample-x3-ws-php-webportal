<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WS1/WebService/modelWS/MY_Model.php');

class Client extends MY_Model {
	function showBpc($bpc) {
		echo "fonction : $bpc <br/>" ;
		$WS = "*" ; 

		$cle = new CAdxParamKeyValue() ;
		$cle->key = "BPCNUM"; 
		$cle->value = $bpc ; 

		$this->CAdxResultXml = $this->read("BPCNUM",$cle);
		$result = $this->CAdxResultXml->resultXml;

		return $result;
	}
}

class ListeBpc extends MY_Model {
	function showListe() {
		$WS = "*" ; 
		$this->CAdxResultXml = $this->query("BPCNUM",$WS ,100);
		$result = $this->CAdxResultXml->resultXml;

		$dom = new DomDocument();
		$dom->loadXML($result);
		echo "Boucle sur les clients : <BR/>" ; 
		$RES = $dom->getElementsByTagName('LIN');

		foreach ($RES as $R) {
			echo "<br/><br/>** Nouveau client ***<BR/>";
			$commande = $R->getElementsByTagName('FLD');
			foreach($commande as $c) {
				echo $c->getAttribute('NAME') ;
				echo " : " ;
				$val = $c->getAttribute('NAME') ;
				if ($val=="BPCNUM") 	 {
					echo "<A href='page5d.php?bpcnum=$c->nodeValue'>" ;
					echo $c->nodeValue ;
					echo "</A><br/>";
				} else {
					echo $c->nodeValue ;
					echo "<br/>";				
				}
			}
		}	

		$str = "Liste des premiers clients : $result ";
		return $str;
	}
}
?>