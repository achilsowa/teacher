<?php

namespace Entity;

/**
 * @Entity
 * Entity\Student
 * @Table()
 */

class Student

{
  /**
   * 
   * @var integer $id
   *
   * @Id
   * @Column(name="id", type="integer")
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
   * @JoinColumn
   */
  protected $classroom;
  
  /**
   * @var string $name
   *
   * @Column(name="name", type="string", length=255)
   */
  protected $name;
  
  
  /**
   * @var string $email
   *
   * @Column(name="email",type="string",length=255, nullable=true)
   */
  protected $email;
  
  /**
   * @var string $phone
   *
   * @Column(name="phone", type="string", length=255, nullable=true)
   */
  protected $phone;
  
  /**
   * @var smallint $sexe
   *
   * @Column(name="sexe", type="smallint", nullable=true)
   */
  protected $sexe;

  /**
   * @var datetime $birth
   *
   * @Column(name="birth", type="datetime", nullable=true)
   */
  protected $birth;

  /**
   * @var datetime $creation
   *
   * @Column(name="creation", type="datetime", nullable=true)
   */
  protected $creation;
  
  /**
   * @var datetime $img
   *
   * @Column(name="image", type="string", nullable=true)
   */
  protected $img;
  

  public function __construct() 
  {
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
   * Set name
   *
   * @param string $name
   */
  public function setname($name)
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
   * Set email
   *
   * @param string $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * Get email
   *
   * @return string 
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set phone
   *
   * @param string $phone
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }

  /**
   * Get phone
   *
   * @return string 
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set sexe
   *
   * @param smallint $sexe
   */
  public function setSexe($sexe)
  {
    $this->sexe = $sexe;
  }

  /**
   * Get sexe
   *
   * @return smallint 
   */
  public function getSexe()
  {
    return $this->sexe;
  }

  /**
   * Set birth
   *
   * @param datetime $birth
   */
  public function setbirth($birth)
  {
    $this->birth = $birth;
  }

  /**
   * Get birth
   *
   * @return datetime 
   */
  public function getBirth()
  {
    return $this->birth;
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
  public function creation()
  {
    return $this->creation;
  }

  /**
   * Set img
   *
   * @param string $img
   */
  public function setImg($img)
  {
    $this->img = $img;
  }

  /**
   * Get img
   *
   * @return string 
   */
  public function getImg()
  {
    return $this->img;
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

}

