<?php

require_once ('vendor/autoload.php');
require_once ('config/Config.php');
require_once ('tools-api/consolePHP.php');
use Firebase\JWT\JWT;

class TokenJWT {

    private $clientId;
    private $secretOrPrivateKey;
    private $audience;
    private $user;

    function __construct() {
        $this->clientId            = Config::$JWT_CLIENT_ID;
        $this->secretOrPrivateKey  = Config::$JWT_SECRET_OR_PRIVATE_KEY;
        $this->audience            = Config::$JWT_AUDIENCE;
        $this->user                = Config::$JWT_USER;

    }
    function getToken() {
        /* creating access token */
        $issuedAt = time();
        // jwt valid for 60 days (60 seconds * 60 minutes * 24 hours * 60 days)
        $expirationTime = $issuedAt + 60;
        $payload = array(
            "iss" => $this->clientId,
            "sub" => $this->user,
            "aud" => $this->audience,
            "iat" => $issuedAt,
            "exp" => $expirationTime
        );

        /**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
        */
        $jwt = JWT::encode($payload, $this->secretOrPrivateKey,'HS256');
        //console_php_log('token',$jwt);
        return $jwt;

    }
}
?>