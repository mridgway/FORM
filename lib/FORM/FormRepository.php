<?php

namespace FORM;

/**
 * @author Michael Ridgway <mcridgway@gmail.com>
 */
class FormRepository
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $_em;
    
    /**
     * @var string
     */
    protected $_className;

    /**
     * @var FormManager
     */
    protected $_formManager;

    /**
     * Creates a repository for the given class
     *
     * @param FormManager $formManager
     * @param string $class This should be some kind of metadata object
     */
    public function __construct(FormManager $formManager, $class)
    {
        $this->_formManager = $formManager;
        $this->_className = $class;
    }

    /**
     * Retrieves a form mediator object.
     *
     * @param string $modelName
     * @return Mediator
     */
    public function getForm(){}

    /**
     * Retrieves a single mediator element from the current class type
     *
     * @param string $propertyName
     */
    public function getElement($propertyName)
    {
        $doctrineMetadata = $this->_em->getClassMetadata($this->getClassName());
        if (!$doctrineMetadata->hasField($propertyName)) {
            throw new \Exception('Invalid property name specified for this class.');
        }

        $propertyType = $doctrineMetadata->getTypeOfField($propertyName);
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->_em->getRepository($this->getClassName());
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->_className;
    }

    /**
     * @param Doctrine\ORM\EntityManager $em
     * @return FormRepository
     */
    public function setEntityManager(\Doctrine\ORM\EntityManager $em)
    {
        $this->_em = $em;
        return $this;
    }

    /**
     * @return Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->_em;
    }
}