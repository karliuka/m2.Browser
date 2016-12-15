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
namespace Faonni\Browser\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Faonni\Browser\Model\Processor\ProcessorConfig;

/**
 * Source of option values in a form of value-label pairs
 */
class Processor implements ArrayInterface
{
    /**
     * @var \Faonni\Browser\Model\Processor\ProcessorConfig
     */
    protected $_config;

    /**
     * Options as value-label pairs
     * 
     * @var array
     */
    protected $_options;

    /**
     * @param \Faonni\Browser\Model\Processor\ProcessorConfig $config
     */
    public function __construct(
        ProcessorConfig $config
    ) {
        $this->_config = $config;
    }

    /**
     * Return array of options as value-label pairs
     *
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->_options === null) {
            $this->_options = [];
            foreach ($this->_config->getAvailableProcessors() as $processorName) {
                $this->_options[] = [
                    'label' => $this->_config->getProcessorLabel($processorName),
                    'value' => $processorName,
                ];
            }
        }
        return $this->_options;
    }
} 
