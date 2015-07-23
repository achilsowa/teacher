<?php

namespace Entity;


 /**
  * @Table()
  *
  * @Entity()
  */
 class Classroom_Teacher
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
    * @var smallint $active
    *
    * @Column(name="active", type="smallint")
    */
   protected $active;

    /**
     * @ManyToOne(targetEntity="Entity\Classroom")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $classroom;


    /**
     * @ManyToOne(targetEntity="Entity\Teacher")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $teacher;

   /**
    * @var datetime $creation
    *
    * @Column(name="creation", type="datetime", nullable=true)
    */
   protected $creation;

   /**
    * @var date year
    * 
    * @Column(name="year", type="date", nullable=true)
   */
  protected $year;

  public function __construct() {
    $this->creation = new \Datetime();
    $this->active = 1;
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
   * Set active
   *
   * @param smallint $active
   */
  public function setActive($active)
  {
    $this->active = $active;
  }

  /**
   * Get active
   *
   * @return smallint 
   */
  public function getActive()
  {
    return $this->active;
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
   * Set year
   *
   * @param date $year
   */
  public function setYear($year)
  {
    $this->year = $year;
  }

  /**
   * Get year
   *
   * @return date 
   */
  public function getYear()
  {
    return $this->year;
  }

  /**
   * Set classroom
   *
   * @param Entity\Classroom $classroom
   */
  public function setClassroom(\Entity\Classroom $classroom)
  {
    $this->classroom = $classroom;
  }

  /**
   * Get classroom
   *
   * @return Entity\Classroom 
   */
  public function getClassroom()
  {
    return $this->classroom;
  }


  /**
   * Set teacher
   *
   * @param Entity\Teacher $teacher
   */
  public function setTeacher(\Entity\Teacher $teacher)
  {
    $this->teacher = $teacher;
  }

  /**
   * Get teacher
   *
   * @return Entity\Teacher 
   */
  public function getTeacher()
  {
    return $this->teacher;
  }
 }