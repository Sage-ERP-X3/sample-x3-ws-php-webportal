<?php
//require_once ('config/Config.php');
//require_once ('ModelGraphQLX3.php');
//require_once ('tools-api/ToolsWS.php');
//require_once ('tools-api/consolePHP.php');
require_once ('authentication/JWT/TokenJWT.php');

class DisplayTokenJWT{
	function getToken() {

		$jwt   = new TokenJWT ();
		$token = $jwt->getToken(); 
		
		$str='';
		
		$str .= "<div class='col-lg-12 col-md-2 col-sm-1'>";
		
		$str.='<textarea id="jwttoken" rows="5" cols="100">';
		$str .= $token;
		$str .= '</textarea>';
		$str .= "</div>";
		return $str;
	}
	
	function getTokenWS() {

		$jwt   = new TokenJWT ();
		$token = $jwt->getToken(); 
		return $token;
	}
	

}

 ?>
