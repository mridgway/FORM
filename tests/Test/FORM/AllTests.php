<?php

namespace Test\FORM;

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'FORM_AllTests::main');
}

require_once __DIR__ . '/../Init.php';

class AllTests
{
    public static function main()
    {
        \PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new \Test\FORMTestSuite('FORM Functional Tests');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Functional_AllTests::main') {
    AllTests::main();
}