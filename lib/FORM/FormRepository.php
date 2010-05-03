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
     * Creates a repository for the given class
     *
     * @param FormManager $formManager
     * @param string $class This should be some kind of metadata object
     */
    public function __construct(FormManager $formManager, $class)
    {
        $this->_formManager = $formManager;
        $this->_className = $class;
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
    public function getElement($propertyName){}
}