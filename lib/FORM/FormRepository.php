<?php

namespace FORM;

/**
 * @author Michael Ridgway <mcridgway@gmail.com>
 */
class FormRepository
{

    /**
     * @var string
     */
    protected $_className;

    /**
     * @var FormManager
     */
    protected $_fm;

    /**
     * @var Mapping\FormMetadata
     */
    protected $_metadata;

    /**
     * Creates a repository for the given class
     *
     * @param FormManager $formManager
     * @param Mapping\ClassMetadata $class This should be some kind of metadata object
     */
    public function __construct(FormManager $formManager, Mapping\FormMetadata $metadata)
    {
        $this->_className = $metadata->getName();
        $this->_fm = $formManager;
        $this->_metadata = $metadata;
    }

    /**
     * Retrieves a form mediator object.
     */
    public function getForm()
    {
        $form = $this->_fm->getFormFactory()->createForm($this->_metadata);
        foreach ($this->_metadata->getFields() AS $field) {
            $form->addElement($this->getElement($field->getName()));
        }
        return $form;
    }

    /**
     * Retrieves a single mediator element from the current class type
     *
     * @param string $propertyName
     */
    public function getElement($propertyName)
    {
        return $this->_fm->getElementFactory()->createElement($propertyName, $this->_metadata->getField($propertyName));
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->_className;
    }
}