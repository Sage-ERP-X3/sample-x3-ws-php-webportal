<?php

require_once ('config/Config.php');
require_once ('authentication/JWT/TokenJWT.php');

class ModelGraphQLX3 {
	private $jwt;
	function __construct() {
		$this->jwt   = new TokenJWT ();
        //var_dump($jwt);
	}
	
	
	public function query($queryGraphQL) {
        $curl = curl_init();
        $token = $this->jwt->getToken();    
        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::$GQL_SERVER,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"query":"'.$queryGraphQL.'","variables":{}}',
            CURLOPT_HTTPHEADER => array(
	            //"authorization: Basic ". base64_encode(Config::$GQL_USER.":".Config::$GQL_PASSWORD),
                "Authorization: Bearer ". $token,
	            "content-type: application/json",
                "x-xtrem-endpoint: ".Config::$GQL_ENDPOINT
	
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
		return $response;
	}
	
	public function readFileGraphQl($fileInput,$replace=true) {
        $file='GraphQL/'.$fileInput;
		$fileOpen = fopen($file, 'r');
		
        $queryGraphQL=fread($fileOpen, filesize($file));
		fclose($fileOpen);
        if ($replace==true) {
            $queryGraphQL = str_replace("\r\n","",$queryGraphQL);
		    $queryGraphQL = str_replace('"','\"',$queryGraphQL);
        }
		
        return $queryGraphQL;
    }
}
?>

