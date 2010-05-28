<?php

namespace Test\Mock\Mapping\Driver;

class MockDriver implements \FORM\Mapping\Driver\DriverInterface
{
    public function loadFormMetadataForClass($className, \FORM\Mapping\FormMetadataInfo $metadata)
    {
        return $metadata;
    }

    public function loadFieldMetadataForClass($className, $fieldName, \FORM\Mapping\FieldMetadataInfo $metadata)
    {
        return $metadata;
    }
}