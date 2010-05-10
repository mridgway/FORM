<?php

namespace FORM\Mapping\Driver;

interface Driver
{
    public function loadFormMetadataForClass($className, \FORM\Mapping\FormMetadataInfo $metadata);
}