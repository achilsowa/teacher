<?php

namespace DoctrineProxies\__CG__\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class UStudent extends \Entity\UStudent implements \Doctrine\ORM\Proxy\Proxy
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

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setTown($town)
    {
        $this->__load();
        return parent::setTown($town);
    }

    public function getTown()
    {
        $this->__load();
        return parent::getTown();
    }

    public function setCountry($country)
    {
        $this->__load();
        return parent::setCountry($country);
    }

    public function getCountry()
    {
        $this->__load();
        return parent::getCountry();
    }

    public function setPwd($pwd, $hash = false)
    {
        $this->__load();
        return parent::setPwd($pwd, $hash);
    }

    public function getPwd()
    {
        $this->__load();
        return parent::getPwd();
    }

    public function setMatricule($matricule)
    {
        $this->__load();
        return parent::setMatricule($matricule);
    }

    public function getMatricule()
    {
        $this->__load();
        return parent::getMatricule();
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

    public function setUsername($username)
    {
        $this->__load();
        return parent::setUsername($username);
    }

    public function getUsername()
    {
        $this->__load();
        return parent::getUsername();
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

    public function addSchool($school)
    {
        $this->__load();
        return parent::addSchool($school);
    }

    public function getSchools()
    {
        $this->__load();
        return parent::getSchools();
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

    public function getCreation()
    {
        $this->__load();
        return parent::getCreation();
    }

    public function setImg($img = NULL)
    {
        $this->__load();
        return parent::setImg($img);
    }

    public function getImg()
    {
        $this->__load();
        return parent::getImg();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'active', 'name', 'town', 'country', 'pwd', 'matricule', 'email', 'username', 'phone', 'schools', 'sexe', 'birth', 'creation', 'img');
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