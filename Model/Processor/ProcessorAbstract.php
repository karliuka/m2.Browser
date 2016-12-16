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
namespace Faonni\Browser\Model\Processor;

use Magento\Framework\DataObject;

/**
 * Faonni browser processor abstract model
 */
abstract class ProcessorAbstract extends DataObject
{
	/**
	 * Object field map
	 *
	 * @var array
	 */	
	protected $_map = [];
		
	/**
	 * Object attributes
	 *
	 * @var array
	 */	
	protected $_data = [

	/**
	 * Name of the browser
	 *
	 * @var string
	 */		
	'browser' => null,	

	/**
	 * Version of the browser
	 *
	 * @var string
	 */		
	'version' => null,	
		
	/**
	 * Operating system the browser is running in
	 *
	 * @var string
	 */	
	'platform' => null, 

	/**
	 * Full version number of this device's operating system
	 *
	 * @var string
	 */		
	'platform_version' => null, 

	/**
	 * Name of device browser is running on
	 *
	 * @var string
	 */		
	'device_name' => null, 

	/**
	 * Maker of device browser is running on
	 *
	 * @var string
	 */		
	'device_maker' => null,	

	/**
	 * Type of device browser is running on
	 *
	 * @var string
	 */		
	'device_type' => null,	

	/**
	 * True if the browser is a mobile device such as a smartphone or PDA
	 *
	 * @var int
	 */	    
	'is_mobile' => 0, 

	/**
	 * True if the browser is a tablet
	 *
	 * @var int
	 */	
	'is_tablet' => 0, 

	/**
	 * True if the browser is an RSS, Atom, or other XML-based feed reader or aggregator
	 *
	 * @var int
	 */		
	'is_reader' => 0, 

	/**
	 * True if the browser is automated software crawling the website
	 *
	 * @var int
	 */		
	'is_crawler' => 0, 
	];
	
    /**
     * Constructor
     *
     * By default is looking for first argument as array and assigns it as object attributes
     * This behavior may change in child classes
     *
     * @param array $map
     */
    public function __construct(array $map=[])
    {
        $this->_map = $map;
    }
    	
    /**
     * Tells what the user's browser is capable of.
     * The information is returned in an object or an array which will contain various data elements 
     * representing, for instance, the browser's major and minor version numbers and ID string; 
     * 
     * @param string $userAgent The User Agent to be analyzed.
     * @return array|bool
     */
    abstract public function getBrowser($userAgent=null);
    
    /**
     * Convert browser fields
     *
     * @param   array $browser
     * @return  array
     */
    public function convert($browser=null)
    {
        if (is_array($browser)) {
			foreach ($this->_data as $key => $value) {
				$column = (isset($this->_map[$key])) ? $this->_map[$key] : $key;
				if (!isset($browser[$column])) continue;
				
				$value = (in_array($browser[$column], ['unknown', 'Various'])) 
					? '' 
					: $browser[$column];
				$this->setdata($key, $value);
			}
		}
        return $this->getData();
    }    	
}
