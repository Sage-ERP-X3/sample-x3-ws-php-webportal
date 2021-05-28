<?php

class Config {
	/*
	 	Config SOAP Web services X3 
	*/
	public static $WSDL            	= "http://<X3 server>:<X3 port>/soap-wsdl/syracuse/collaboration/syracuse/CAdxWebServiceXmlCC?wsdl";
	public static $CODE_LANG       	= "ENG";
	public static $CODE_USER       	= "<to complete>";
	public static $PASSWORD        	= "<to complete>";
	public static $POOL_ALIAS      	= "SEED";
	public static $REQUEST_CONFIG  	= "adxwss.optreturn=XML";
	public static $WS_ORDER  		= "YOSOH";
	public static $WS_STOCK  		= "YSTOCK_LOT";
	public static $WS_PRODUCT		= "YOITM";
	
	/*
	 	Config GraphQL X3
	*/

	public static $GQL_SERVER 	= "http://<graphql server>:<graphql port>/xtrem/api";
	public static $GQL_USER   	= "<to complete>";
	public static $GQL_PASSWORD = "<to complete>";

	/*
	 	Config PHP Web Portal
	*/
	public static $WEB_SITE_LOGIN	= "websage";
	public static $WEB_SITE_PASSWD 	= "websage";
	
}
?>