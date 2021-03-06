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
        $suite = new \Test\FORMTestSuite('FORM Tests');

        $suite->addTestSuite(Functional\AllTests::suite());
        $suite->addTestSuite(Mapping\AllTests::suite());
        
        $suite->addTestSuite('Test\FORM\FormManagerTest');
        $suite->addTestSuite('Test\FORM\FormRepositoryTest');
        $suite->addTestSuite('Test\FORM\ConfigurationTest');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Functional_AllTests::main') {
    AllTests::main();
}