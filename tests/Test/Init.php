<?php
/*
 * This file bootstraps the test environment.
 */
namespace Test\FORM;

error_reporting(E_ALL | E_STRICT);

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once __DIR__ . '/../../vendor/Doctrine2/lib/Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Test', __DIR__ . "/../../tests");
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('FORM', __DIR__ . "/../../lib");
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\Tests', __DIR__ . "/../../vendor/Doctrine2/tests");
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', __DIR__ . "/../../vendor/Doctrine2/lib");
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Zend', __DIR__ . "/../../vendor/Zend/library");
$classLoader->register();

if (!file_exists(__DIR__."/Proxies")) {
    if (!mkdir(__DIR__."/Proxies")) {
        throw new \Exception("Could not create " . __DIR__."/Proxies Folder.");
    }
}