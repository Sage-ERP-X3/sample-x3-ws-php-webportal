<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WS1/WebService/modelWS/MY_Model.php');

class Stock_model extends MY_Model {
	function showStock() {
		$grp = "GRP1";
		$fcy = "P21";
		$item = "PFINI00174";
		$this->CAdxResultXml = $this->run("CALCSTOCK", "<PARAM><GRP ID=\"$grp\"><FLD NAME=\"WSTOFCY\">$fcy</FLD><FLD NAME=\"WITEM\">$item</FLD><FLD NAME=\"WRES\"></FLD></GRP></PARAM>");
		$result = $this->CAdxResultXml->resultXml;
		$str = "V1 : Stock du produit $item : $result unités";
		return $str;
	}
}

class Stock_model2 extends MY_Model {
	function showStock() {
		$grp = "GRP1";
		$fcy = "P21";
		$item = "PFINI00174";
		$WS = "<PARAM><GRP ID=\"$grp\"><FLD NAME=\"WSTOFCY\">$fcy</FLD><FLD NAME=\"WITEM\">$item</FLD><FLD NAME=\"WRES\"></FLD></GRP></PARAM>" ;		
		$this->CAdxResultXml = $this->run("CALCSTOCK", $WS );
		$result = $this->CAdxResultXml->resultXml;
		$result = explode($fcy, $result);
		$result = explode($item, $result[1]);
		$result = $result[1];
		$str = "V2 : Stock du produit $item : $result unites";
		return $str;
	}
	
	function showStock2($itm,$fcy2) {
		$grp = "GRP1" ;
		$fcy = $fcy2 ;
		$item = $itm ;
		$this->CAdxResultXml = $this->run("CALCSTOCK", "<PARAM><GRP ID=\"$grp\"><FLD NAME=\"WSTOFCY\">$fcy</FLD><FLD NAME=\"WITEM\">$item</FLD><FLD NAME=\"WRES\"></FLD></GRP></PARAM>");
		$result = $this->CAdxResultXml->resultXml;
		$result = explode($fcy, $result);
		$result = explode($item, $result[1]);
		$result = $result[1];
		$str = "V2 : Stock du produit $item : $result unites";
		return $str;
	}
}

class Stock_model3 extends MY_Model {
	function showStock() {
		$grp = "GRP1";
		$fcy = "P21";
		$item = "PFINI00174";
		$this->CAdxResultXml = $this->run("YCALCSTOC2", "<PARAM><GRP ID=\"$grp\"><FLD NAME=\"WSTOFCY\">$fcy</FLD><FLD NAME=\"WITEM\">$item</FLD><FLD NAME=\"WRES\"></FLD></GRP></PARAM>");
		$result = $this->CAdxResultXml->resultXml;
		$result = explode($fcy, $result);
		$result = explode($item, $result[1]);
		$result = $result[1];
		$str = "V3 : Stock du produit $item : $result unites";
		return $str;
	}
}

class EntreeDiverse extends MY_Model {
	function ED($action,$boite,$gboite,$gaction,$fcy,$itmref,$emp,$uom,$quantite,$statut) {
		$grp = "GRP1";
		$XML = "<PARAM><GRP ID=\"$grp\"><FLD NAME=\"YYACTION\">$action</FLD><FLD NAME=\"YYBOITE\">$boite</FLD><FLD NAME=\"YYGBOITE\">$gboite</FLD><FLD NAME=\"YYGACTION\">$gaction</FLD><FLD NAME=\"YFCY\">$fcy</FLD><FLD NAME=\"YITMREF\">$itmref</FLD><FLD NAME=\"YEMPLACEMENT\">$emp</FLD><FLD NAME=\"YUOM\">$uom</FLD><FLD NAME=\"YQUANTITE\">$quantite</FLD><FLD NAME=\"YSTATUT\">$statut</FLD></GRP></PARAM>" ;
		echo "<BR/><BR/>$XML<BR/><BR/>";

		$this->CAdxResultXml = $this->run("YWSED", $XML);
		$result = $this->CAdxResultXml->resultXml;
		if ($this->CAdxResultXml->status !=0) {
			$result = $this->CAdxResultXml->resultXml;
			// $result = "Piece n°..." ;
		} else {
			$result = $this->CAdxResultXml->messages ;
			echo "Taille du tableau : ".sizeof($result)."<BR/>" ;
			echo $result[0]->message."<BR/>";
			echo $result[0]->type."<BR/>";			
		}
		return $result;
	}
}

class SortieDiverse extends MY_Model {
	function SD($action,$boite,$gboite,$gaction,$fcy,$itmref,$emp,$uom,$quantite,$statut) {
		$grp = "GRP1";
		$XML = "<PARAM><GRP ID=\"$grp\"><FLD NAME=\"YYACTION\">$action</FLD><FLD NAME=\"YYBOITE\">$boite</FLD><FLD NAME=\"YYGBOITE\">$gboite</FLD><FLD NAME=\"YYGACTION\">$gaction</FLD><FLD NAME=\"YFCY\">$fcy</FLD><FLD NAME=\"YITMREF\">$itmref</FLD><FLD NAME=\"YEMPLACEMENT\">$emp</FLD><FLD NAME=\"YUOM\">$uom</FLD><FLD NAME=\"YQUANTITE\">$quantite</FLD><FLD NAME=\"YSTATUT\">$statut</FLD></GRP></PARAM>" ;
		$this->CAdxResultXml = $this->run("YWSSD", $XML);
		echo "<BR/><BR/>$XML<BR/><BR/>";
		$result = $this->CAdxResultXml->resultXml;
		if ($this->CAdxResultXml->status !=0) {
			$result = $this->CAdxResultXml->resultXml;
			// $result = "Piece n°..." ;
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