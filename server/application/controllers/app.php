<?php

class App extends CI_Controller {

    private $user;
    private $base;
    public $em;
    public function __construct() {
        parent::__construct();
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;
        $this->load->library('session');
        $this->load->library('base62');

        $userid = $this->session->userdata('user-id');
        $this->user = null;
        if (isset($userid))
            $this->user = $this->em->getRepository('Entity\Member')->find($userid);

        if ($this->assert_user_defined(true))
            $this->load->library('academy', array('user'=>$this->user));
    }

    function index() {
        $data['base'] = $this->config->item('base_url');
        $this->assert_user_defined();
        $data['name'] = $this->user->getName();
        $data['img'] = $this->user->getImg();
        $data['phone'] = $this->user->getPhone();
        $data['email'] = $this->user->getEmail();
        $data['pwd'] = $this->user->getPwd();
        $data['first'] = $this->session->userdata('first');
        if ($data['first'] != '1') $data['first'] = '0';
        $this->load->view('webapp', $data);
    }

    function add_classroom($id = 0) {

        if (!$this->assert_user_defined()) return;
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$name = $request->name;
        @$school = $request->school;
        if (empty($name)) { echo '0'; return 0;}
        $name = htmlspecialchars($name);
        $school = (empty($school)) ? '' : htmlspecialchars($school);
        $code = null;

        if($id) {
            $id = $this->cid2sid($id);
            $classroom = $this->academy->update_classroom($name, $code, $school, $id);
        }else {
            $classroom = $this->academy->add_classroom($name, $code, $school);
        }


        if (is_object($classroom)) {
            $status = 0;
            echo ')]}\'
                {"status": "'.$status.'", "content":"'.$this->sid2cid($classroom->getId()).'" }';
        }else {
            $status = 1;
            echo ')]}\'
                {"status": "'.$status.'", "content": "'.$classroom.'" }';
        }
    }

    function get_classrooms() {
        if (!$this->assert_user_defined()) return;
        $str = '';
        $classrooms = $this->academy->get_classrooms();
        $max=count($classrooms);
        $str .= '[';
        for($i=0; $i< $max; ++$i) {
            $classroom = $classrooms[$i]->getClassroom();
            if ($classroom == null) continue;
            $active = $this->academy->classroom_active_status($classroom->getId());

            $files = $classroom->getFiles();
            if ($files != null) {
                $files = explode('$', $files);
                for($i=0, $maxf = count($files); $i<$maxf; ++$i) $files[$i] = '"'.$files[$i].'"';
                $files = implode(',', $files);
            }
            $str .='{"name":"'.$classroom->getName().'",'.
                '"responsible":"'.$classroom->getResp()->getName().'",'.
                '"active":"'.$active.'", "files": ['.$files.'], '.
                '"school":"'.$classroom->getSchool()->getCode().'",'.
                '"cannot_be_edited":"'.$classroom->cannotBeEditedBy($this->user).'",'.
                '"sid":"'.$this->sid2cid($classroom->getId()).'"}';
            /*| is a forbidden char in classroom information and will be used as
              as separator
            */
            if ($i != $max-1) $str .= ',';
        }

        $str .=']';
        echo ')]}\'
                {"status": "0", "content": '.$str.' }';
        return;
    }

    function get_classroom($id) {
        $this->assert_user_defined();
        $str = '';
        $id = $this->cid2sid($id);
        $classroom = $this->academy->get_classroom($id, true);
        if ($classroom == null) {
            echo ')]}\'
                {"status": "1"}';
            return;
        }
        $active = $this->academy->classroom_active_status($id);
        $files = $classroom->getFiles();
        if ($files != null) {
            $files = explode('$', $files);
            for($i=0, $maxf = count($files); $i<$maxf; ++$i) $files[$i] = '"'.$files[$i].'"';
            $files = implode(',', $files);
        }
        $str .='{"name":"'.$classroom->getName().'",'.
            '"code":"'.$classroom->getCode().'",'.
            '"active":"'.$active.'", "files": ['.$files.'], '.
            '"responsible":"'.$classroom->getResp()->getName().'",'.
            '"school":"'.$classroom->getSchool()->getCode().'",'.
            '"cannot_be_edited":"'.$classroom->cannotBeEditedBy($this->user).'",'.
            '"sid":"'.$this->sid2cid($classroom->getId()).'"}';

        echo ')]}\'
                {"status": "0", "content": '.$str.' }';

    }

