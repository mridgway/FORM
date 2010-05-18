<?php

namespace FORM;

class Configuration
{

    /**
     * @var Mapping\Driver\Driver
     */
    protected $_metadataDriver;

    public function setMetadataDriverImpl(Mapping\Driver\Driver $impl)
    {
        $this->_metadataDriver = $impl;
    }

    public function getMetadataDriverImpl()
    {
        return $this->_metadataDriver;
    }

}