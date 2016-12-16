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
namespace Faonni\Browser\Block\Adminhtml\Info\Edit;

use Magento\Backend\Block\Widget\Tabs as TabsAbstract;

/**
 * Browser Adminhtml Info Edit Tabs
 */
class Tabs extends TabsAbstract
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
		
        $this->setId('faonni_browser_info_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Info'));
    }
}