    function del_classroom($id) {
        $id = $this->cid2sid($id);

        $rep = $this->academy->del_classroom($id);
        if ($rep < 1) $status = 0; else $status = 1;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;
    }

    public function share_classroom($clid) {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$email = $request->email;

        $email= htmlspecialchars($email);
        $clid = $this->cid2sid($clid);

        $rep = $this->academy->share_classroom($clid, $email);
        if ($rep < 1) $status = 1; else $status = 0;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;
    }

    public function activate_classroom($clid) {
        $clid = $this->cid2sid($clid);

        $rep = $this->academy->activate_classroom($clid);
        if ($rep < 1) $status = 0; else $status = 1;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;
    }

    public function add_file_classroom($clid) {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$file = $request->file;
        $clid = $this->cid2sid($clid);

        $rep = $this->academy->add_file_classroom($clid, $file);
        if ($rep < 1) $status = 0; else $status = 1;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;
    }
    /*before adding the student we must check that this teacher has the
      right to add student in that class*/
    function add_student($clid, $id = 0) {
        if (!$this->assert_user_defined()) return;
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$name = $request->name;
        @$email = $request->email;
        @$sexe = $request->sexe;
        if (empty($name)) {
            echo ')]}\'
                {"status": "1", "content": "0" }';
            return;
        }
        $name = htmlspecialchars($name);
        $email = (empty($email)) ? null : htmlspecialchars($email);
        $sexe = (empty($sexe)) ? 0 : htmlspecialchars($sexe);
        $phone = null;
        $img = (empty($images_str) ? null : htmlspecialchars($images_str));

        $sexe = (int)$sexe;

        if ($id){
            $id = $this->cid2sid($id);
            $student = $this->academy->update_student($name, $email, $phone, $sexe, $img, $id);
        }else {
            $clid = $this->cid2sid($clid);
            $student = $this->academy->add_student($name, $email, $phone, $sexe, $img, $clid);
        }

        if (is_object($student)) {
            echo ')]}\'
                {"status": "0", "content": "'.$this->sid2cid($student->getId()).'" }';
            return;
        }else {
            echo ')]}\'
                {"status": "1", "content": "'.$student.'" }';
            return;
        }
    }

    /*before retrieving the students, must check that the corresponding
      user has the rights to get these information*/
    function get_students($clid) {
        /*
          $classroom = $this->user->getClassroom($clid);
          this user has no right on the class
          if ($classroom == null) { echo '-1'; return -1; }
        */
        $clid = $this->cid2sid($clid);
        $students = $this->academy->get_students($clid);

        $str = '';
        $max = count($students);
        $str = '[';
        for($i=0; $i<$max; ++$i) {
            $student = $students[$i];
            $str .='{"name":"'.$student->getName().'",'.
                '"email":"'.$student->getEmail().'",'.
                '"sexe":"'.$student->getSexe().'",'.
                '"sid":"'.$this->sid2cid($student->getId()).'"}';
            /*| is a forbidden char in classroom information and will be used as
          as separator
            */
            if ($i != $max-1) $str .= ',';
        }

        $str .= ']';
        echo ')]}\'
                {"status": "0", "content": '.$str.' }';
        return;
        echo $str;
    }

    function del_student($id) {
        $id = $this->cid2sid($id);

        $rep = $this->academy->del_student($id);
        if ($rep < 1) $status = 0; else $status = 1;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;
    }

