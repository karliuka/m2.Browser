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
namespace Faonni\Browser\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Browser Info ResourceModel
 */
class Info extends AbstractDb
{
    /**
     * Model Initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('faonni_browser_info', 'info_id');
    }

    /**
     * Load browser info by useragent string
     *
     * @param \Faonni\Browser\Model\Info $info
     * @param string $userAgent
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function loadByUserAgent(\Faonni\Browser\Model\Info $info, $userAgent)
    {
        $cache = md5($userAgent);
		$connection = $this->getConnection();
        $bind = ['cache' => $cache];
		
        $select = $connection->select()->from(
            $this->getMainTable(),
            [$this->getIdFieldName()]
        )->where('cache = :cache');

        $infoId = $connection->fetchOne($select, $bind);
        if ($infoId) {
            $this->load($info, $infoId);
        } else {
            $info->setData(['cache' => $cache]);
        }

        return $this;
    }	
}