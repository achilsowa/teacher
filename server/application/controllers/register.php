<?php

class Register extends CI_Controller {
  
    private $base;
    public $em;
    public function __construct() {
        parent::__construct();
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;
        $this->load->library('session');
    }

    function signin() {
        $data['base'] = $this->config->item('base_url');

        if (empty($_POST['email']) || empty($_POST['password'])) {
            $error = 'email and password are mandatory';
            header('Location: '.$data['base'].'login.php?error='.$error);
            return;
        }
    
        $email = $_POST['email'];
        $pwd = $_POST['password'];
    
        $user = $this->em->getRepository('Entity\Member')->findOneBy(array('email'=>$email));
        if ($user === null){
	        $error = 'incorrect email';
            header('Location: '.$data['base'].'login.php?error='.$error);
	        return;
	    }
    
        if ($user->getPwd() != $pwd){
	        $error = 'incorrect pwd';
            header('Location: '.$data['base'].'login.php?error='.$error);
	        return;
	    }
        $this->session->set_userdata('user-id', $user->getId());
        $this->session->set_userdata('first', '0');
        header('Location: '.$data['base'].'app/');
        return;
    }

    function signup() {
        $data['base'] = $this->config->item('base_url');

        if (empty($_POST['email'])) {
            $error = 'email is mandatory';
            header('Location: '.$data['base'].'register.php?error='.$error);
            return;
        }
    
        $email = $_POST['email'];


        $teacher = $this->em->getRepository('Entity\Member')->findOneBy(array('email'=>$email));
        if ($teacher != null) {
            if ($teacher->getActive() == 1 || $teacher->getActive() == 0) {
                $error = $email.' is already used! <br/>Please choose another';
                header('Location: '.$data['base'].'register.php?error='.$error);
                return;
            }else if ($teacher->getActive() == 2) {
              /*the teacher has already been invited but is creating a new account by his own*/
                $code = $email.'&id='.$teacher->getName();

                $url = $this->config->item('base_url');
                $msg = '<div>Thanks you for joining sukull. We hope you will enjoy<br/>'.
                    'Please follow the link to confirm your registration <br/>'.
                    '<a href="'.$url.'/register_end.php?email='.$code.'" >';


                $header =  'MIME-Version: 1.0';
                $header .= 'Content-Type:text/html; charset=iso-8859-5\n';
                $header .= 'Content-Transfer-Encoding: 8bit\n';
                $header .= 'From: user@sukull.com';

                if (mail($email, 'Account validation', $msg, $header))
                    header('Location: '.$data['base'].'register_ok.php?email='.$code);
                else header('Location: '.$data['base'].'register.php?error=unable to send mail to '.$email);
                return;
            }
        }else $teacher = new \Entity\Teacher();

        $teacher->setEmail($email);
        $teacher->setName('unknow');
        $teacher->setPwd('pwd');
        $teacher->setActive(2);

        $i = 0;
        $username = explode('@', $email)[0];
        $username_i = $username;
        do {
            if ($i) $username_i = $username.$i;
            ++$i;
            $user = $this->em->getRepository('Entity\Member')->findOneBy(array('username'=>$username_i));
            $username_i = $username.$i;

        }while($user != null);

        if (--$i == 0) $teacher->setUsername($username); else $teacher->setUsername($username.$i);
        $teacher->setImg();

        try {
            $this->em->persist($teacher);
            $this->em->flush();
            $teacher->setName(sha1(sha1($teacher->getId().$teacher->getEmail())));
            $this->em->flush();

            $code = $email.'&id='.$teacher->getName();

            $url = $this->config->item('base_url');
            $msg = '<div>Thanks you for joining sukull. We hope you will enjoy<br/>'.
                'Please follow the link to confirm your registration <br/>'.
                '<a href="'.$url.'/register_end.php?email='.$code.'" >';

            $header =  'MIME-Version: 1.0';
            $header .= 'Content-Type:text/html; charset=iso-8859-5\n';
            $header .= 'Content-Transfer-Encoding: 8bit\n';
            $header .= 'From: user@sukull.com';
            
            if (mail($email, 'Account validation', $msg, $header))
                header('Location: '.$data['base'].'register_ok.php?email='.$code);
            else header('Location: '.$data['base'].'register.php?error=unable to send mail to '.$email);
            return;
        } catch(Exception $e) {

            $error = 'an internal error has occurred. please try later';
            var_dump($e);
          //header('Location: '.$data['base'].'register.php?error='.$error);
        }
    }


