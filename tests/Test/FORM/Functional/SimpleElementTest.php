<?php

namespace Test\FORM\Functional;

require_once __DIR__ . '/../../Init.php';

class SimpleElementTest extends \Test\FORM\FunctionalTestCase
{

    /**
     * @var FORM\FormManager
     */
    protected $_fm;

    public function setUp()
    {
        parent::setUp();
        $this->_fm = $this->_getTestFormManager();
    }

    public function testRepositoryReturnsElement()
    {
        $repo = $this->_fm->getRepository('Test\Model\Article');
        $element = $repo->getElement('title');
        $this->assertTrue($element instanceof \Zend_Form_Element);
    }

    public function testRepositoryValidators()
    {
        $repo = $this->_fm->getRepository('Test\Model\Article');
        $element = $repo->getElement('title');

        $stringLengthValidator = $element->getValidator('StringLength');
        $this->assertEquals(255, $stringLengthValidator->getMax());
    }

    public function testRepositoryReturnsForm()
    {
        $repo = $this->_fm->getRepository('Test\Model\Article');
        $form = $repo->getForm();
        $this->assertTrue($form instanceof \Zend_Form);
    }
    
}