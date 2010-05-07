<?php

namespace Test\FORM;

require_once __DIR__ . '/../Init.php';

class FormManagerTest extends \Test\FORMTestCase
{
    /**
     * @var FormManager
     */
    protected $_fm;

    protected $_em;
    protected $_config;

    public function setUp()
    {
        parent::setUp();
        $this->_em = $this->_getTestEntityManager();
        $this->_config = new \FORM\Configuration();
        $this->_fm = new \FORM\FormManager($this->_em, $this->_config);
    }

    public function testConstructor()
    {
        $this->assertEquals($this->_em, $this->_fm->getEntityManager());
        $this->assertEquals($this->_config, $this->_fm->getConfiguration());
    }

    public function testGetRepository()
    {
        $repository = $this->_fm->getRepository('Test');
        $this->assertEquals('FORM\FormRepository', get_class($repository));
        $this->assertEquals($this->_em, $repository->getEntityManager());
    }
}