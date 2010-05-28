<?php

namespace FORM;

class Configuration
{

    /**
     * @var Mapping\Driver\Driver
     */
    protected $_metadataDriver;

    /**
     * @var Element\ElementFactoryInterface
     */
    protected $_elementFactory;

    /**
     * @var Form\FormFactoryInterface
     */
    protected $_formFactory;

    /**
     * @param DriverInterface $impl
     */
    public function setMetadataDriverImpl(Mapping\Driver\DriverInterface $impl)
    {
        $this->_metadataDriver = $impl;
    }

    /**
     * @return DriverInterface
     */
    public function getMetadataDriverImpl()
    {
        return $this->_metadataDriver;
    }

    /**
     * @param ElementFactoryInterface $factory
     */
    public function setElementFactory(Element\ElementFactoryInterface $factory)
    {
        $this->_elementFactory = $factory;
    }

    /**
     * @return Element\ElementFactoryInterface
     */
    public function getElementFactory()
    {
        return $this->_elementFactory;
    }

    /**
     * @param Form\FormFactoryInterface $factory
     */
    public function setFormFactory(Form\FormFactoryInterface $factory)
    {
        $this->_formFactory = $factory;
    }

    /**
     * @return Form\FormFactoryInterface
     */
    public function getFormFactory()
    {
        return $this->_formFactory;
    }

}