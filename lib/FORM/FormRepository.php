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
    protected $_formManager;

    /**
     * @var Mapping\ClassMetadata
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
        $this->_className = $metadata->name;
        $this->_formManager = $formManager;
        $this->_metadata = $metadata;
    }

    /**
     * Retrieves a form mediator object.
     *
     * @param string $modelName
     * @return Mediator
     */
    public function getForm(){}

    /**
     * Retrieves a single mediator element from the current class type
     *
     * @param string $propertyName
     */
    public function getElement($propertyName)
    {
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->_className;
    }
}