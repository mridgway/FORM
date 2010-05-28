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
        foreach($doctrineMetadata->fieldMappings AS $fieldName => $data) {
            $metadata->addField($fieldName);
        }

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

        if (isset($doctrineMetadata->fieldMappings[$fieldName])) {
            $field = $doctrineMetadata->fieldMappings[$fieldName];
            // @todo extract the field metadata
            $metadata->setType($this->columnTypeToFieldType($field['type']));
            $metadata->setRequired($field['nullable']);
            $metadata->setValidators($this->getValidators($field));
            $metadata->setFilters($this->getFilters($field));
        }

        return $metadata;
    }

    /**
     * @param string $columnType
     */
    public function columnTypeToFieldType($columnType)
    {
        switch ($columnType) {
            case 'date' :
            case 'time' :
            case 'datetime' :
            case 'string' :
            case 'integer' :
            case 'smallint' :
            case 'bigint' :
            case 'decimal' :
                return 'text';
            case 'text' :
                return 'textarea';
            case 'boolean' :
                return 'checkbox';
            default:
                return $columnType;
        }
    }

    /**
     * @param array $field
     * @return array
     */
    public function getValidators($field)
    {
        $validators = array();
        switch ($field['type']) {
            case 'date' :
            case 'time' :
            case 'datetime' :
                $validators[] = 'date';
                break;
            case 'string' :
                if ($field['length']) {
                    $validators[] = array('maxLength', $field['length']);
                }
                break;
            case 'integer' :
            case 'smallint' :
            case 'bigint' :
                $validators[] = 'integer';
                break;
            case 'decimal' :
                $validators[] = 'float';
                break;
            case 'text' :
                break;
            case 'boolean' :
                break;
        }

        return $validators;
    }

    /**
     * @param array $field
     * @return array
     */
    public function getFilters($field)
    {
        $filters = array();
        switch ($field['type']) {
            case 'boolean' :
                $filters[] = 'boolean';

        }
        return $filters;
    }
}