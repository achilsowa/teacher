<?php

namespace Entity;


/**
 * @Entity(repositoryClass="Entity\TeacherRepository")
 * 
 * @Table()
 */
class Teacher extends \Entity\Member
{

  protected $classrooms;
 
  public function __construct(){
    parent::__construct();
  }

}