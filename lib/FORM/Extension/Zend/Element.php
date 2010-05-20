<?php

namespace FORM\Extension\Zend;

class Element extends Element\AbstractElement
{
    /**
     * @var Zend_Form_Element
     */
    protected $_element;

    /**
     * @param string $name
     * @param Zend_Form_Element $element
     */
    public function __construct($name, \Zend_Form_Element $element)
    {
        parent::__construct($name);
        $this->setElement($element);

        // Set defaults
        $this->setGetter('get' . ucfirst($name));
        $this->setSetter('set' . ucfirst($name));
    }

    /**
     * {@inheritdoc}
     *
     * @param Object $object
     */
    public function transferTo($object)
    {
        $this->callSetter($object, $this->getElement()->getValue());
    }

    /**
     * {@inheritdoc}
     *
     * @param Object $object
     * @return mixed
     */
    public function populateFrom($object)
    {
        return $this->callGetter($object);
    }

    /**
     * {@inheritdoc}
     *
     * @param mixed $value
     * @return boolean
     */
    public function isValid($value)
    {
        $elementValid = $this->getElement()->isValid($value);
        $validatorPassed = $this->callValidator();
        if (!$validatorPassed) {
            // @todo set error message
        }
        return $elementValid && $validatorPassed;
    }

    /**
     * {@inheritdoc}
     *
     * @param Zend_View $view
     * @return string
     */
    public function render($view = null)
    {
        return $this->getElement()->render($view);
    }

    /**
     * {@inheritdoc}
     *
     * @param string $name
     * @return Element
     */
    public function setName($name)
    {
        if (null !== $this->getElement()) {
            $this->getElement()->setName($name);
        }
        return parent::setName($name);
    }

    /**
     * @param Zend_Form_Element $element
     * @return Element
     */
    public function setElement(\Zend_Form_Element $element)
    {
        $this->_element = $element;
        $this->_element->setName($this->getName);
        return $this;
    }

    /**
     * @return Zend_Form_Element
     */
    public function getElement()
    {
        return $this->_element;
    }
}