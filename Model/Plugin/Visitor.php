<?php
/**
 * Faonni
 *  
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade module to newer
 * versions in the future.
 * 
 * @package     Faonni_Browser
 * @copyright   Copyright (c) 2016 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Faonni\Browser\Model\Plugin; 

use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\HTTP\Header;
use Magento\Framework\View\Element\Context;
use Faonni\Browser\Model\Processor\ProcessorFactory;

/**
 * Plugin for \Magento\Customer\Model\Visitor
 */
class Visitor
{ 
    /**
     * @var \Magento\Framework\HTTP\Header
     */
    protected $_httpHeader; 
    	
    /**
     * @var \Magento\Framework\Session\SessionManagerInterface
     */
    protected $_session;

    /**
     * System event manager
     *
     * @var \Magento\Framework\Event\ManagerInterface
     */
    protected $_eventManager;    
    
    /**
     * @var \Faonni\Browser\Model\Processor\ProcessorFactory
     */
    protected $_processorFactory;  

    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;		
    
    /**
     * @param \Magento\Framework\Session\SessionManagerInterface $session
     * @param \Faonni\Browser\Model\Processor\ProcessorFactory $processorFactory
     * @param \Magento\Framework\HTTP\Header $httpHeader
	 * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \Magento\Framework\View\Element\Context $context 
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        SessionManagerInterface $session,
        ProcessorFactory $processorFactory,
        Header $httpHeader,
		ObjectManagerInterface $objectManager,
        Context $context
    ) {
        $this->_session = $session;
        $this->_processorFactory = $processorFactory;
        $this->_httpHeader = $httpHeader;
		$this->_objectManager = $objectManager;
        $this->_eventManager = $context->getEventManager();
    }
    
    /**
     * Initialization visitor by request
     *
     * @param $subject \Magento\Customer\Model\Visitor
     * @param $proceed \callable	 
     * @param $observer \Magento\Framework\Event\Observer 
     * @return \Magento\Customer\Model\Visitor
     */
    public function aroundInitByRequest($subject, $proceed, $observer)    
    {	
        $subject->setSkipRequestLogging(false);        
        if ($subject->isModuleIgnored($observer)) {
            return $subject;
        }
		
        if ($this->_session->getVisitorData()) {          
			$subject->setData($this->_session->getVisitorData());
        }
		
        $subject->setLastVisitAt((new \DateTime())->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT));

        if (!$subject->getId()) {						
			$userAgent = $this->_httpHeader->getHttpUserAgent();
			$info = $this->_objectManager->create('Faonni\Browser\Model\Info');
			$info->loadByUserAgent($userAgent);
			
			if ($info->getId()) {
				$browserInfo = $info->getBrowser(); 
			} else {
				$processor = $this->_processorFactory->create('browscap_php');
				$browserInfo = $processor->getBrowser($userAgent);
				$info->addData($browserInfo);
				$info->save();
			}

			if ($browserInfo) {				
				$subject->addData($browserInfo);
			}
			
            $subject->setSessionId($this->_session->getSessionId());
            $subject->save();
            
            $this->_eventManager->dispatch('visitor_init', ['visitor' => $subject]);  			
            $this->_session->setVisitorData($subject->getData());
        }       		
		return $subject;
	}	
} 
