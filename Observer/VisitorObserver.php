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
namespace Faonni\Browser\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Customer session init observer
 */
class VisitorObserver implements ObserverInterface
{
    /**
     * Handler for visitor init event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
		$visitor = $observer->getEvent()->getVisitor();
		$browser = get_browser(null, true);

		if ($browser) {
			$map = [
				'ismobiledevice'      => 'is_mobile',
				'istablet'            => 'is_tablet', 
				'issyndicationreader' => 'is_reader', 
				'crawler'             => 'is_crawler',
			];			
			$data = [	
				'browser'  => '',	
				'version'  => '',	
				'platform' => '', 
				'platform_version' => '', 
				'device_name'  => '', 
				'device_maker' => '',
				'device_type'  => '',					
				'is_mobile'  => 0,
				'is_tablet'  => 0, 
				'is_reader'  => 0, 
				'is_crawler' => 0,
			];
			foreach ($browser as $key => $value) {
				if (isset($map[$key])) {
					$key = $map[$key];
				}
				if (!empty($value) && $value != 'unknown') {
					$data[$key] = $value;
				}				
			}
			$visitor->addData($data);
			$visitor->save();
		}	
		return $this;
    }
}  
