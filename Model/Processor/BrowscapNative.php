<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Browser\Model\Processor;

use Faonni\Browser\Model\Processor\ProcessorAbstract;

/**
 * Faonni browser processor BrowscapNative model
 */
class BrowscapNative extends ProcessorAbstract
{
    /**
     * Tells what the user's browser is capable of.
     * The information is returned in an object or an array which will contain various data elements 
     * representing, for instance, the browser's major and minor version numbers and ID string; 
     * 
     * @param string $userAgent The User Agent to be analyzed.
     * @return array|bool
     */
    public function getBrowser($userAgent=null)
    {
		$browser = get_browser($userAgent, true);		
		return $this->convert($browser);
	}
}
