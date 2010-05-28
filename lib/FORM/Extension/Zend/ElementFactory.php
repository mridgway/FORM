<?php

namespace FORM\Extension\Zend;

class ElementFactory implements \FORM\Element\ElementFactoryInterface
{
    /**
     * {@inheritdoc}
     *
     * @param string $type
     * @param FormMetadataInfo $metadata
     */
    public function createElement($name, \FORM\Mapping\FieldMetadataInfo $metadata)
    {
        $func = 'create' . ucfirst($metadata->getType()) . 'Element';
        /* @var $element Zend_Form_Element */
        $element = call_user_func(array($this, $func), $name, $metadata);
        $element->setLabel($metadata->getLabel());
        $element->setDescription($metadata->getDescription());
        if ($metadata->getOrder()) {
            $element->setOrder($metadata->getOrder());
        }
        $element->setRequired($metadata->getRequired());
        $element->setValue($metadata->getDefaultValue());
        $element->setValidators($this->getValidators($metadata->getValidators()));
        return $element;
    }

    public function createTextElement($name, \FORM\Mapping\FieldMetadataInfo $metadata)
    {
        return new \Zend_Form_Element_Text($name);
    }

    public function createTextareaElement($name, \FORM\Mapping\FieldMetadataInfo $metadata)
    {
        return new \Zend_Form_Element_Textarea($name);
    }

    public function createCheckboxElement($name, \FORM\Mapping\FieldMetadataInfo $metadata)
    {
        return new \Zend_Form_Element_Checkbox($name);
    }

    public function getValidators(array $validators)
    {
        $zendValidators = array();
        foreach($validators AS $validator) {
            $zendValidators[] = $this->getValidator($validator);
        }
        return $zendValidators;
    }

    public function getValidator($validator)
    {
        $arguments = array();
        if (is_array($validator)) {
            $arguments = $validator;
            $validator = array_shift($arguments);
        }

        switch ($validator) {
            case 'date' :
                return new \Zend_Validate_Date();
            case 'maxLength' :
                return new \Zend_Validate_StringLength(0, $arguments[0]);
            case 'integer' :
                return new \Zend_Validate_Int();
            case 'float' :
                return new \Zend_Validate_Float();
        }
    }

    public function getFilters(array $filters)
    {
        $zendFliters = array();
        foreach($filters AS $filter) {
            $zendFilters[] = $this->getFilter($filter);
        }
        return $zendFilters;
    }

    public function getFilter($filter)
    {
        $arguments = array();
        if (is_array($filter)) {
            $arguments = $filter;
            $filter = array_shift($arguments);
        }

        switch ($filter) {
            case 'boolean' :
                return new \Zend_Filter_Boolean();
        }
    }
}