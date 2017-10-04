<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Browser\Block\Adminhtml;

use \Magento\Backend\Block\Widget\Grid\Container;

/**
 * Browser Adminhtml Info Container
 */
class Info extends Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'info';
        $this->_headerText = __('Browsers Info');

        parent::_construct();
    }
}
