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
namespace Faonni\Browser\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Faonni_Browser InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $connection = $installer->getConnection();
        
        /**
         * Add columns to 'customer_visitor'
         */	
		$connection->addColumn(
            $installer->getTable('customer_visitor'),
            'browser',
            [
                'type' => Table::TYPE_TEXT,
                'length'   => 255,
                'nullable' => false,
                'default'  => '',
                'comment'  => 'Name browser'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'version',
            [
                'type' => Table::TYPE_TEXT,
                'length'   => 255,
                'nullable' => false,
                'default'  => '',
                'comment'  => 'Version browser'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'platform',
            [
                'type' => Table::TYPE_TEXT,
                'length'   => 255,
                'nullable' => false,
                'default'  => '',
                'comment'  => 'Operating system'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'platform_version',
            [
                'type' => Table::TYPE_TEXT,
                'length'   => 255,
                'nullable' => false,
                'default'  => '',
                'comment'  => 'Version operating system'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'device_name',
            [
                'type' => Table::TYPE_TEXT,
                'length'   => 255,
                'nullable' => false,
                'default'  => '',
                'comment'  => 'Name device'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'device_maker',
            [
                'type' => Table::TYPE_TEXT,
                'length'   => 255,
                'nullable' => false,
                'default'  => '',
                'comment'  => 'Name maker'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'device_maker',
            [
                'type' => Table::TYPE_TEXT,
                'length'   => 255,
                'nullable' => false,
                'default'  => '',
                'comment'  => 'Name maker'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'issyndicationreader',
            [
                'type' => Table::TYPE_SMALLINT,
				'unsigned' => true,
                'nullable' => false,
                'default'  => '0',
                'comment'  => 'Device is syndication reader'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'ismobiledevice',
            [
                'type' => Table::TYPE_SMALLINT,
				'unsigned' => true,
                'nullable' => false,
                'default'  => '0',
                'comment'  => 'Device is mobile'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'istablet',
            [
                'type' => Table::TYPE_SMALLINT,
				'unsigned' => true,
                'nullable' => false,
                'default'  => '0',
                'comment'  => 'Device is tablet'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'crawler',
            [
                'type' => Table::TYPE_SMALLINT,
				'unsigned' => true,
                'nullable' => false,
                'default'  => '0',
                'comment'  => 'Is crawler'
            ]
        );
        
		$connection->addIndex(
			$installer->getTable('customer_visitor'),
			$installer->getIdxName('customer_visitor', ['issyndicationreader']),
			['issyndicationreader']
		);  
        
		$connection->addIndex(
			$installer->getTable('customer_visitor'),
			$installer->getIdxName('customer_visitor', ['ismobiledevice']),
			['ismobiledevice']
		); 		
        
		$connection->addIndex(
			$installer->getTable('customer_visitor'),
			$installer->getIdxName('customer_visitor', ['istablet']),
			['istablet']
		); 		
        
		$connection->addIndex(
			$installer->getTable('customer_visitor'),
			$installer->getIdxName('customer_visitor', ['crawler']),
			['crawler']
		); 		
                                            
        $installer->endSetup();
    }
}
