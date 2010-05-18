<?php

namespace FORM\Mapping;

class FormMetadataInfo
{
    /**
     * @var string
     */
    protected $_name;

    /**
     * @var array of FieldMetadataInfo
     */
    protected $_fields = array();

    /**
     * @param string $className
     */
    public function __construct($className)
    {
        $this->_name = $className;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     * @return FormMetadataInfo
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this->_name;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * @param string $fieldName
     * @return FieldMetadataInfo
     */
    public function getField($fieldName)
    {
        return $this->_fields[$fieldName];
    }

    /**
     * @param FieldMetadataInfo $fieldData
     */
    public function addField(FieldMetadataInfo $fieldData)
    {
        $this->_fields[$fieldData->getName()] = $fieldData;
    }
}