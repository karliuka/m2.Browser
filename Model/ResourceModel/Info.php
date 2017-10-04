<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
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