# PHP web portal connected with X3

## Training WS level 1

It is the corrected exercice 1 + 2

## Objectives

From a single portal php how can we use the X3 SOAP web service 
* sales orders for reading and writing into Sage X3
* products     for reading

## Documentation

* [Howto pdf](https://github.com/Sage-ERP-X3/sample-x3-ws-php-webportal/blob/master/doc/pdf/Create_a_WebPortal_SageX3_WebServices.pdf).
	
* [Howto md](https://github.com/Sage-ERP-X3/sample-x3-ws-php-webportal/blob/master/doc/md/Create_a_WebPortal_SageX3_WebServices.md).

## Setup X3

* Install patch X3 SRC_SVG_WEB_PHP_YYYYMMDD_NN from PATCX3
* Create manually the web service YOITM (object ITM)
* Publish the web services YOSOH and YITM
	

## Features

* Only php source with EDI Eclipse php Luna

* No X3 sources

* The name of X3 webservice used are YOSOH (object SOH) and YOITM (object OITM)

## Remarks

* X3 Version minimum  X3 PU9

* The new Webservice server is Syracuse

* The authentication webservice had changed since X3 PU9

* We must use the basic authentication http.
