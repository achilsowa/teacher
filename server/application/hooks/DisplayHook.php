<?php
class DisplayHook {
  private $ci;
  public function captureOutput() {
    $this->ci = & get_instance();
        $output = $this->ci->output->get_output();
	if (ENVIRONMENT != 'testing') 
	  echo $output;
  }
  
}
?>