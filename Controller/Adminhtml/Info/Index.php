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
namespace Faonni\Browser\Controller\Adminhtml\Info;

use Faonni\Browser\Controller\Adminhtml\Info;

/**
 * Browser Info index controller
 */
class Index extends Info
{
    /**
     * Info list
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
		
        $resultPage->setActiveMenu('Faonni_Browser::info');
        $resultPage->getConfig()->getTitle()->prepend(__('Info'));
		
        $resultPage->addBreadcrumb(__('Info'), __('Info'));
        $resultPage->addBreadcrumb(__('Info'), __('Info'));
		
        return $resultPage;
    }
}
