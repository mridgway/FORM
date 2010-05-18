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
    public function __construct(Configuration $config = null)
    {
        $this->_config = $config;
        $this->_metadataFactory = new Mapping\MetadataFactory($this);
    }

    /**
     * Gets the repository for the specified model type.
     *
     * @param string $modelName
     */
    public function getRepository($modelName)
    {
        if (isset($this->_repositories[$modelName])) {
            return $this->_repositories[$modelName];
        }

        $metadata = $this->getFormMetadata($modelName);
        
        $this->_repositories[$modelName] = new FormRepository($this, $metadata);
        
        return $this->_repositories[$modelName];
    }

    /**
     * @param string $modelName
     * @return Mapping\FormMetadata
     */
    public function getFormMetadata($modelName)
    {
        return $this->_metadataFactory->getFormMetadataFor($modelName);
    }

    /**
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->_config;
    }
}