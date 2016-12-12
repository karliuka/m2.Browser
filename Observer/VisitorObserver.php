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
			$data = [	
				'crawler'  => 0,
				'browser'  => '',	
				'version'  => '',	
				'platform' => '', 
				'platform_version'    => '', 
				'device_name'         => '', 
				'device_maker'        => '',	
				'ismobiledevice'      => 0,
				'istablet'            => 0, 
				'issyndicationreader' => 0, 
			];
			foreach ($data as $key => $value) {
				if (!empty($browser[$key])) {
					$data[$key] = $browser[$key];
				}
			}
			$visitor->addData($data);
			$visitor->save();
		}	
		return $this;
    }
}  
