<?php

 namespace Entity;


 /**
  * @Table()
  *
  * @Entity(repositoryClass="Entity\ClassroomRepository")
  */
 class Classroom
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
     * @ManyToOne(targetEntity="Entity\School", cascade={"persist"})
     * @JoinColumn(nullable=true)
     */
    protected $school;

    /**
     * @ManyToOne(targetEntity="Entity\Teacher")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $resp;

    

   /**
    * @var string $name
    *
    * @Column(name="name", type="string", length=255, nullable=true)
    */
   protected $name;

   /**
    * @var string $code
    *
    * @Column(name="code", type="string", length=10, nullable=true)
    */
   protected $code;

     /**
      * @var string $files
      *
      * @Column(name="files", type="string", length=255, nullable=true)
      */
     protected $files;

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

    public function setSchool(\Entity\School $school)
    {
        $this->school = $school;
    }

    /**
     * Get school
     *
     * @return Entity\School 
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set resp
     *
     * @param Entity\Teacher $resp
     */
    public function setResp(\Entity\Teacher $resp)
    {
        $this->resp = $resp;
    }

    /**
     * Get resp
     *
     * @return Entity\Teacher 
     */
    public function getResp()
    {
        return $this->resp;
    }
    
    public function cannotBeEditedBy(&$teacher) {
      if (!$this->resp) $this->resp = $this->getResp();
      return $teacher->getId() != $this->resp->getId();
    }


     /**
      * Add file
      *
      * @param string $file
      */
     public function addFile($file)
     {
         if (preg_match('#'.$file.'#i', $this->files))
             return;
         if (!empty($this->files)) $this->files .= '$';
         $this->files .= $file;
     }

     /**
      * Get files
      *
      * @return string
      */
     public function getFiles()
     {
         return $this->files;
     }
 }