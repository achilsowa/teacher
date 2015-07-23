<?php

class Tests extends CI_Controller {
  
  private $base;
  public $em;
  public function __construct() {
    parent::__construct();
  }
  
  function index() {
    $data['base'] = $this->config->item('base_url');
    $this->load->view('tests', $data);
  }
}