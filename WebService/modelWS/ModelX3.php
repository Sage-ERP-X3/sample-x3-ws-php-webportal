<?php
require_once('WebService/modelWS/ModelWS.php');
//require_once('../../config/Config.php');
require_once('config/Config.php');
class ModelX3{

	public $soapClient;
	/*private $classmap = array(
		'CAdxCallContext' => 'CAdxCallContext',
		'CAdxMessage' => 'CAdxMessage',
		'CAdxTechnicalInfos' => 'CAdxTechnicalInfos',
		'CAdxResultXml' => 'CAdxResultXml',
		'CAdxParamKeyValue' => 'CAdxParamKeyValue'
	);
    */
	private $callContext = array();
   
	function ModelX3()
	{
		$wsdl = Config::$WSDL;
		//$options = array();
		//foreach($this->classmap as $key => $value) {
		//	$options['classmap'][$key] = $value;
		//}
		
		$optionsAuth = Array('login' => Config::$CODE_USER, 'password' => Config::$PASSWORD,'trace'=> 0) ;
		$this->soapClient=new SoapClient($wsdl,$optionsAuth);
		//$this->callContext = array('codeLang'=>Config::$CODE_LANG, 'codeUser'=>Config::$CODE_USER, 'password'=>Config::$PASSWORD, 'poolAlias'=>Config::$POOL_ALIAS, 'requestConfig'=>Config::$REQUEST_CONFIG);
		// codeUser and password had deleted in the class CAdxCallContext
		$this->callContext = array('codeLang'=>Config::$CODE_LANG,'poolAlias'=>Config::$POOL_ALIAS, 'requestConfig'=>Config::$REQUEST_CONFIG);
		}


	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param string $inputXml
	 * @return CAdxResultXml
	 */
	public function run($publicName, $inputXml) {
		return $this->soapClient->__soapCall('run', array($this->callContext, $publicName, $inputXml), array(
												            'uri' => '',
												            'soapaction' => ''
														));
 	}
//http://www.adonix.com/WSS
	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param string $objectXml
	 * @return CAdxResultXml
	 */
	public function save($publicName, $objectXml) {
		return $this->soapClient->__soapCall('save', array($this->callContext, $publicName, $objectXml),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param ArrayOfCAdxParamKeyValue $objectKeys
	 * @return CAdxResultXml
	 */
	public function delete( $publicName, $objectKeys) {
		return $this->soapClient->__soapCall('delete', array($this->callContext, $publicName, $objectKeys),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param ArrayOfCAdxParamKeyValue $objectKeys
	 * @return CAdxResultXml
	 */
	public function read($publicName, $objectKeys) {
		return $this->soapClient->__soapCall('read', array($this->callContext, $publicName, $objectKeys),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param ArrayOfCAdxParamKeyValue $objectKeys
	 * @param int $listSize
	 * @return CAdxResultXml
	 */
	public function query( $publicName, $objectKeys, $listSize) {
		
		return $this->soapClient->__soapCall('query', array($this->callContext, $publicName, $objectKeys, $listSize),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
		
		
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @return CAdxResultXml
	 */
	public function getDescription($publicName) {
		return $this->soapClient->__soapCall('getDescription', array($this->callContext, $publicName),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param ArrayOfCAdxParamKeyValue $objectKeys
	 * @param string $objectXml
	 * @return CAdxResultXml
	 */
	public function modify($publicName, $objectKeys, $objectXml) {
		return $this->soapClient->__soapCall('modify', array($this->callContext, $publicName, $objectKeys, $objectXml),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param string $actionCode
	 * @param ArrayOfCAdxParamKeyValue $objectKeys
	 * @return CAdxResultXml
	 */
	public function actionObject($callContext, $publicName, $actionCode, $objectKeys) {
		return $this->soapClient->__soapCall('actionObject', array($callContext, $publicName, $actionCode, $objectKeys),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param ArrayOfCAdxParamKeyValue $objectKeys
	 * @param string $blocKey
	 * @param ArrayOf_xsd_string $lineKeys
	 * @return CAdxResultXml
	 */
	public function deleteLines($callContext, $publicName, $objectKeys, $blocKey, $lineKeys) {
		return $this->soapClient->__soapCall('deleteLines', array($callContext, $publicName, $objectKeys, $blocKey, $lineKeys),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @param ArrayOfCAdxParamKeyValue $objectKeys
	 * @param string $blocKey
	 * @param string $lineKey
	 * @param string $lineXml
	 * @return CAdxResultXml
	 */
	public function insertLines($callContext, $publicName, $objectKeys, $blocKey, $lineKey, $lineXml) {
		return $this->soapClient->__soapCall('insertLines', array($callContext, $publicName, $objectKeys, $blocKey, $lineKey, $lineXml),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	}

	/**
	 *
	 *
	 * @param CAdxCallContext $callContext
	 * @param string $publicName
	 * @return CAdxResultXml
	 */
	public function getDataXmlSchema($callContext, $publicName) {
		return $this->soapClient->__soapCall('getDataXmlSchema', array($callContext, $publicName),       array(
            'uri' => 'http://www.adonix.com/WSS',
            'soapaction' => ''
		)
		);
	}

}
?>

