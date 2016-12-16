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
 * Browser Info edit controller
 */
class Edit extends Info
{
    /**
     * Info edit form
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $info = $this->_objectManager->create('Faonni\Browser\Model\Info');

        if ($id) {
            $info->load($id);
            if (!$info->getId()) {
                $this->messageManager->addError(__('This info no longer exists.'));
                $this->_redirect('*/*');
                return;
            }
        }
		
        // set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $info->addData($data);
        }
        $this->_coreRegistry->register('current_faonni_browser_info', $info);
		
        $this->_initAction();
        $this->_view->getLayout()->getBlock('faonni_browser_info_edit');
        $this->_view->renderLayout();
    }
}
