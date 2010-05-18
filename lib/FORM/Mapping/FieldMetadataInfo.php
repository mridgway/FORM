<?php

namespace FORM\Mapping;

class FieldMetadataInfo
{
    /**
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_type;

    /**
     * @var string
     */
    protected $_label;

    /**
     * @var string
     */
    protected $_description;

    /**
     * @var mixed
     */
    protected $_defaultValue;

    /**
     * @var integer
     */
    protected $_order = 0;

    /**
     * @var boolean
     */
    protected $_required = false;

    /**
     * @var boolean
     */
    protected $_allowEmpty = false;

    /**
     * @var array
     */
    protected $_validators = array();

    /**
     * @var array
     */
    protected $_filters = array();

    /**
     * @param string $fieldName
     */
    public function __construct($fieldName)
    {
        $this->setName($fieldName);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $_name
     * @return FieldMetadataInfo
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param string $type
     * @return FieldMetadataInfo
     */
    public function setType($type)
    {
        $this->_type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @param string $label
     * @return FieldMetadataInfo
     */
    public function setLabel($label)
    {
        $this->_label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param string $description
     * @return FieldMetadataInfo
     */
    public function setDescription($description)
    {
        $this->_description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->_defaultValue;
    }

    /**
     * @param mixed $defaultValue
     * @return FieldMetadataInfo
     */
    public function setDefaultValue($defaultValue)
    {
        $this->_defaultValue = $defaultValue;
        return $this;
    }

    /**
     * @return integer
     */
    public function getOrder()
    {
        return $this->_order;
    }

    /**
     * @param integer $order
     * @return FieldMetadataInfo
     */
    public function setOrder($order)
    {
        $this->_order = $order;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getRequired()
    {
        return $this->_required;
    }

    /**
     * @param boolean $required
     * @return FieldMetadataInfo
     */
    public function setRequired($required = true)
    {
        $this->_required = $required;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getAllowEmpty()
    {
        return $this->_allowEmpty;
    }

    /**
     * @param boolean $allowEmpty
     * @return FieldMetadataInfo
     */
    public function setAllowEmpty($allowEmpty)
    {
        $this->_allowEmpty = $allowEmpty;
        return $this;
    }

    /**
     * @return array
     */
    public function getValidators()
    {
        return $this->_validators;
    }

    /**
     * @param array $validators
     * @return FieldMetadataInfo
     */
    public function setValidators(array $validators = array())
    {
        $this->_validators = $validators;
        return $this;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->_filters;
    }

    /**
     * @param array $filters
     * @return FieldMetadataInfo
     */
    public function setFilters(array $filters = array())
    {
        $this->_filters = $filters;
        return $this;
    }
}