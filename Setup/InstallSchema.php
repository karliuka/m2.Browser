<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Browser\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Faonni_Browser InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module Faonni_Browser
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $connection = $installer->getConnection();
		
        /**
         * Create table 'faonni_browser_info'
         */		
        if (!$installer->tableExists('faonni_browser_info')) {
            $table = $connection->newTable(
					$installer->getTable('faonni_browser_info')
				)
				->addColumn(
                    'info_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true],
                    'Info Id'
                )
				->addColumn(
                    'cache',
                    Table::TYPE_TEXT,
                    32,
                    ['nullable' => false],
                    'Cache'
                )
				->addColumn(
                    'browser',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default'  => ''],
                    'Name browser'
                )
				->addColumn(
                    'version',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default'  => ''],
                    'Version browser'
                )
				->addColumn(
                    'platform',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default'  => ''],
                    'Operating system'
                )				
				->addColumn(
                    'platform_version',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default'  => ''],
                    'Version operating system'
                )
				->addColumn(
                    'device_name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default'  => ''],
                    'Name device'
                )
				->addColumn(
                    'device_maker',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default'  => ''],
                    'Name maker'
                )				
				->addColumn(
                    'device_type',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default'  => ''],
                    'Device Type'
                )
				->addColumn(
                    'is_reader',
                    Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Device is syndication reader'
                )
				->addColumn(
                    'is_mobile',
                    Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Device is mobile'
                )
				->addColumn(
                    'is_tablet',
                    Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Device is tablet'
                )
				->addColumn(
                    'is_crawler',
                    Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Is crawler'
                )
				->addColumn(
					'created_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
					'Creation Time'
				)
				->addColumn(
					'updated_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
					'Update Time'
				)
				->addColumn(
                    'user_agent',
                    Table::TYPE_TEXT,
                    '2M',
                    ['nullable' => false, 'default'  => ''],
                    'User agent string'
                )				
				->addIndex(
					$installer->getIdxName('faonni_browser_info', ['cache'], AdapterInterface::INDEX_TYPE_UNIQUE),
					['cache'], ['type' => AdapterInterface::INDEX_TYPE_UNIQUE]
				)
				->addIndex(
					$installer->getIdxName('faonni_browser_info', ['device_type']),
					['device_type']
				)				
				->addIndex(
					$installer->getIdxName('faonni_browser_info', ['is_reader']),
					['is_reader']
				)	
				->addIndex(
					$installer->getIdxName('faonni_browser_info', ['is_mobile']),
					['is_mobile']
				)	
				->addIndex(
					$installer->getIdxName('faonni_browser_info', ['is_tablet']),
					['is_tablet']
				)	
				->addIndex(
					$installer->getIdxName('faonni_browser_info', ['is_crawler']),
					['is_crawler']
				)					
				->setComment(
                    'Faonni Browser Info Table'
                );
				
            $connection->createTable($table);
		}
        
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
            'device_type',
            [
                'type' => Table::TYPE_TEXT,
                'length'   => 255,
                'nullable' => false,
                'default'  => '',
                'comment'  => 'Device Type'
            ]
        );
        
        $connection->addColumn(
            $installer->getTable('customer_visitor'),
            'is_reader',
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
            'is_mobile',
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
            'is_tablet',
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
            'is_crawler',
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
			$installer->getIdxName('customer_visitor', ['device_type']),
			['device_type']
		); 
        
		$connection->addIndex(
			$installer->getTable('customer_visitor'),
			$installer->getIdxName('customer_visitor', ['is_reader']),
			['is_reader']
		);  
        
		$connection->addIndex(
			$installer->getTable('customer_visitor'),
			$installer->getIdxName('customer_visitor', ['is_mobile']),
			['is_mobile']
		); 		
        
		$connection->addIndex(
			$installer->getTable('customer_visitor'),
			$installer->getIdxName('customer_visitor', ['is_tablet']),
			['is_tablet']
		); 		
        
		$connection->addIndex(
			$installer->getTable('customer_visitor'),
			$installer->getIdxName('customer_visitor', ['is_crawler']),
			['is_crawler']
		); 		
                                            
        $installer->endSetup();
    }
}