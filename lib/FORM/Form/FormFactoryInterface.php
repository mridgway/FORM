<?php

namespace FORM\Form;

interface FormFactoryInterface
{
    /**
     * Creates a form of the given type
     *
     * @param FormMetadataInfo $metadata
     */
    public function createForm(\FORM\Mapping\FormMetadataInfo $metadata);
}