    function signup_end() {
        $data['base'] = $this->config->item('base_url');

        if (empty($_POST['email']) || empty($_POST['id']) || empty($_POST['name']) || empty($_POST['password'])) {
            header('Location: '.$data['base'].'register.php');
            return;
        }

        $email = $_POST['email'];
        $name = $_POST['name'];
        $pwd = $_POST['password'];
        $id = $_POST['id'];


        $teacher = $this->em->getRepository('Entity\Member')->findOneBy(array('email'=>$email));

        $did = sha1(sha1($teacher->getId().$teacher->getEmail()));
        if ($teacher == null || $teacher->getActive() != 2 || $teacher->getName() != $id || $id != $did) {
            $error = $email.' is already a member of Sukull';
            header('Location: '.$data['base'].'register.php?error='.$error);
            return;
        }


        $teacher->setName($name);
        $teacher->setPwd($pwd);
        $teacher->setActive(1);

        $i = 0;
        $username = explode('@', $email)[0];
        $username_i = $username;
        do {
            if ($i) $username_i = $username.$i;
            ++$i;
            $user = $this->em->getRepository('Entity\Member')->findOneBy(array('username'=>$username_i));
            $username_i = $username.$i;

        }while($user != null);

        $teacher->setUsername($username.(--$i));
        $teacher->setImg();

        try {
            $this->em->persist($teacher);
            $this->em->flush();
            $this->session->set_userdata('user-id', $teacher->getId());

            $jid = str_replace('@', '_', $teacher->getEmail());

            $this->session->set_userdata('first', '1');
            header('Location: '.$data['base'].'app/');
            return;
        } catch(Exception $e) {

            $error = 'an internal error has occurred. please try later';
            echo $error;
            var_dump($e);
            //header('Location: '.$data['base'].'register.php?error='.$error);
        }
    }


    function invite_user() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$email = $request->email;

        $teacher = $this->em->getRepository('Entity\Member')->findOneBy(array('email'=>$email));
        if ($teacher != null) {
            if ($teacher->getActive() == 2) {
                echo 1;
                return;
            }else if($teacher->getActive() == 1){
                echo 2;
                return;
            }else if ($teacher->getActive() == 0) {
                echo 3;
            }
        }else $teacher = new \Entity\Teacher();

        $teacher->setEmail($email);
        $teacher->setName('unknow');
        $teacher->setPwd('pwd');
        $teacher->setActive(2);

        $i = 0;
        $username = explode('@', $email)[0];
        $username_i = $username;
        do {
            if ($i) $username_i = $username.$i;
            ++$i;
            $user = $this->em->getRepository('Entity\Member')->findOneBy(array('username'=>$username_i));
            $username_i = $username.$i;

        }while($user != null);

        $teacher->setUsername($username.(--$i));
        $teacher->setImg();

        try {
            $this->em->persist($teacher);
            $this->em->flush();
            $teacher->setName(sha1(sha1($teacher->getId().$teacher->getEmail())));
            $this->em->flush();

            echo 1;
            return;
        } catch(Exception $e) {

            echo 4;
            return;
            $error = 'an internal error has occurred. please try later';
            var_dump($e);
            //header('Location: '.$data['base'].'register.php?error='.$error);
        }
    }

    function change_pwd() {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$old = $request->old;
        @$new1 = $request->new1;
        @$new2 = $request->new2;
        $id = $this->session->userdata('user-id');
        $member = $this->em->getRepository('Entity\Member')->find($id);
        if ($member == null) {
            echo 2;
            return;
        }
        if ($member->getPwd() != $old) {
            echo 3;
            return;
        }
        if ($new1 != $new2) {
            echo 4;
            return;
        }
        try{
            $member->setPwd($new1);
            $this->em->persist($member);
            $this->em->flush();
            echo 1;
            return;
        }catch(Exception $e) {
            echo 5;
            return;
        }

    }

    function change_tof() {
        sleep(5);
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$img = $request->img;

        $id = $this->session->userdata('user-id');
        $member = $this->em->getRepository('Entity\Member')->find($id);
        if ($member == null) {
            echo 2;
            return;
        }
        try{
            $member->setImg($img);
            $this->em->persist($member);
            $this->em->flush();
            echo 1;
            return;
        }catch(Exception $e) {
            echo 3;
            return;
        }

    }



    function signout() {
        $data['base'] = $this->config->item('base_url');
        $this->session->sess_destroy();
        header('Location: '.$data['base'].'login.php');
    }
}