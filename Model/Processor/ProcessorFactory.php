<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Browser\Model\Processor;

use Magento\Framework\ObjectManagerInterface;
use Faonni\Browser\Model\Processor\ProcessorConfig;

/**
 * Faonni browser processor factory
 */
class ProcessorFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @var \Faonni\Browser\Model\Processor\ProcessorConfig
     */
    protected $_config;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \Faonni\Browser\Model\Processor\ProcessorConfig $config
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ProcessorConfig $config
    ) {
        $this->_objectManager = $objectManager;
        $this->_config = $config;
    }

    /**
     * Create new processor object
     *
     * @param string $processorName
     * @param array $data
     * @throws \InvalidArgumentException
     * @throws \UnexpectedValueException
     * @return \Faonni\Browser\Model\Processor\ProcessorAbstract
     */
    public function create($processorName, array $data = [])
    {
        $processorClass = $this->_config->getProcessorClass($processorName);
        if (!$processorClass) {
            throw new \InvalidArgumentException("Browser processor '{$processorName}' is not defined.");
        }
        
        $data['map'] = $this->_config->getProcessorFieldMap($processorName);
                
        $processorInstance = $this->_objectManager->create($processorClass, $data);
        if (!$processorInstance instanceof \Faonni\Browser\Model\Processor\ProcessorAbstract) {
            throw new \UnexpectedValueException(
                "Class '{$processorClass}' has to implement \\Faonni\\Browser\\Model\\Processor\\ProcessorAbstract."
            );
        }        
        return $processorInstance;
    }
}
