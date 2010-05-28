<?php

namespace Test\FORM\Mapping;

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Mapping_AllTests::main');
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
        $suite = new \Test\FORMTestSuite('FORM Mapping Tests');

        $suite->addTestSuite('Test\FORM\Mapping\MetadataFactoryTest');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Mapping_AllTests::main') {
    AllTests::main();
}