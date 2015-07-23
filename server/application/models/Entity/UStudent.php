<?php

namespace Entity;


/**
 * @Entity
 * Entity\UStudent
 * @Table()
 */
class UStudent extends \Entity\Member{
  public function __construct(){
    parent::__construct();
  }

}