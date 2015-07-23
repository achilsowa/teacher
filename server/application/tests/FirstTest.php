<?php 
class FirstTest extends PHPUnit_Framework_TestCase {
  private $ci;
  private $em;
  private $user;

  /*
  public function __construct() {
    $this->ci = &get_instance();
    $this->ci->load->library('doctrine');
    $this->ci->load->library('session');

  }
  */
  public function test1() {

    $this->assertEquals(2, 1+1);
  }

  /**
   * @dataProvider addP
   */
  public function testAdd($a, $b, $sum) {
    $this->assertEquals($sum, $a+$b);
  }

  public function addP() {
    return array(
		 array(0, 0, 0),
		 array(0, 1, 1),
		 array(1, 0, 1),
		 array(1, 1, 2)
		 );
  }

  public function loadci() {
    $this->ci = &get_instance();
    //$this->ci->load->library('session');
    $this->ci->load->library('doctrine');
    $this->em = $this->ci->doctrine->em;
    $this->user = $this->em->getRepository('Entity\Member')->
      findOneBy(array('email'=>'a@a.a'));

  }
  public function test_signin() {
    $this->loadci();
    $this->assertEquals($this->user->getEmail(), 'a@a.a');
  }

  public function test_get_tests() {
    
  }

}

?>