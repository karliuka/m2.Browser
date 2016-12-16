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

use Magento\Framework\Exception\LocalizedException;
use Faonni\Browser\Controller\Adminhtml\Info;

/**
 * Browser Info delete controller
 */
class Delete extends Info;
{
    /**
     * Delete info action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */		
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $info = $this->_objectManager->create('Faonni\Browser\Model\Info');
                $info->load($id);
                $info->delete();
				
                $this->messageManager->addSuccess(__('You deleted the info.'));
                $this->_redirect('*/*/');
                return;
				
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __("We can't delete info right now. Please review the log and try again.")
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->messageManager->addError(__("We can't find a info to delete."));
        $this->_redirect('*/*/');
    }
}