    public function add_test($id = 0) {
        if (!$this->assert_user_defined()) return;
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$code = $request->code;
        @$classroom = $request->classroom;
        @$date = $request->date;
        @$subject = $request->subject;
        if (empty($code) || empty($classroom) || empty($classroom->sid)) {
            echo ')]}\'
                {"status": "1", "content": "0" }';
            return;
        }
        $code = htmlspecialchars($code);
        $subject = (empty($subject)) ? null : htmlspecialchars($subject);
        $date = (empty($date)) ? null : htmlspecialchars($date);
        if ($date){
            $format = explode('/', $date);
            $date = $format[2].'-'.$format[0].'-'.$format[1];
        }
        $percent = $seq = null;
        if ($id) {
            $id = $this->cid2sid($id);
            $test = $this->academy->update_test($code, $percent, $subject, $seq, $date, $this->cid2sid($classroom->sid), $id);
        }else {
            $test = $this->academy->add_test($code, $percent, $subject, $seq, $date, $this->cid2sid($classroom->sid));
        }

        if (is_object($test)) {
            echo ')]}\'
                {"status": "0", "content": "'.$this->sid2cid($test->getId()).'" }';
            return;
        }else {
            echo ')]}\'
                {"status": "1", "content": "'.$test.'" }';
            return;
        }

    }

    public function get_tests() {
        if (!$this->assert_user_defined()) return;
        $str = '[';
        $tests = $this->academy->get_tests();
        $max=count($tests);
        for($i=0; $i< $max; ++$i) {
            $test = $tests[$i];
            if ($test ==  null) continue;
            $active = $this->academy->test_active_status($test->getId());
            $files = $test->getFiles();
            if ($files != null) {
                $files = explode('$', $files);
                for($i=0, $maxf = count($files); $i<$maxf; ++$i) $files[$i] = '"'.$files[$i].'"';
                $files = implode(',', $files);
            }
            $str .='{"code":"'.$test->getCode().'",'.
                '"responsible":"'.$test->getResp()->getName().'",'.
                '"active":"'.$active.'", "files": ['.$files.'], '.
                '"cannot_be_edited":"'.$test->cannotBeEditedBy($this->user).'",'.
                '"subject":"'.$test->getSubject().'",';
            if ($test->getDate())
                $str .= '"date":"'.$test->getDate()->format('m/d/Y/').'",';
            $str .= '"classroom":{"sid": "'.$this->sid2cid($test->getClassroom()->getId()).'",'.
                '"name":"'.$test->getClassroom()->getName().'"},'.
                '"sid":"'.$this->sid2cid($test->getId()).'"}';
            /*| is a forbidden char in test information and will be used as
          as separator
            */
            if ($i != $max-1) $str .= ',';
        }

        $str .= ']';
        echo ')]}\'
                {"status": "0", "content": '.$str.' }';
        return;

    }

    public function get_test($id) {
        $this->assert_user_defined();
        $str = '';
        $bid = $id;
        $id = $this->cid2sid($id);
        $test = $this->academy->get_test($id);

        if ($test == null) {
            echo ')]}\'
                {"status": "1"}';
            return;
        }
        $active = $this->academy->test_active_status($id);
        $files = $test->getFiles();
        if ($files != null) {
            $files = explode('$', $files);
            for($i=0, $maxf = count($files); $i<$maxf; ++$i) $files[$i] = '"'.$files[$i].'"';
            $files = implode(',', $files);
        }
        $str .='{"code":"'.$test->getCode().'",'.
            '"responsible":"'.$test->getResp()->getName().'",'.
            '"active":"'.$active.'", "files": ['.$files.'], '.
            '"cannot_be_edited":"'.$test->cannotBeEditedBy($this->user).'",'.
            '"subject":"'.$test->getSubject().'",';
        if ($test->getDate())
            $str .= '"date":"'.$test->getDate()->format('m/d/Y').'",';
        $str .= '"classroom" : {"sid": "'.$this->sid2cid($test->getClassroom()->getId()).'",'.
            '"name":"'.$test->getClassroom()->getName().'"}, ';
        $str .= '"sid":"'.$this->sid2cid($test->getId()).'", "csid": "'.$id.'", "bid":"'.$bid.'", "aid": "'.$test->getId().'"}';

        echo ')]}\'
                {"status": "0", "content": '.$str.' }';
    }

