<?php

namespace DoctrineProxies\__CG__\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Student extends \Entity\Student implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setActive($active)
    {
        $this->__load();
        return parent::setActive($active);
    }

    public function getActive()
    {
        $this->__load();
        return parent::getActive();
    }

    public function setname($name)
    {
        $this->__load();
        return parent::setname($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function setPhone($phone)
    {
        $this->__load();
        return parent::setPhone($phone);
    }

    public function getPhone()
    {
        $this->__load();
        return parent::getPhone();
    }

    public function setSexe($sexe)
    {
        $this->__load();
        return parent::setSexe($sexe);
    }

    public function getSexe()
    {
        $this->__load();
        return parent::getSexe();
    }

    public function setbirth($birth)
    {
        $this->__load();
        return parent::setbirth($birth);
    }

    public function getBirth()
    {
        $this->__load();
        return parent::getBirth();
    }

    public function setCreation($creation)
    {
        $this->__load();
        return parent::setCreation($creation);
    }

    public function creation()
    {
        $this->__load();
        return parent::creation();
    }

    public function setImg($img)
    {
        $this->__load();
        return parent::setImg($img);
    }

    public function getImg()
    {
        $this->__load();
        return parent::getImg();
    }

    public function setClassroom(\Entity\Classroom $classroom)
    {
        $this->__load();
        return parent::setClassroom($classroom);
    }

    public function getClassroom()
    {
        $this->__load();
        return parent::getClassroom();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'active', 'name', 'email', 'phone', 'sexe', 'birth', 'creation', 'img', 'classroom');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}