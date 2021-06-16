<?php

class Config {
	/*
	 	Config SOAP Web services X3 
	*/
	public static $WSDL            	= "http://x3erpv12sqlvm:8124/soap-wsdl/syracuse/collaboration/syracuse/CAdxWebServiceXmlCC?wsdl";
	public static $CODE_LANG       	= "ENG";
	public static $CODE_USER       	= "admin";
	public static $PASSWORD        	= "S@geX3_R0cks";
	public static $POOL_ALIAS      	= "adc";
	public static $REQUEST_CONFIG  	= "adxwss.optreturn=XML";
	public static $WS_ORDER  		= "YOSOH";
	public static $WS_STOCK  		= "YSTOCK_LOT";
	public static $WS_PRODUCT		= "YOITM";
	
	/*
	 	Config GraphQL X3
	*/

	public static $GQL_SERVER 	= "http://x3erpv12sqlvm:8124/xtrem/api";
	public static $GQL_USER   	= "admin";
	public static $GQL_PASSWORD = "S@geX3_R0cks";

	/*
	 	Config PHP Web Portal
	*/
	public static $WEB_SITE_LOGIN	= "websage";
	public static $WEB_SITE_PASSWD 	= "websage";
	
}
?>