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
        $this->assertTrue($repo->getElement('title') instanceof \Zend_Form_Element);
    }

    public function testRepositoryReturnsForm()
    {
        $repo = $this->_fm->getRepository('Test\Model\Article');
        $this->assertTrue($repo->getForm() instanceof \Zend_Form);
    }
    
}