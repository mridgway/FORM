<?php

namespace FORM\Extension\Zend;

class Form extends FORM\Form\AbstractForm
{
    /**
     * @var Zend_Form
     */
    protected $_form;

    /**
     * @var array of FORM\Element\ElementInterface
     */
    protected $_elements = array();

    public function populateFrom($object);

    public function isValid($valid);

    public function transferTo($object);
}