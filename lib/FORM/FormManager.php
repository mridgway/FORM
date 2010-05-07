<?php

namespace FORM;

/**
 * FormManager is the central entry point to FORM functionality.
 *
 * @author Michael Ridgway <mcridgway@gmail.com>
 */
class FormManager
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $_em;

    /**
     * @var Configuration
     */
    private $_config;

    /**
     * @var Mapping\MetadataFactory
     */
    private $_metadataFactory;

    /**
     * @var array
     */
    private $_repositories = array();

    /**
     * @param Configuration $config
     */
    public function __construct(\Doctrine\ORM\EntityManager $em, Configuration $config = null)
    {
        $this->_em = $em;
        $this->_config = $config;
    }

    /**
     * Gets the repository for the specified model type.
     *
     * @param string $modelName
     */
    public function getRepository($modelName)
    {
        if (!isset($this->_repositories[$modelName])) {
            $this->_repositories[$modelName] = new FormRepository($this, $modelName);
            $this->_repositories[$modelName]->setEntityManager($this->getEntityManager());
        }
        return $this->_repositories[$modelName];
    }

    /**
     * @return Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->_em;
    }

    /**
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->_config;
    }
}