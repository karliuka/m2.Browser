<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
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
        $resultPage->getConfig()->getTitle()->prepend(__('Browsers Info'));
		
        $resultPage->addBreadcrumb(__('Browsers Info'), __('Browsers Info'));
        $resultPage->addBreadcrumb(__('Browsers Info'), __('Browsers Info'));
		
        return $resultPage;
    }
}
