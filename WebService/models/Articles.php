<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WS1/WebService/modelWS/MY_Model.php');

class Article extends MY_Model {
	function showITM($itm) {
		echo "fonction : $itm <br/>" ;
		$WS = "*" ; 
		$cle = new CAdxParamKeyValue() ;
		$cle->key = "ITMREF"; 
		$cle->value = $itm ; 
		$this->CAdxResultXml = $this->read("ARTICLE",$cle);
		$result = $this->CAdxResultXml->resultXml;
		$dom = new DomDocument();
		$dom->loadXML($result);
		$RES = $dom->getElementsByTagName('GRP');
		foreach ($RES as $R) {
			$commande = $R->getElementsByTagName('FLD');
			foreach($commande as $c) {
				$val = $c->getAttribute('NAME') ;
				if ($val=="IMG") 	 {				
					echo "<DIV>";
					$tempDir = "Tmp/" ;
					$timeStamp = time().mt_rand(100, 999) ;
					$tempName = "tempImage_{$timeStamp}.tmp" ;					
					$data = $c->nodeValue ;
					file_put_contents($tempDir.$tempName, $data) ;
					echo "<img src='testShow.php?ts={$timeStamp}' alt='' />" ;
					echo "</DIV>" ;
					echo "<BR/><BR/><BR/>" ;
				}
			}
		}
		return $result;
	}
}

class ListeItm extends MY_Model {
	function showListe() {
		$WS = "*" ; 
		$this->CAdxResultXml = $this->query("ARTICLE",$WS ,100);
		$result = $this->CAdxResultXml->resultXml;
		$dom = new DomDocument();
		$dom->loadXML($result);
		echo "Boucle sur les articles : <BR/>" ; 
		$RES = $dom->getElementsByTagName('LIN');
		foreach ($RES as $R) {
			echo "<br/><br/>** Nouvel article ***<BR/>";
			$commande = $R->getElementsByTagName('FLD');
			foreach($commande as $c) {
				echo $c->getAttribute('NAME') ;
				echo " : " ;
				$val = $c->getAttribute('NAME') ;
				if ($val=="ITMREF") 	 {
					echo "<A href='page4d.php?itmref=$c->nodeValue'>" ;
					echo $c->nodeValue ;
					echo "</A><br/>";
				} else {
					echo $c->nodeValue ;
					echo "<br/>";				
				}
			}
		}	
		$str = "Liste des premiers articles : $result ";
		return $str;
	}
}

class ListeDItm extends MY_Model {
	function showListe() {
		$WS = "*" ; 
		$this->CAdxResultXml = $this->query("ARTICLE",$WS ,10000);
		$result = $this->CAdxResultXml->resultXml;
		$dom = new DomDocument();
		$dom->loadXML($result);
		$RES = $dom->getElementsByTagName('LIN');
		echo "<SELECT name='ARTICLE'>";
		foreach ($RES as $R) {
			$commande = $R->getElementsByTagName('FLD');
			foreach($commande as $c) {
				$val = $c->getAttribute('NAME') ;
				if ($val=="ITMREF") {
					echo "<OPTION VALUE='$c->nodeValue'>$c->nodeValue</OPTION>";
				}
			}
		}
		echo "</SELECT>";
		return $result;
	}
}

class CreateItm extends MY_Model {
	function CreateArticle($cat,$itm,$des) {
		$WS = "<PARAM><GRP ID=\"ITM0_1\" ><FLD NAME=\"TCLCOD\" TYPE=\"Char\" >$cat</FLD><FLD NAME=\"ITMREF\" TYPE=\"Char\" >$itm</FLD><FLD NAME=\"DES1AXX\" TYPE=\"Char\" >$des</FLD></GRP></PARAM>" ; 
		$this->CAdxResultXml = $this->save("ARTICLE",$WS);
		if ($this->CAdxResultXml->status !=0) {
			$result = $this->CAdxResultXml->resultXml;
		} else {
			$result = $this->CAdxResultXml->messages ;
			echo "Taille du tableau : ".sizeof($result)."<BR/>" ;
			echo $result[0]->message."<BR/>";
			echo $result[0]->type."<BR/>";
		}
		return $result;
	}
}

class ModifyItm extends MY_Model {
	function ModifyArticle($cat,$itm,$des) {
		$cle = new CAdxParamKeyValue() ;
		$cle->key = "ITMREF"; 
		$cle->value = $itm ; 
		$WS = "<PARAM><GRP ID=\"ITM0_1\" ><FLD NAME=\"DES1AXX\" TYPE=\"Char\" >$des</FLD></GRP></PARAM>" ; 
		$this->CAdxResultXml = $this->modify("ARTICLE",$cle,$WS);
		if ($this->CAdxResultXml->status !=0) {
			$result = $this->CAdxResultXml->resultXml;
		} else {
			$result = $this->CAdxResultXml->messages ;
			echo "Taille du tableau : ".sizeof($result)."<BR/>" ;
			echo $result[0]->message."<BR/>";
			echo $result[0]->type."<BR/>";			
		}
		return $result;
	}
}

class DeleteItm extends MY_Model {
	function DeleteArticle($itm) {
		$cle = new CAdxParamKeyValue() ;
		$cle->key = "ITMREF"; 
		$cle->value = $itm ; 
		$WS = "" ; 
		$this->CAdxResultXml = $this->delete("ARTICLE",$cle);
		if ($this->CAdxResultXml->status !=0) {
			$result = $this->CAdxResultXml->resultXml;
		} else {
			$result = $this->CAdxResultXml->messages ;
			echo "Taille du tableau : ".sizeof($result)."<BR/>" ;
			echo $result[0]->message."<BR/>";
			echo $result[0]->type."<BR/>";			
		}
		return $result;
	}
}
?>