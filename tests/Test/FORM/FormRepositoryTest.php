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
        $this->_config->setMetadataDriverImpl(new \FORM\Mapping\Driver\DoctrineDriver($this->_em));
        $this->_fm = new \FORM\FormManager($this->_config);
        
        $this->_formRepository = new \FORM\FormRepository($this->_fm, $this->_fm->getFormMetadata('Test\Model\Article'));
    }

    public function testConstructor()
    {
    }
}