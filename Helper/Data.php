<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Browser\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Faonni Browser Data helper
 */
class Data extends AbstractHelper
{
    /**
     * Browser processor code config path
     */
    const XML_BROWSER_PROCESSOR = 'web/browser_capabilities/processor';
    	
    /**
     * Retrieve browser processor code
     *
     * @return string
     */
    public function getProcessor()
    {
        return $this->_getConfig(self::XML_BROWSER_PROCESSOR);
    } 

    /**
     * Retrieve store configuration data
     *
     * @param   string $path
     * @return  string|null
     */
    protected function _getConfig($path)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }      
}
