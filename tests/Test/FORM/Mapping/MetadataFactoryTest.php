<?php

namespace Test\FORM\Mapping;

require_once dirname(__FILE__).'/../../Init.php';

class MetadataFactoryTest extends \Test\FORMTestCase
{
    /**
     * @var FORM\Mapping\MetadataFactory
     */
    protected $_metadataFactory;

    /**
     * @var FORM\FormManager
     */
    protected $_fm;

    protected function setUp()
    {
        parent::setUp();
        $mockDriver = new \Test\Mock\Mapping\Driver\MockDriver();
        $this->_fm = $this->_getTestFormManager(array('driver' => $mockDriver));
        $this->_metadataFactory = new \FORM\Mapping\MetadataFactory($this->_fm);
    }

    public function testConstructor()
    {
        $this->assertEquals($this->_fm, $this->_metadataFactory->getFormManager());
    }

    public function testGetFormMetadataFor()
    {
        $formMetadata = $this->_metadataFactory->getFormMetadataFor('test');
        $this->assertTrue($formMetadata instanceof \FORM\Mapping\FormMetadataInfo);
    }

    public function testGetFieldMetadataFor()
    {
        $fieldMetadata = $this->_metadataFactory->getFieldMetadataFor('test', 'test');
        $this->assertTrue($fieldMetadata instanceof \FORM\Mapping\FieldMetadataInfo);
    }
}
