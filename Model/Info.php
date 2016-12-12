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
namespace Faonni\Browser\Model;
 
use Magento\Framework\DataObject;

/**
 * Browser info model
 */
class Info extends DataObject
{
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
	 * True if the browser is a mobile device such as a smartphone or PDA
	 *
	 * @var bool
	 */	    
    'ismobiledevice' => false, 
	
	/**
	 * True if the browser is a tablet
	 *
	 * @var bool
	 */	
	'istablet' => false, 
	
	/**
	 * True if the browser is an RSS, Atom, or other XML-based feed reader or aggregator
	 *
	 * @var bool
	 */		
    'issyndicationreader' => false, 
	
	/**
	 * True if the browser is automated software crawling the website
	 *
	 * @var bool
	 */		
    'crawler' => false, 
	];
	
	/**
     * Check if the device is mobile. Returns true if the browser is a mobile device such as a 
     * smartphone or PDA
	 *
     * @return bool
     */
    public function isMobile()
    {
		return $this->_data['ismobiledevice'];
    }
	
	/**
     * Check if the device is tablet. Returns true if the browser is a tablet device
	 *
     * @return bool
     */
    public function isTablet()
    {
		return $this->_data['istablet'];
    }
	
	/**
     * Check if the device is crawler.Returns true if the browser is automated software crawling the 
     * website
	 *
     * @return bool
     */
    public function isCrawler()
    {
		return $this->_data['crawler'];
    }
	
	/**
     * Check if the device is syndication reader. Returns true if the browser is an RSS, Atom, or 
     * other XML-based feed reader or aggregator
	 *
     * @return bool
     */
    public function isReader()
    {
		return (bool)$this->_data['issyndicationreader'];
    }
	
	/**
     * Returns name of the browser
	 *
     * @return string
     */
    public function getName()
    {
		return $this->_data['browser'];
    }
	
	/**
     * Returns full version number of the browser
	 *
     * @return string
    */
    public function getVersion()
    {
		return $this->_data['version'];
    }
	
	/**
     * Returns operating system the browser is running in
	 *
     * @return string
     */
    public function getPlatform()
    {
		return $this->_data['platform'];
    }
	
	/**
     * Returns operating system version the browser is running in
	 *
     * @return string
     */
    public function getPlatformVersion()
    {
		return $this->_data['platform_version'];
    }	
	
	/**
     * Returns name of device browser is running on
	 *
     * @return string
     */
    public function getDeviceName()
    {
		return $this->_data['device_name'];
    }
	
	/**
     * Returns maker of device browser is running on
	 *
     * @return string
     */
    public function getDeviceMaker()
    {
		return $this->_data['device_maker'];
    }	
}