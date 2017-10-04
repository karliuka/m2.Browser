<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Browser\Model\Processor;

/**
 * Faonni browser processor config 
 */
class ProcessorConfig
{
    /**
     * Processor config list
     * 
     * @var array
     */
    private $_config;

    /**
     * Validate format of processors configuration array
     *
     * @param array $config
     * @throws \InvalidArgumentException
     */
    public function __construct(array $config)
    {
        foreach ($config as $processorName => $processorInfo) {
            if (!is_string($processorName) || empty($processorName)) {
                throw new \InvalidArgumentException('Name for a browser processor has to be specified.');
            }
            if (empty($processorInfo['class'])) {
                throw new \InvalidArgumentException('Class for a browser processor has to be specified.');
            }
            if (empty($processorInfo['label'])) {
                throw new \InvalidArgumentException('Label for a browser processor has to be specified.');
            }
        }
        $this->_config = $config;
    }

    /**
     * Retrieve unique names of all available browser processors
     *
     * @return array
     */
    public function getAvailableProcessors()
    {
        return array_keys($this->_config);
    }

    /**
     * Retrieve name of a class that corresponds to processor name
     *
     * @param string $processorName
     * @return string|null
     */
    public function getProcessorClass($processorName)
    {
        if (isset($this->_config[$processorName]['class'])) {
            return $this->_config[$processorName]['class'];
        }
        return null;
    }

    /**
     * Retrieve already translated label that corresponds to processor name
     *
     * @param string $processorName
     * @return \Magento\Framework\Phrase|null
     */
    public function getProcessorLabel($processorName)
    {
        if (isset($this->_config[$processorName]['label'])) {
            return __($this->_config[$processorName]['label']);
        }
        return null;
    }
    
    /**
     * Retrieve field map that corresponds to processor name
     *
     * @param string $processorName
     * @return array|null
     */
    public function getProcessorFieldMap($processorName)
    {
        if (isset($this->_config[$processorName]['fieldMap'])) {
            return $this->_config[$processorName]['fieldMap'];
        }
        return null;
    }    
}
