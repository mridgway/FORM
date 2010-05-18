<?php

namespace FORM;

class Configuration
{

    /**
     * @var Mapping\Driver\Driver
     */
    protected $_metadataDriver;

    /**
     * @var Element\AbstractElementFactory
     */
    protected $_elementFactory;

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

}