<?php

 namespace Entity;


 /**
  * @Table()
  *
  * @Entity(repositoryClass="Entity\MarkRepository")
  */
 class Mark
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
     * @ManyToOne(targetEntity="Entity\Test")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $test;

    /**
     * @ManyToOne(targetEntity="Entity\Student")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $student;


   /**
    * @var decimal $value
    *
    * @Column(name="value", type="decimal", precision=4, nullable=true)
    */
   protected $value;

   /**
    * @var datetime $creation
    *
    * @Column(name="creation", type="datetime", nullable=true)
    */
   protected $creation;

   public function __construct() {
       $this->creation = new \Datetime();
       $this->value = 0;

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
   * Set value
   *
   * @param string $value
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  
  /**
   * Get value
   *
   * @return string 
   */
  public function getValue()
  {
    return $this->value;
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
   * Set test
   *
   * @param Entity\Test $test
   */
  public function setTest(\Entity\Test $test)
  {
    $this->test = $test;
  }

  /**
   * Get test
   *
   * @return Entity\Test 
   */
  public function getTest()
  {
    return $this->test;
  }

  /**
   * Set student
   *
   * @param Entity\Student $student
   */
  public function setStudent(\Entity\Student $student)
  {
    $this->student = $student;
  }
  
  /**
   * Get student
   *
   * @return Entity\Student 
   */
  public function getStudent()
  {
    return $this->student;
  }
  
 }