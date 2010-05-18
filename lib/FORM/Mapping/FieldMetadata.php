<?php

namespace FORM\Mapping;

class FieldMetadata extends FormMetadataInfo
{
    /**
     * @param string $fieldName
     */
    public function __construct($fieldName)
    {
        parent::__construct($fieldName);
    }
}