<?php

 namespace Entity;


 /**
  * @Entity(repositoryClass="Entity\SchoolRepository")
  *
  * @Table()
  */
 class School
 {

   /**
    * @var integer $id
    *
    * @Column(name="id", type="integer")
    * @Id
    * @GeneratedValue(strategy="AUTO")
    */
   protected $id;

   /**
    * @var string $name
    *
    * @Column(name="name", type="string", length=255, nullable=true)
    */
   protected $name;

   /**
    * @var string $code
    *
    * @Column(name="code", type="string", length=255, unique=true)
    */
   protected $code;

   /**
    * @var datetime $creation
    *
    * @Column(name="creation", type="datetime", nullable=true)
    */
   protected $creation;

   /**
    * @var string $country
    *
    * @Column(name="country", type="string", length=50, nullable=true)
    */
   protected $country;

   /**
    * @var string $town
    *
    * @Column(name="town", type="string", length=50, nullable=true)
    */
   protected $town;

  public function __construct() {
    $this->creation = new \Datetime();
  }

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId()
  {
    return $this->id;
  }
  
  /**
   * Set name
   *
   * @param string $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  
  /**
   * Get name
   *
   * @return string 
   */
  public function getName()
  {
    return $this->name;
  }
  
  /**
   * Set code
   *
   * @param string $code
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  
  /**
   * Get code
   *
   * @return string 
   */
  public function getCode()
  {
    return $this->code;
  }
  
  /**
   * Set creation
   *
   * @param datetime $creation
   */
  public function setCreation($creation)
  {
    $this->creation = $creation;
  }

  /**
   * Get creation
   *
   * @return datetime 
   */
  public function getCreation()
  {
    return $this->creation;
  }

  /**
   * Set town
   *
   * @param string $town
   */
  public function setTown($town)
  {
    $this->town = $town;
  }
  
  /**
   * Get town
   *
   * @return string 
   */
  public function getTown()
  {
    return $this->town;
  }

  /**
   * Set country
   *
   * @param string $country
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  
  /**
   * Get country
   *
   * @return string 
   */
  public function getCountry()
  {
    return $this->country;
  }
  
 }