<?php

class CAdxTechnicalInfos
{

    /**
     * @var boolean $busy
     * @access public
     */
    public $busy = null;

    /**
     * @var boolean $changeLanguage
     * @access public
     */
    public $changeLanguage = null;

    /**
     * @var boolean $changeUserId
     * @access public
     */
    public $changeUserId = null;

    /**
     * @var boolean $flushAdx
     * @access public
     */
    public $flushAdx = null;

    /**
     * @var float $loadWebsDuration
     * @access public
     */
    public $loadWebsDuration = null;

    /**
     * @var int $nbDistributionCycle
     * @access public
     */
    public $nbDistributionCycle = null;

    /**
     * @var float $poolDistribDuration
     * @access public
     */
    public $poolDistribDuration = null;

    /**
     * @var int $poolEntryIdx
     * @access public
     */
    public $poolEntryIdx = null;

    /**
     * @var float $poolExecDuration
     * @access public
     */
    public $poolExecDuration = null;

    /**
     * @var float $poolRequestDuration
     * @access public
     */
    public $poolRequestDuration = null;

    /**
     * @var float $poolWaitDuration
     * @access public
     */
    public $poolWaitDuration = null;

    /**
     * @var string $processReport
     * @access public
     */
    public $processReport = null;

    /**
     * @var int $processReportSize
     * @access public
     */
    public $processReportSize = null;

    /**
     * @var boolean $reloadWebs
     * @access public
     */
    public $reloadWebs = null;

    /**
     * @var boolean $resumitAfterDBOpen
     * @access public
     */
    public $resumitAfterDBOpen = null;

    /**
     * @var int $rowInDistribStack
     * @access public
     */
    public $rowInDistribStack = null;

    /**
     * @var float $totalDuration
     * @access public
     */
    public $totalDuration = null;

    /**
     * @var string $traceRequest
     * @access public
     */
    public $traceRequest = null;

    /**
     * @var int $traceRequestSize
     * @access public
     */
    public $traceRequestSize = null;

    /**
     * @param boolean $busy
     * @param boolean $changeLanguage
     * @param boolean $changeUserId
     * @param boolean $flushAdx
     * @param float $loadWebsDuration
     * @param int $nbDistributionCycle
     * @param float $poolDistribDuration
     * @param int $poolEntryIdx
     * @param float $poolExecDuration
     * @param float $poolRequestDuration
     * @param float $poolWaitDuration
     * @param int $processReportSize
     * @param boolean $reloadWebs
     * @param boolean $resumitAfterDBOpen
     * @param int $rowInDistribStack
     * @param float $totalDuration
     * @param int $traceRequestSize
     * @access public
     */
    public function __construct($busy, $changeLanguage, $changeUserId, $flushAdx, $loadWebsDuration, $nbDistributionCycle, $poolDistribDuration, $poolEntryIdx, $poolExecDuration, $poolRequestDuration, $poolWaitDuration, $processReportSize, $reloadWebs, $resumitAfterDBOpen, $rowInDistribStack, $totalDuration, $traceRequestSize)
    {
      $this->busy = $busy;
      $this->changeLanguage = $changeLanguage;
      $this->changeUserId = $changeUserId;
      $this->flushAdx = $flushAdx;
      $this->loadWebsDuration = $loadWebsDuration;
      $this->nbDistributionCycle = $nbDistributionCycle;
      $this->poolDistribDuration = $poolDistribDuration;
      $this->poolEntryIdx = $poolEntryIdx;
      $this->poolExecDuration = $poolExecDuration;
      $this->poolRequestDuration = $poolRequestDuration;
      $this->poolWaitDuration = $poolWaitDuration;
      $this->processReportSize = $processReportSize;
      $this->reloadWebs = $reloadWebs;
      $this->resumitAfterDBOpen = $resumitAfterDBOpen;
      $this->rowInDistribStack = $rowInDistribStack;
      $this->totalDuration = $totalDuration;
      $this->traceRequestSize = $traceRequestSize;
    }

}
