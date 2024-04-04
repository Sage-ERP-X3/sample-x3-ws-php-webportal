<?php

require_once ('config/Config.php');
require_once ('authentication/JWT/TokenJWT.php');
require_once ('tools-api/consolePHP.php');
class ModelGraphQLX3 {
	private $jwt;
	function __construct() {
		$this->jwt   = new TokenJWT ();
	}
	
	
	public function query($queryGraphQL, $variables='{}') {
       
        $curl = curl_init();
        //var_dump($curl);
        $token = $this->jwt->getToken(); 
        //var_dump($token); 
        $graphQLServer = Config::$WEB_SERVER_X3 . "/xtrem/api";   
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  $graphQLServer,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"query":"'.$queryGraphQL.'","variables":'.$variables.'}',
            CURLOPT_HTTPHEADER => array(
	            //"authorization: Basic ". base64_encode(Config::$GQL_USER.":".Config::$GQL_PASSWORD),
                "Authorization: Bearer ". $token,
	            "content-type: application/json",
                "x-xtrem-endpoint: ".Config::$GQL_ENDPOINT
	
            ),
        ));
        
        console_php_log('GraphQL query',$queryGraphQL);
        console_php_log('GraphQL variables',$variables);
        $response = curl_exec($curl);
        //var_dump(curl_getinfo($curl));
        #var_dump($response);
        //console_php_log('GraphQL response',$response);
        curl_close($curl);
        //var_dump(curl_error($curl));
		return $response;
	}
	
	public function readFileGraphQl($fileInput,$replace=true) {
        $file='GraphQL/'.$fileInput;
		$fileOpen = fopen($file, 'r');
		
        $queryGraphQL=fread($fileOpen, filesize($file));
		fclose($fileOpen);
        if ($replace==true) {
            $queryGraphQL = str_replace("\r","",$queryGraphQL);
            $queryGraphQL = str_replace("\n","",$queryGraphQL);
		    $queryGraphQL = str_replace('"','\"',$queryGraphQL);
        }
		
        return $queryGraphQL;
    }
}
?>

