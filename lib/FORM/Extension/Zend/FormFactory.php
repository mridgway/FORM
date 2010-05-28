<?php

namespace FORM\Extension\Zend;

class FormFactory implements \FORM\Form\FormFactoryInterface
{
    /**
     * {@inheritdoc}
     *
     * @param FormMetadataInfo $metadata
     */
    public function createForm(\FORM\Mapping\FormMetadataInfo $metadata)
    {
        return new \Zend_Form();
    }
}