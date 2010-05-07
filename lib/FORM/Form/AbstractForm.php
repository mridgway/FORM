<?php

namespace FORM\Form\AbstractForm;

abstract class AbstractForm
{
    abstract public function populateFrom($object);

    abstract public function isValid(array $values);

    abstract public function transferTo($object);
}