<?php

namespace Test;

abstract class FORMTestCase extends \PHPUnit_Framework_TestCase
{
    private static $_metadataDriverImpl;

    private static $_elementFactory;
    private static $_formFactory;

    /**
     * @return FORM\FormManager
     */
    protected function _getTestFormManager($config = null)
    {
        if (null === $config || is_array($config)) {
            $configArray = $config;
            $config = new \FORM\Configuration();

            if (!isset($configArray['driver'])) {
                $em = $this->_getTestEntityManager();
                $config->setMetadataDriverImpl(self::_getMetadataDriverImpl($this->_getTestEntityManager()));
            } else {
                $config->setMetadataDriverImpl($configArray['driver']);
            }

            if (!isset($configArray['elementFactory'])) {
                $config->setElementFactory(self::_getElementFactory());
            } else {
                $config->setElementFactory($configArray['elementFactory']);
            }

            if (!isset($configArray['formFactory'])) {
                $config->setFormFactory(self::_getFormFactory());
            } else {
                $config->setFormFactory($configArray['formFactory']);
            }
        }
        return new \FORM\FormManager($config);
    }

    protected static function _getMetadataDriverImpl(\Doctrine\ORM\EntityManager $em)
    {
        if (null === self::$_metadataDriverImpl) {
            self::$_metadataDriverImpl = new \FORM\Mapping\Driver\DoctrineDriver($em);
        }
        return self::$_metadataDriverImpl;
    }

    protected static function _getElementfactory()
    {
        if (null === self::$_elementFactory) {
            self::$_elementFactory = new \FORM\Extension\Zend\ElementFactory();
        }
        return self::$_elementFactory;
    }

    protected static function _getFormfactory()
    {
        if (null === self::$_formFactory) {
            self::$_formFactory = new \FORM\Extension\Zend\FormFactory();
        }
        return self::$_formFactory;
    }


    /** The metadata cache that is shared between all ORM tests (except functional tests). */
    private static $_metadataCacheImpl = null;
    /** The query cache that is shared between all ORM tests (except functional tests). */
    private static $_queryCacheImpl = null;

    /**
     * Creates an EntityManager for testing purposes.
     *
     * NOTE: The created EntityManager will have its dependant DBAL parts completely
     * mocked out using a DriverMock, ConnectionMock, etc. These mocks can then
     * be configured in the tests to simulate the DBAL behavior that is desired
     * for a particular test,
     *
     * @return Doctrine\ORM\EntityManager
     */
    protected function _getTestEntityManager($conn = null, $conf = null, $eventManager = null, $withSharedMetadata = true)
    {
        $config = new \Doctrine\ORM\Configuration();
        if($withSharedMetadata) {
            $config->setMetadataCacheImpl(self::getSharedMetadataCacheImpl());
        } else {
            $config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
        }

        $config->setMetadataDriverImpl($config->newDefaultAnnotationDriver());

        $config->setQueryCacheImpl(self::getSharedQueryCacheImpl());
        $config->setProxyDir(__DIR__ . '/Proxies');
        $config->setProxyNamespace('Doctrine\Tests\Proxies');
        $eventManager = new \Doctrine\Common\EventManager();
        if ($conn === null) {
            $conn = array(
                'driverClass' => 'Doctrine\Tests\Mocks\DriverMock',
                'wrapperClass' => 'Doctrine\Tests\Mocks\ConnectionMock',
                'user' => 'john',
                'password' => 'wayne'
            );
        }
        if (is_array($conn)) {
            $conn = \Doctrine\DBAL\DriverManager::getConnection($conn, $config, $eventManager);
        }
        return \Doctrine\Tests\Mocks\EntityManagerMock::create($conn, $config, $eventManager);
    }

    private static function getSharedMetadataCacheImpl()
    {
        if (self::$_metadataCacheImpl === null) {
            self::$_metadataCacheImpl = new \Doctrine\Common\Cache\ArrayCache;
        }
        return self::$_metadataCacheImpl;
    }

    private static function getSharedQueryCacheImpl()
    {
        if (self::$_queryCacheImpl === null) {
            self::$_queryCacheImpl = new \Doctrine\Common\Cache\ArrayCache;
        }
        return self::$_queryCacheImpl;
    }
}