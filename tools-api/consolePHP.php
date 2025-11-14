<?php
require_once ('config/Config.php');

function console_php_log($context,$output) {

    if ( Config::$WEB_SITE_CONSOLE==false)
        return;
    $js_code = '<script>';
    $js_code .= 'console.log(' . json_encode($context, JSON_HEX_TAG) . ');';
     
    $js_code .= 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    $js_code .= '</script>';
    echo $js_code;
    
}
?>