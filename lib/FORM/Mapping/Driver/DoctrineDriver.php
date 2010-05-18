<?php

namespace FORM\Mapping\Driver;

class DoctrineDriver implements DriverInterface
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $_em;

    /**
     * {@inheritdoc}
     *
     * @param EntityManager $em 
     */
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->_em = $em;
    }

    /**
     * {@inheritdoc}
     * 
     * @param string $className
     * @param FormMetadataInfo $info
     * @return FormMetadataInfo
     */
    public function loadFormMetadataForClass($className, \FORM\Mapping\FormMetadataInfo $metadata)
    {
        $doctrineMetadata = $this->_em->getClassMetadata($className);

        // @todo extract the form metadata

        return $metadata;
    }

    /**
     * {@inheritdoc}
     *
     * @param string $className
     * @param string $fieldName
     * @param FieldMetadataInfo $metadata
     * @return FieldMetadataInfo
     */
    public function loadFieldMetadataForClass($className, $fieldName, \FORM\Mapping\FieldMetadataInfo $metadata)
    {
        $doctrineMetadata = $this->_em->getClassMetadata($className);

        if (isset($doctrineMetadata['fieldMappings'][$fieldName])) {
            // @todo extract the field metadata
        }

        return $metadata;
    }
}