    function del_test($id) {
        $id = $this->cid2sid($id);

        $rep = $this->academy->del_test($id);
        if ($rep < 1) $status = 0; else $status = 1;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;
    }

    public function share_test($tid) {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$email = $request->email;

        $email= htmlspecialchars($email);

        $rep = $this->academy->share_test($tid, $email);
        if ($rep < 1) $status = 1; else $status = 0;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;
    }

    public function add_file_test($tid) {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$file = $request->file;
        $tid = $this->cid2sid($tid);

        $rep = $this->academy->add_file_test($tid, $file);
        if ($rep < 1) $status = 0; else $status = 1;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;

    }

    public function activate_test($tid) {
        $rep = $this->academy->activate_test($tid);
        if ($rep < 1) $status = 0; else $status = 1;
        echo ')]}\'
            {"status": "'.$status.'", "content": "'.$rep.'" }';
        return;
    }

    public function add_mark($tid, $id = 0) {
        if (!$this->assert_user_defined()) return;
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$value = $request->value;
        @$stdid = $request->student_id;
        if (empty($value) || empty($stdid)) {
            echo ')]}\'
                {"status": "1", "content": "0" }';
            return;
        }
        $value = htmlspecialchars($value);

        /*we may check that the $id correspond to the test and the student*/
        if ($id) {
            $id = $this->cid2sid($id);
            $mark = $this->academy->update_mark($value, $id);
        } else {
            $tid = $this->cid2sid($tid);
            $stdid = $this->cid2sid($stdid);
            $mark = $this->academy->add_mark($stdid, $value, $tid);
        }

        if (is_object($mark)) {
            echo ')]}\'
                {"status": "0", "content": "'.$this->sid2cid($mark->getId()).'" }';
            return;
        }else {
            echo ')]}\'
                {"status": "1", "content": "'.$mark.'" }';
            return;
        }

    }

    public function get_marks($tid) {

        if (!$this->assert_user_defined()) return;
        $str = '[';
        $tid = $this->cid2sid($tid);
        $marks = $this->academy->get_marks($tid);
        $max=count($marks);
        for($i=0; $i< $max; ++$i) {
            $mark = $marks[$i];
            $str .= '{"value":"' . $mark->getValue() . '",' .
                '"student_id":"' . $this->sid2cid($mark->getStudent()->getId()) . '",' .
                '"sid":"' . $this->sid2cid($mark->getId()) . '"}';
            if ($i != $max - 1) $str .= ',';
        }

        $str .= ']';
        echo ')]}\'
                {"status": "0", "content": '.$str.' }';
        return;

    }


    public function add_file($id = 0) {
        $this->assert_user_defined();
        if (empty($_POST['name']) || !isset($_POST['data'])) {echo '0'; return;}
        $data = ($_POST['data']);
        $name = htmlspecialchars($_POST['name']);
        $type = (!isset($_POST['type']) ? 0 : $_POST['type']);
        $type = (int)$type;

        /*we may check that the $id correspond to the test and the student*/
        if ($id) {
            $id = $this->cid2sid($id);
            $file = $this->academy->update_file($name, $data, $type, $id);
        } else {
            $file = $this->academy->add_file($name, $data, $type);
        }
        echo $this->sid2cid($file->getId());
    }

