<?php

namespace FORM\Form;

interface FormInterface
{
    public function populateFrom($object);

    public function isValid(array $values);

    public function transferTo($object);
}