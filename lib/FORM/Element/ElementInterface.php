<?php

namespace FORM\Element;

interface ElementInterface
{
    public function getName();

    public function transferTo($object);

    public function populateFrom($object);

    public function isValid($value);

    public function render();

    public function __toString();
}