<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Browser\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Browser Info Model
 */
class Info extends AbstractModel implements IdentityInterface
{
    /**
     * Cache tag
     */	
	const CACHE_TAG = 'FAONNI_BROWSER_INFO';
	
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'faonni_browser_info';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'info';
	
    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * When you use true - all cache will be clean
     *
     * @var string|array|bool
     */
    protected $_cacheTag = self::CACHE_TAG;
	
    /**
     * Model construct that should be used for object initialization
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
		
        $this->_init('Faonni\Browser\Model\ResourceModel\Info');
    }
	
    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        $tags = [];
        if ($this->getId()) {
            $tags[] = self::CACHE_TAG . '_' . $this->getId();
        }
        return $tags;        
    }
    /**
     * Load browser info by useragent string
     *
     * @param   string $userAgent
     * @return  $this
     */
    public function loadByUserAgent($userAgent)
    {
        $this->_getResource()->loadByUserAgent($this, $userAgent);
        return $this;
    }

    /**
     * Tells what the user's browser is capable of
     * 
     * @return array
     */
    public function getBrowser()
	{
		$data = $this->getData();
		unset($data['info_id'], $data['cache'], $data['created_at'], $data['updated_at']);
		
		return $data;
	}
}