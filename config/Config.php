<?php

class Config {
	/*
	 	Config SOAP Web services X3 
	*/
	public static $WSDL            	= "http:.../soap-wsdl/syracuse/collaboration/syracuse/CAdxWebServiceXmlCC?wsdl";
	public static $CODE_LANG       	= "ENG";
	public static $CODE_USER       	= "...";
	public static $PASSWORD        	= "...";
	public static $POOL_ALIAS      	= "...";
	public static $REQUEST_CONFIG  	= "adxwss.optreturn=XML";
	public static $WS_ORDER  		= "YOSOH";
	public static $WS_STOCK  		= "YSTOCK_LOT";
	public static $WS_PRODUCT		= "YOITM";
	
	/*
	 	Config GraphQL X3
	*/

	public static $GQL_SERVER 	= "http:.../xtrem/api";
	public static $GQL_USER   	= "...";
	public static $GQL_PASSWORD = "...";

	/*
	 	Config PHP Web Portal
	*/
	public static $WEB_SITE_LOGIN	= "websage";
	public static $WEB_SITE_PASSWD 	= "websage";
	
}
?>