    public function get_files() {
        $this->assert_user_defined();
        $str = '';
        $files = $this->academy->get_files();
        $max=count($files);
        for($i=0; $i< $max; ++$i) {
            $file = $files[$i];
            $last_modif = 0;
            if (file_exists('files/'.$file->getFileName()))
                $last_modif = filemtime('files/'.$file->getFileName());
            $str .='{"name":"'.$file->getName().'",'.
                '"last_modif":"'.$last_modif.'",';
            if ($file->getCreation())
                $str .= '"creation":"'.$file->getCreation()->format('Y-m-d').'",';
            $str .= '"type":"'.$file->getType().'",'.
                '"sid":"'.$this->sid2cid($file->getId()).'"}';
            /*| is a forbidden char in mark information and will be used as
          as separator
            */
            if ($i != $max-1) $str .= '|';
        }

        if ($max == 0) $str = '0';
        echo $str;
    }

    function del_file($id) {
        $this->academy->del_file($id);
    }

    function get_file_data($id) {

        $file = $this->academy->get_file($id);
        $str='{}';
        if ($file) $str = $file->getData();
        echo $str;
    }

    public function send_file($fid) {
        if (empty($_POST['email'])) {
            echo '0';
            return;
        }
        $email= htmlspecialchars($_POST['email']);
        $rep = $this->academy->send_file($fid, $email);
        echo $rep;
    }

    function get_user_info($fake_jid) {
        if ($fake_jid) {
            $email = str_replace('-', '@', $fake_jid);
            $user = $this->em->getRepository('Entity\Member')->
                findOneBy(array('email'=>$email));
        }else {
            $email = $this->user->getEmail();
            $user = $this->user;
        }
        $str = '';
        if ($user === null) {
            $str = '{}';
        }else {
            if ($user->getActive()){
                $schools = $this->user->getSchools();
                if ($schools != null) {
                    $schools = explode('$', $schools);
                    for($i=0, $max = count($schools); $i<$max; ++$i) $schools[$i] = '"'.$schools[$i].'"';
                    $schools = implode(',', $schools);
                }
                $creation = $user->getCreation()->format('Y/m/d');
                $str .=')]}\'
                    {"name":"'.$user->getName().'", "email":"'.$email.'", "img":"'.$user->getImg().'", "creation":"'.$creation.'",'.
                    '"jid":"'.str_replace('@', '-', $email).'", "username": "'.$user->getUsername().'",'.
                    '"first":"'.$this->session->userdata('first').'", "pwd": "'.$user->getPwd().'", "schools":['.$schools.']}';
            }else $str = '{}';
        }
        $this->session->set_userdata('first', '0');
        echo $str;
    }

    function find_users($offset = 0) {
        //sleep(5);
        $town=(empty($_POST['town'])) ? '' : htmlspecialchars($_POST['town']);
        $name=(empty($_POST['name'])) ? '' : htmlspecialchars($_POST['name']);
        $school=(empty($_POST['school'])) ? '':htmlspecialchars($_POST['school']);

        if(empty($name) && empty($town) && empty($school)) {
            echo '{}';
            return;
        }
        if (!empty($name) && empty($school))
            $users = $this->em->getRepository('Entity\Member')->
                findLikeBy(array('name'=>$name));
        else if (empty($name) && !empty($school))
            $users = $this->em->getRepository('Entity\Member')->
                findLikeBy(array('schools'=>$school));
        else
            $users = $this->em->getRepository('Entity\Member')->
                findLikeBy(array('name'=>$name, 'schools'=>$school));

        $str = '';
        if ($users == null) {
            $str = '{}';
        }else {
            for ($i=0, $max = count($users); $i<$max; ++$i) {
                $user = $users[$i];
                $str .= '{"name":"'.$user->getName().'",'.
                    '"town":"'.$user->getTown().'",'.
                    '"email":"'.$user->getEmail().'",'.
                    '"schools":"'.$user->getSchools().'",'.
                    '"count":"'.$max.'",'.
                    '"img":"'.$user->getImg().'"}';
                if ($i != $max-1) $str .= '|';
            }
        }
        echo $str;
    }



    function add_server_file($type) {
        if (!isset($_FILES['file']) || $_FILES['file']['error'] != 0) {
            echo '0';
            return 0;
        }
        $type = (int) $type;
        if ($type == 0) return $this->add_general_file($_FILES['file']);
        if ($type == 1) return $this->add_image($_FILES['file']);
        if ($type == 2) return $this->add_text_file($_FILES['file']);

    }

    function add_general_file($file) {
        $image = null;
        if ($file['size'] <= 10000000)
        {
            $infosfichier = pathinfo($file['name']);
            $extension_upload = empty($infosfichier['extension']) ? '' : $infosfichier['extension'];
            $extensions_autorisees = array('php');
            if (!in_array($extension_upload, $extensions_autorisees))
                do {
                    $filename = mt_rand().'_'.basename($file['name']);
                }while (file_exists('../files/'.$filename));
            else { echo '0'; return 0;}
            move_uploaded_file($file['tmp_name'], '../files/'.$filename);
            echo $filename;
            return;
        }
        else { echo '0'; return 0;}
    }


    function add_image($file) {
        $image = null;
        if ($file['size'] <= 1000000)
        {
            $infosfichier = pathinfo($file['name']);
            $extension_upload = empty($infosfichier['extension']) ? '' : $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'ico');
            if (in_array($extension_upload, $extensions_autorisees))
                do {
                    $filename = mt_rand().'_'.basename($file['name']);
                }while (file_exists('../app/imgs/'.$filename));
            else { echo '0'; return 0;}
            move_uploaded_file($file['tmp_name'], '../app/imgs/'.$filename);
            echo $filename;
            return;
        }
        else { echo '0'; return 0;}
    }

