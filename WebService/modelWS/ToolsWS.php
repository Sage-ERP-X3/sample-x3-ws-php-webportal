<?php
class ToolsWS {
	static function getError($error) {
		$ret="";
		$ret.='<div class="alert alert-danger fade in">';
		$ret.='<a href="#" class="close" data-dismiss="alert">&times;</a>';
		//$ret.='<strong>Erreur!  </strong>';
		$ret.=$error;
		$ret.='</div>';
		return $ret;
	}
	static function getSucces($mess) {
		$ret="";
		$ret.='<div class="alert alert-success fade in">';
		$ret.='<a href="#" class="close" data-dismiss="alert">&times;</a>';
		//$ret.='<strong>Succes!  </strong>';
		$ret.=$mess;
		$ret.='</div>';
		return $ret;
	}
	
	static function printError($error) {
		echo ToolsWS::getError($error);
	}
	static function printSucces($mess) {
		echo ToolsWS::getSucces($mess);
	}
}
?>

