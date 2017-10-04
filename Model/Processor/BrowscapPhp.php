<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\Browser\Model\Processor;

use Magento\Framework\Filesystem;
use Magento\Framework\App\Filesystem\DirectoryList;
use Faonni\Browser\Model\Processor\ProcessorAbstract;
use Faonni\Browser\Model\Browscap;

/**
 * Faonni browser processor BrowscapPhp model
 */
class BrowscapPhp extends ProcessorAbstract
{
    /**
     * Path to the cache directory
     *
     * @var string
     */
    public $cacheDir = 'browser/browscap';
    	
    /**
     * @var \Magento\Framework\Filesystem\Directory\Write
     */
    protected $_directory;
    	
    /**
     * Constructor
     *
     * By default is looking for first argument as array and assigns it as object attributes
     * This behavior may change in child classes
     *
     * @param \Magento\Framework\Filesystem $filesystem
     * @param array $map
     */
    public function __construct(
		Filesystem $filesystem,
		array $map=[]
	) {
        $this->_directory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        parent::__construct($map);
    }
    	
    /**
     * Tells what the user's browser is capable of.
     * The information is returned in an object or an array which will contain various data elements 
     * representing, for instance, the browser's major and minor version numbers and ID string; 
     * 
     * @param string $userAgent The User Agent to be analyzed.
     * @return array|bool
     */
    public function getBrowser($userAgent=null)
    {
        if (!$this->_directory->isExist($this->cacheDir)) {
            $this->_directory->create($this->cacheDir);
        }		
		$browscap = new Browscap($this->_directory->getAbsolutePath($this->cacheDir));
		$browser = $browscap->getBrowser($userAgent, true);	
		
		return $this->convert($browser);		
	}
}
