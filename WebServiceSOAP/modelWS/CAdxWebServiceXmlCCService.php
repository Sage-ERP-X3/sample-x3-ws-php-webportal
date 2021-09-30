<?php

include_once('CAdxCallContext.php');
include_once('CAdxMessage.php');
include_once('CAdxTechnicalInfos.php');
include_once('CAdxResultXml.php');
include_once('CAdxParamKeyValue.php');


/**
 * This SOAP web service allows to call X3 sub programs and/or to manipulate X3 objects trough CRUD and specifics methods
 */
class CAdxWebServiceSOAPXmlCCService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     * @access private
     */
    private static $classmap = array(
      'CAdxCallContext' => '\CAdxCallContext',
      'CAdxMessage' => '\CAdxMessage',
      'CAdxTechnicalInfos' => '\CAdxTechnicalInfos',
      'CAdxResultXml' => '\CAdxResultXml',
      'CAdxParamKeyValue' => '\CAdxParamKeyValue');

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     * @access public
     */
    public function __construct(array $options = array(), $wsdl = 'http://localhost:8124/soap-wsdl/syracuse/collaboration/syracuse/CAdxWebServiceSOAPXmlCC?wsdl')
    {
      foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
  
  parent::__construct($wsdl, $options);
    }

    /**
     * Run X3 sub program
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param string $inputXml
     * @access public
     * @return CAdxResultXml
     */
    public function run(CAdxCallContext $callContext, $publicName, $inputXml)
    {
      return $this->__soapCall('run', array($callContext, $publicName, $inputXml));
    }

    /**
     * Create X3 object
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param string $objectXml
     * @access public
     * @return CAdxResultXml
     */
    public function save(CAdxCallContext $callContext, $publicName, $objectXml)
    {
      return $this->__soapCall('save', array($callContext, $publicName, $objectXml));
    }

    /**
     * Delete X3 object
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param ArrayOfCAdxParamKeyValue $objectKeys
     * @access public
     * @return CAdxResultXml
     */
    public function delete(CAdxCallContext $callContext, $publicName, $objectKeys)
    {
      return $this->__soapCall('delete', array($callContext, $publicName, $objectKeys));
    }

    /**
     * Read X3 object
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param ArrayOfCAdxParamKeyValue $objectKeys
     * @access public
     * @return CAdxResultXml
     */
    public function read(CAdxCallContext $callContext, $publicName, $objectKeys)
    {
      return $this->__soapCall('read', array($callContext, $publicName, $objectKeys));
    }

    /**
     * Get X3 objects list
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param ArrayOfCAdxParamKeyValue $objectKeys
     * @param int $listSize
     * @access public
     * @return CAdxResultXml
     */
    public function query(CAdxCallContext $callContext, $publicName, $objectKeys, $listSize)
    {
      return $this->__soapCall('query', array($callContext, $publicName, $objectKeys, $listSize));
    }

    /**
     * Get X3 web service description regarding publication done in GESAWE
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @access public
     * @return CAdxResultXml
     */
    public function getDescription(CAdxCallContext $callContext, $publicName)
    {
      return $this->__soapCall('getDescription', array($callContext, $publicName));
    }

    /**
     * Update X3 object
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param ArrayOfCAdxParamKeyValue $objectKeys
     * @param string $objectXml
     * @access public
     * @return CAdxResultXml
     */
    public function modify(CAdxCallContext $callContext, $publicName, $objectKeys, $objectXml)
    {
      return $this->__soapCall('modify', array($callContext, $publicName, $objectKeys, $objectXml));
    }

    /**
     * Execute specific action on X3 object providing XML flow
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param string $actionCode
     * @param string $objectXml
     * @access public
     * @return CAdxResultXml
     */
    public function actionObject(CAdxCallContext $callContext, $publicName, $actionCode, $objectXml)
    {
      return $this->__soapCall('actionObject', array($callContext, $publicName, $actionCode, $objectXml));
    }

    /**
     * Execute specific action on X3 object providing keys
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param string $actionCode
     * @param ArrayOfCAdxParamKeyValue $objectKeys
     * @access public
     * @return CAdxResultXml
     */
    public function actionObjectKeys(CAdxCallContext $callContext, $publicName, $actionCode, $objectKeys)
    {
      return $this->__soapCall('actionObjectKeys', array($callContext, $publicName, $actionCode, $objectKeys));
    }

    /**
     * Get X3 web service schema regarding publication done in GESAWE
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @access public
     * @return CAdxResultXml
     */
    public function getDataXmlSchema(CAdxCallContext $callContext, $publicName)
    {
      return $this->__soapCall('getDataXmlSchema', array($callContext, $publicName));
    }

    /**
     * NOT YET IMPLEMENTED !!!
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param ArrayOfCAdxParamKeyValue $objectKeys
     * @param string $blocKey
     * @param string $lineKey
     * @param string $lineXml
     * @access public
     * @return CAdxResultXml
     */
    public function insertLines(CAdxCallContext $callContext, $publicName, $objectKeys, $blocKey, $lineKey, $lineXml)
    {
      return $this->__soapCall('insertLines', array($callContext, $publicName, $objectKeys, $blocKey, $lineKey, $lineXml));
    }

    /**
     * Remove lines from X3 object table
     *
     * @param CAdxCallContext $callContext
     * @param string $publicName
     * @param ArrayOfCAdxParamKeyValue $objectKeys
     * @param string $blocKey
     * @param ArrayOf_xsd_string $lineKeys
     * @access public
     * @return CAdxResultXml
     */
    public function deleteLines(CAdxCallContext $callContext, $publicName, $objectKeys, $blocKey, $lineKeys)
    {
      return $this->__soapCall('deleteLines', array($callContext, $publicName, $objectKeys, $blocKey, $lineKeys));
    }

}
