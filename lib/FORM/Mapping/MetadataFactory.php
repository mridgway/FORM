<?php

namespace FORM\Mapping;

class MetadataFactory
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
     * @return FormMetadataInfo
     */
    public function getFormMetadataFor($className)
    {
        if (!isset($this->_loadedMetadata[$className])) {
            $metadata = new FormMetadata($className);
            $this->_driver->loadFormMetadataForClass($className, $metadata);
            foreach($metadata->getFields() AS $fieldName => $data) {
                if (null === $data) {
                    $fieldMetadata = new FieldMetadata($fieldName);
                    $this->_driver->loadFieldMetadataForClass($className, $fieldName, $fieldMetadata);
                    $metadata->removeField($fieldName);
                    $metadata->addField($fieldMetadata);
                }
            }
            $this->_loadedMetadata[$className] = $metadata;
        }
        return $this->_loadedMetadata[$className];
    }

    /**
     * Retrieves form metadata for a given field
     *
     * @param string $className
     * @return FieldMetadataInfo
     */
    public function getFieldMetadataFor($className, $fieldName)
    {
        $classFields = $this->getFormMetadataFor($className)->getFields();
        if (!array_key_exists($fieldName, $classFields)) {
            $metadata = new FieldMetadata($fieldName);
            $this->_driver->loadFieldMetadataForClass($className, $fieldName, $metadata);
            $this->getFormMetadataFor($className)->addField($metadata);
        }
        return $this->_loadedMetadata[$className]->getField($fieldName);
    }

    /**
     * @return FORM\FormManager
     */
    public function getFormManager()
    {
        return $this->_fm;
    }
}