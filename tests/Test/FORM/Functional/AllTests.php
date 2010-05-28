<?php

namespace Test\FORM\Functional;

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Functional_AllTests::main');
}

require_once __DIR__ . '/../../Init.php';

class AllTests
{
    public static function main()
    {
        \PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new \Test\FORMTestSuite('FORM Functional Tests');

        $suite->addTestSuite('Test\FORM\Functional\SimpleElementTest');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Functional_AllTests::main') {
    AllTests::main();
}