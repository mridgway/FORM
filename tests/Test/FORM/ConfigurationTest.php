<?php

namespace Test\FORM;

require_once dirname(__FILE__).'/../Init.php';

class ConfigurationTest extends \Test\FORMTestCase
{
    protected $_configuration;

    protected function setUp()
    {
        parent::setUp();
        $this->_configuration = new \FORM\Configuration();
    }

    public function testSetMetadataImpl()
    {
        $impl = new \FORM\Mapping\Driver\DoctrineDriver($this->_getTestEntityManager());
        $this->_configuration->setMetadataDriverImpl($impl);
        $this->assertEquals($impl, $this->_configuration->getMetadataDriverImpl());
    }

    public function testSetElementFactory()
    {
        $factory = new \Test\Mock\Element\MockElementFactory();
        $this->_configuration->setElementFactory($factory);
        $this->assertEquals($factory, $this->_configuration->getElementFactory());
    }

    public function testSetFormFactory()
    {
        $factory = new \Test\Mock\Form\MockFormFactory();
        $this->_configuration->setFormFactory($factory);
        $this->assertEquals($factory, $this->_configuration->getFormFactory());
    }
}
