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

/**
 * Plugin for \Magento\Customer\Model\Visitor
 */
class Visitor
{
    /**
     * @var \Magento\Framework\Session\SessionManagerInterface
     */
    protected $session;
    
    /**
     * @param \Magento\Framework\Session\SessionManagerInterface $session
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        SessionManagerInterface $session
    ) {
        $this->session = $session;
    }
        	
    /**
     * Initialization visitor by request
     *
     * @param $subject \Magento\Customer\Model\Visitor
     * @param $observer \Magento\Framework\Event\Observer
     * @return \Faonni\Browser\Model\Plugin\Visitor
     */	
    public function beforeInitByRequest($subject, $observer) 
    {
        $subject->setSkipRequestLogging(false); 
        return null;
    }
    
    /**
     * Save visitor by request
     *
     * @param $subject \Magento\Customer\Model\Visitor
     * @param $observer \Magento\Framework\Event\Observer
     * @return \Faonni\Browser\Model\Plugin\Visitor
     */	
    public function beforeSaveByRequest($subject, $observer) 
    {
        $subject->setSkipRequestLogging(false);       
        return null;
    }	    	
} 
