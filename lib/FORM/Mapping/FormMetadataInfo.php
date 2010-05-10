<?php

namespace FORM\Mapping;

class FormMetadataInfo
{
    /**
     * @var string
     */
    public $name;

    /**
     * @param string $className
     */
    public function __construct($className)
    {
        $this->name = $className;
    }
}