    function add_text_file($file) {
        $image = null;
        if ($file['size'] <= 1000000) {
            $infosfichier = pathinfo($file['name']);
            $extension_upload = empty($infosfichier['extension']) ? '' : $infosfichier['extension'];
            $extensions_autorisees = array('text', 'txt');
            if (in_array($extension_upload, $extensions_autorisees)){
                do {
                    $filename = mt_rand().'_'.basename($file['name']);
                }while (file_exists('../app/files/'.$filename));
            }else {
                echo '0'; return 0;
            }
            move_uploaded_file($file['tmp_name'], '../app/files/'.$filename);
            echo $filename;
            return;
        }else {
            echo '0'; return 0;
        }
    }

    public function std_from_file($clid, $src) {
        $clid = $this->cid2sid($clid);
        $stds = $this->academy->std_from_file($clid, $src);
        if ($stds[0] == -1 || $stds[0] == -2 || $stds[0] == -3){
            echo ')]}\'
                {"status": "1", "content": '.$stds[0].' }';
            return;

        }
        $str = '[';
        for ($i=1, $max = count($stds); $i<$max; ++$i) {
            $student = $stds[$i];
            $str .='{"name":"'.$student->getName().'",'.
                '"sid":"'.$this->sid2cid($student->getId()).'"}';
            /*| is a forbidden char in classroom information and will be used as
          as separator
            */
            if ($i != $max-1) $str .= ',';
        }


        $str .= ']';
        echo ')]}\'
                {"status": "0", "content": '.$str.' }';
        return;

    }


    private function assert_user_defined($redirect = false) {
        if (!empty($this->session->userdata('user-id'))) return true;
        if (!$redirect) return false;
        header('HTTP/1.0 400');
        echo '{"msg":"user session end. please reconnect"}';
        return false;
    }

    private function cid2sid($cid) {
        return (int)$this->base62->_b_2_10($cid);
    }

    private function sid2cid($sid) {
        return $this->base62->_10_2_b($sid);
    }
}


/*donner dans sa forme la plus pure, c'est ne rien attendre en retour*/