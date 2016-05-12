<?php

class CAdxResultXml
{

    /**
     * @var CAdxMessage[] $messages
     * @access public
     */
    public $messages = null;

    /**
     * @var string $resultXml
     * @access public
     */
    public $resultXml = null;

    /**
     * @var int $status
     * @access public
     */
    public $status = null;

    /**
     * @var CAdxTechnicalInfos $technicalInfos
     * @access public
     */
    public $technicalInfos = null;

    /**
     * @param int $status
     * @access public
     */
    public function __construct($status)
    {
      $this->status = $status;
    }

}
