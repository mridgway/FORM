<?php

namespace FORM\Mapping;

class FormMetadataFactory
{
    /**
     * @var FORM\FormManager
     */
    protected $_fm;

    /**
     * @var Driver\Driver
     */
    protected $_driver;

    /**
     * @var array
     */
    protected $_loadedMetadata;

    /**
     * @param FormManager $fm
     */
    public function __construct(\FORM\FormManager $fm)
    {
        $this->_fm = $fm;
        $this->_driver = $fm->getConfiguration()->getMetadataDriverImpl();
    }

    /**
     * Retrieves form metadata for a given class
     *
     * @param string $className
     * @return FormMetadata
     */
    public function getFormMetadataFor($className)
    {
        if (!isset($this->_loadedMetadata[$className])) {
            $metadata = new FormMetadata($className);
            $this->_driver->loadFormMetadataForClass($className, $metadata);
            $this->_loadedMetadata[$className] = $metadata;
        }
        return $this->_loadedMetadata[$className];
    }
}