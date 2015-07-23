<?php

namespace Entity;

/**
 * @MappedSuperclass
 */

class Mapped
{
  /**
   * @var string $name
   *
   * @Column(name="name", type="string", length=255)
   */
  protected $name;

  /**
   * @var string $pwd
   *
   * @Column(name="pwd", type="string", length=255)
   */
  protected $pwd;

  /**
   * @OneToOne(targetEntity="MappedSuperclassRelated1")
   * @JoinColumn(name="related1_id", referenceColumnName="id")
   */
  protected $mappedRelated1;

}

class EntitySub extends Mapped {

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
   * @var string $email
   *
   * @Column(name="email",type="string",length=255, nullable=true, unique=true)
   */
  protected $email;

}


class EntitySub2 extends Mapped {

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
   * @var string $email
   *
   * @Column(name="email",type="string",length=255, nullable=true, unique=true)
   */
  protected $email;

}
