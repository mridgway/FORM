<?php

namespace FORM\Element;

interface ElementFactoryInterface
{
    /**
     * Creates an element of the given type
     *
     * @param string $type
     * @param FieldMetadataInfo $metadata
     */
    public function createElement($name, \FORM\Mapping\FieldMetadataInfo $metadata);
}