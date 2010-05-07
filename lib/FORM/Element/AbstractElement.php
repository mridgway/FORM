<?php

namespace FORM\Element;

abstract class AbstractElement implements ElementInterface
{
    /**
     * The form element name as well as the property name
     *
     * @var string
     */
    protected $_name;

    /**
     * @var string|Closure|array
     */
    protected $_getter;

    /**
     * @var string|Closure|array
     */
    protected $_setter;

    /**
     * @var string|Closure|array
     */
    protected $_validator;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * Transfers the element's value to the property
     */
    abstract public function transferTo($object);

    /**
     * Transfers the property's value to the for element
     *
     * @param Object $object
     */
    abstract public function populateFrom($object);

    /**
     * @param mixed $value
     * @return boolean
     */
    public function isValid($value) { return true; }

    /**
     * Renders the form element
     */
    abstract public function render();

    public function __toString()
    {
        return $this->render();
    }
    

    public function setName($name) { $this->_name = $name; }
    public function getName() { return $this->_name; }

    public function setGetter($function) { $this->_getter = $function; }
    public function getGetter() { return $this->_getter; }
    public function callGetter($object)
    {
        return $this->callMethod($object, $this->getGetter());
    }

    public function setSetter($function) { $this->_setter = $function; }
    public function getSetter() { return $this->_setter; }
    public function callSetter($object, $value)
    {
        return $this->callMethod($object, $this->getSetter(), $value);
    }

    public function setValidator($function) { $this->_validator = $function; }
    public function getValidator() { return $this->_validator; }
    public function callValidator($value, $object = null)
    {
        return $this->callMethod($object, $this->getValidator(), $value);
    }

    /**
     *
     * @param null|Object $instance
     * @param Closure|string|array $method
     * @param mixed $args
     * @return 
     */
    protected function callMethod($instance, $method, $args = null)
    {
        if (is_null($method)) {
            return null;
        }

        if (is_callable($method)) {
            // Call Closure
            return $method($args);
        }

        if (is_null($instance)) {
            return null;
        }

        if (is_array($method)) {
            // Call each function on in the array
            if (empty($method)) {
                return $instance;
            }
            $instance = $this->callMethod($instance, $method[0], $args);
            $method = array_splice($method, 1);
            if (count($method) == 1) {
                $method = $method[0];
            }
            return $this->callMethod($instance, $method, $args);
        }

        // Call named function on the instance
        return $instance->$method($args);
    }
}