<?php

require_once ('config/Config.php');
class ModelGraphQLX3 {
	
	function __construct() {
		
	}
	
	
	public function query($queryGraphQL) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::$GQL_SERVER,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$queryGraphQL,
            CURLOPT_HTTPHEADER => array(
	            "authorization: Basic ". base64_encode(Config::$GQL_USER.":".Config::$GQL_PASSWORD),
	            "content-type: application/json"
	
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
		return $response;
	}
	
	
}
?>
