<?php

namespace Test\FORM;

require_once __DIR__ . '/../Init.php';

class FormRepositoryTest extends \Test\FORMTestCase
{


    /**
     * @var FormRepository
     */
    protected $_formRepository;
    
    protected $_fm;
    protected $_em;
    protected $_config;

    public function setUp()
    {
        parent::setUp();
        $this->_em = $this->_getTestEntityManager();
        $this->_config = new \FORM\Configuration();
        $this->_fm = new \FORM\FormManager($this->_em, $this->_config);
        
        $this->_formRepository = new \FORM\FormRepository($this->_fm, 'Test');
    }

    public function testConstructor()
    {
        $this->assertEquals($this->_em, $this->_formRepository->getEntityManager());
    }
}