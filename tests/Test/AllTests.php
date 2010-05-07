<?php

namespace Test;

require_once __DIR__ . "/Init.php";

class AllTests
{
    public static function main()
    {
        \PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new FORMTestSuite('FORM Tests');

        $suite->addTest(Functional\AllTests::suite());

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'AllTests::main') {
    AllTests::main();
}