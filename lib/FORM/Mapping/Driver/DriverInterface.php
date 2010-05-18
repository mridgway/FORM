<?php

namespace FORM\Mapping\Driver;

interface DriverInterface
{
    /**
     * Gets the form metadata for the given class
     *
     * @param string $className
     * @param FormMetadataInfo $metadata
     */
    public function loadFormMetadataForClass($className, \FORM\Mapping\FormMetadataInfo $metadata);

    /**
     * Gets the field metadata for the given field the class
     *
     * @param string $className
     * @param string $fieldName
     * @param FieldMetadataInfo $metadata
     */
    public function loadFieldMetadataForClass($className, $fieldName, \FORM\Mapping\FieldMetadataInfo $metadata);
}