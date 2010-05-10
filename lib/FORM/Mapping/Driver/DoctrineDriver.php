<?php

namespace FORM\Mapping\Driver;

class DoctrineDriver implements Driver
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $_em;

    /**
     *
     * @param EntityManager $em 
     */
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->_em = $em;
    }

    /**
     * @param string $className
     * @param FormMetadataInfo $info
     */
    public function loadFormMetadataForClass($className, \FORM\Mapping\FormMetadataInfo $metadata)
    {
        $doctrineMetadata = $this->_em->getClassMetadata($className);
    }
}