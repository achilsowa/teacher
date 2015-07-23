<?php

class Start extends CI_Controller {
  private  $base;
  private $css;
  
  public function __construct() {
    $this->base = 'base';//$this->config->item('base_url');
    $this->css = 'css';//$this->config->item('css');

    parent::__construct();
  }
  
  function index() {
    $data['base'] = $this->config->item('base_url');
    $this->load->view('landing', $data);
  }
  
  function hello($name='achil') {
    $data['css'] = $this->css.'test.css';
    $data['base'] = $this->base;
    $data['mytitle'] = 'welcome here!';
    $data['mytext'] = 'hello '.$name.' welcome';

    $this->load->view('testview', $data);
  }

}