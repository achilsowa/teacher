<?php
/*from now, the way we get the entity is not really optimized. it works now 
  but after we must optimize it
*/
class Academy {
    public $ci;
    private $user;
    private $user_classrooms;

    public function __construct(&$param) {
    $this->ci = &get_instance();
    $this->ci->load->library('doctrine');
    $this->user = $param['user'];

    $classrooms = $this->get_classrooms(true);
    $count = count($classrooms);
    for($i=0; $i<$count; ++$i)
      $this->user_classrooms[$classrooms[$i]->getClassroom()->getId()] = 
	&$classrooms[$i];
  }


    public function add_classroom($name, $code, $school_code) {
    $classroom = new \Entity\Classroom();
    $classroom->setName($name);
    $classroom->setCode($code);
    $classroom->setResp($this->user);

    $school = $this->ci->doctrine->em->getRepository('Entity\School')
      ->findOneBy(array('code'=>$school_code));
    if ($school == null) {
      $school = new \Entity\School();
      $school->setCode($school_code);
      $school->setName($school_code);
      $this->ci->doctrine->em->persist($school);
      
    }
    $classroom->setSchool($school);
    $this->user->addSchool($school_code);
    
    $this->ci->doctrine->em->persist($classroom);

    $classroom_teacher = new \Entity\Classroom_Teacher();
    $classroom_teacher->setTeacher($this->user);
    $classroom_teacher->setClassroom($classroom);
    $this->ci->doctrine->em->persist($classroom_teacher);
    //$this->ci->doctrine->em->persist($this->user);
    $this->ci->doctrine->em->flush();
    $this->user_classrooms[$classroom->getId()] = &$classroom_teacher;
    return $classroom;
  }

    public function get_classrooms($first = false) {
    if ($first) {
      $classrooms = 
	$this->ci->doctrine->em->getRepository('Entity\Classroom_Teacher')
	->findByTeacher($this->user->getId());

      $results = array();
      for($i=0, $max = count($classrooms); $i<$max; ++$i) {
	if ($classrooms[$i]->getActive()) {
	  $results[] = $classrooms[$i];
	}
    }
      return $results;
    }else if (count($this->user_classrooms)){
      foreach($this->user_classrooms as $classroom) 
	$classrooms[] = $classroom;
      return $classrooms;
    } else return array();
  }

    public function get_classroom($id, $add = false) {
    $classroom = $this->user_classrooms[$id];
    if (!$classroom) {
      $uid = $this->user->getId();
      $classroom = $this->ci->doctrine->em->getRepository
	('Entity\Classroom_Teacher')->findOneBy(array('classroom'=>$id,
						      'teacher'=>$uid));
      if ($classroom && $add) $this->user_classrooms[$id] = $classroom;
    }
    if (!$classroom) return null;
    return $classroom->getClassroom();
  }

    public function del_classroom($id) {
    $classroom = $this->user_classrooms[$id];
    if($classroom != null) {
        $classroom->setActive(0);
        $this->ci->doctrine->em->persist($classroom);
        $this->ci->doctrine->em->flush();
        unset($this->user_classrooms[$id]);
        return 1;
    }
      return -1;
  }

    public function update_classroom($name, $code, $school_code, $id) {
    $classroom = $this->user_classrooms[$id];
    if ($classroom == null) 
      $classroom = $this->ci->doctrine->em->getRepository('Entity\Classroom')
	->find($id);
    else $classroom = $classroom->getClassroom();
    if ($classroom == null) return -1;
    if ($classroom->cannotBeEditedBy($this->user)) return -2;

    $classroom->setName($name);
    $classroom->setCode($code);
    if ($classroom->getSchool()->getCode() != $school_code) {
      $school = $this->ci->doctrine->em->getRepository('Entity\School')
	->findOneBy(array('code'=>$school_code));
      if ($school == null) {
	$school = new \Entity\School();
	$school->setCode($school_code);
	$school->setName($school_code);
	$this->ci->doctrine->em->persist($school);
      }
      $classroom->setSchool($school);
      $this->user->addSchool($school_code);
    }

    $this->ci->doctrine->em->persist($classroom);
    $this->ci->doctrine->em->flush();
    return $classroom;
  }

    public function share_classroom($clid, $email) {
      $classroom = $this->user_classrooms[$clid];
      if ($classroom) $classroom = $classroom->getClassroom();
      else return -1;
      $teacher = $this->ci->doctrine->em->getRepository('Entity\Teacher')->findOneByEmail($email);
      if ($teacher == null) return -1;
    
      $classroom_teacher = $this->ci->doctrine->em->getRepository('Entity\Classroom_Teacher')->findOneBy(
          array('classroom'=>$clid, 'teacher'=>$teacher->getId())
      );
      if ($classroom_teacher && $classroom_teacher->getActive()) return -3;


      $classroom_teacher = new \Entity\Classroom_Teacher();
      $classroom_teacher->setTeacher($teacher);
      $classroom_teacher->setClassroom($classroom);
      $classroom_teacher->setActive(2);


     $this->ci->doctrine->em->persist($classroom_teacher);
     $this->ci->doctrine->em->flush();
     return 1;
  }

    public function activate_classroom($clid) {
        $classroom_teacher = $this->ci->doctrine->em->getRepository('Entity\Classroom_Teacher')->findOneBy(
            array('classroom'=>$clid,'teacher'=>$this->user->getId())
        );
        if ($classroom_teacher == null) return -1;
        if ($classroom_teacher->getActive() == 1) return 0;
        $classroom_teacher->setActive(1);
        $this->ci->doctrine->em->flush();
        return 1;
    }

    public function add_file_classroom($id, $file) {
        $classroom = $this->user_classrooms[$id];
        if ($classroom == null)
            $classroom = $this->ci->doctrine->em->getRepository('Entity\Classroom')->find($id);
        else $classroom = $classroom->getClassroom();
        if ($classroom == null) return -1;

        $classroom->addFile($file);
        try {
            $this->ci->doctrine->em->persist($classroom);
            $this->ci->doctrine->em->flush();
            return 1;
        }catch(Exception $e) {
            return $e->getMessage();
        }

    }

    public function classroom_active_status($clid) {
        $classroom_teacher = $this->ci->doctrine->em->getRepository('Entity\Classroom_Teacher')->findOneBy(
            array('classroom'=>$clid,'teacher'=>$this->user->getId())
        );
        if ($classroom_teacher == null) return -1;
        return $classroom_teacher->getActive();
    }

    public function std_from_file($clid, $src) {
    if (!file_exists('../app/files/'.$src)) return array(-1);
    $classroom = $this->user_classrooms[$clid];
    if (!$classroom) return array(-3);
    $classroom = $classroom->getClassroom();
    if ($classroom->cannotBeEditedBy($this->user)) return array(-2);
    $file = fopen('../app/files/'.$src, 'r');
    $stds = array(1);
    while($name = fgets($file)) {
      $name = strrev($name);
      $name = substr($name, 1);
      $name = strrev($name);
      $stds[] = $this->add_student($name, null, null, null, null, $clid);
    }
    fclose($file);
    return $stds;
  }


    public function get_students($clid) {
    $clid = (int)$clid;
    $classroom = $this->user_classrooms[$clid];
    if ($classroom) $classroom = $classroom->getClassroom();
    $students = $this->ci->doctrine->em->getRepository('Entity\Student')->findByClassroom($classroom);
    $results = array();
    for($i=0, $max = count($students); $i<$max; ++$i) 
      if ($students[$i]->getActive()) $results[] = $students[$i];

    return $results;
  }
  
    public function del_student($id) {
    $id = (int)$id;
    $student = $this->ci->doctrine->em->getRepository('Entity\Student')
      ->find($id);

    if($student != null && $classroom = $student->getClassroom()){
        if ($classroom->cannotBeEditedBy($this->user)) return;
        $student->setActive(0);
        $this->ci->doctrine->em->persist($student);
        $this->ci->doctrine->em->flush();
        return 1;
    }
      return 0;
  }

    public function add_student($name, $email, $phone, $sexe, $img, $clid) {
        $student = new \Entity\Student();
        $student->setName($name);
        $student->setEmail($email);
        $student->setPhone($phone);
        $student->setSexe($sexe);
        $student->setImg($img);

        $clid = (int)$clid;
        $classroom = $this->user_classrooms[$clid];
        if ($classroom) {
            $classroom = $classroom->getClassroom();
            if ($classroom->cannotBeEditedBy($this->user)) return -2;
        }
        else return;
        $student->setClassroom($classroom);
        $this->ci->doctrine->em->persist($student);
        $tests = $this->get_tests();
        //$marks = array();
        for ($i=0, $max =count($tests); $i<$max; ++$i){
            $mark = new \Entity\Mark();
            $mark->setTest($tests[$i]);
            $mark->setStudent($student);
            $this->ci->doctrine->em->persist($mark);
        }
        $this->ci->doctrine->em->flush();

        return $student;
    }

    public function update_student($name, $email, $phone, $sexe, $img, $id) {
    $student = $this->ci->doctrine->em->getRepository('Entity\Student')
      ->find($id);
    if ($student == null) return -1;
    if($classroom = $student->getClassroom())
      if ($classroom->cannotBeEditedBy($this->user)) return -2;

    $student->setName($name);
    $student->setEmail($email);
    $student->setPhone($phone);   
    $student->setSexe($sexe);   
    $student->setImg($img);
    $this->ci->doctrine->em->persist($student);
    $this->ci->doctrine->em->flush();
    return $student;
  }

    public function save_student($params, $id) {
        $classroom = $this->user_classrooms[$params['classroom_id']];
        if ($classroom) {
            $classroom = $classroom->getClassroom();
            if ($classroom->cannotBeEditedBy($this->user)) return -2;
        }

        $student = $this->ci->doctrine->em->getRepository('Entity\Student')->find($id);
        if ($student == null) $student = new \Entity\Student();
        $student->setName($params['name']);
        $student->setEmail($params['email']);
        $student->setPhone($params['phone']);
        $student->setSexe($params['sexe']);
        $student->setImg($params['img']);

        $student->setClassroom($classroom);
        $this->ci->doctrine->em->persist($student);

        if (!$id) {
            $tests = $this->get_classroom_tests($params['classroom_id']);
            for ($i=0, $max =count($tests); $i<$max; ++$i){
                $mark = new \Entity\Mark();
                $mark->setTest($tests[$i]);
                $mark->setStudent($student);
                $this->ci->doctrine->em->persist($mark);
            }
        }
        $this->ci->doctrine->em->flush();

        return $student;
    }


    public function get_tests() {
        $tests = $this->ci->doctrine->em->getRepository('Entity\Test_Teacher')->findByTeacher($this->user);

        $results = array();
        for($i=0, $max = count($tests); $i<$max; ++$i) {
            if (!$tests[$i]->getActive()) continue;
            $test = $tests[$i];
            $id = $test->getTest()->getClassroom()->getId();
            if (isset($this->user_classrooms[$id]))
	        $results[] = $tests[$i]->getTest();
        }
        return $results;
    }

    public function get_classroom_tests($clid) {
        $tests = $this->ci->doctrine->em->getRepository('Entity\Test_Teacher')->findByTeacher($this->user);

        $results = array();
        for($i=0, $max = count($tests); $i<$max; ++$i) {
            if (!$tests[$i]->getActive()) continue;
            $test = $tests[$i];
            $id = $test->getTest()->getClassroom()->getId();
            if ($id == $clid)
                $results[] = $tests[$i]->getTest();
        }
        return $results;
    }

    public function get_test($id) {
    $test = $this->ci->doctrine->em->getRepository('Entity\Test_Teacher')
      ->findOneBy(array('test'=>$id, 'teacher'=>$this->user->getId()));
    return $test->getTest();
  }

    public function del_test($id) {
    return;
    $test = $this->ci->doctrine->em->getRepository('Entity\Test_Teacher')
      ->findOneBy(array('test'=>$id, 'teacher'=>$this->user->getId()));
    
    if($test != null) {
      $test->setActive(0);
      $this->ci->doctrine->em->persist($test);
      $this->ci->doctrine->em->flush();
        return 1;
    }
      return 0;
  }

    public function add_test($code, $perc, $subj, $seq, $date, $clid) {
        $classroom = $this->user_classrooms[$clid];
        if ($classroom == null) return -1;
        $classroom = $classroom->getClassroom();
        $test = new \Entity\Test();
        $test->setCode($code);
        $test->setPercent($perc);
        $test->setSubject($subj);
        $test->setSeq($seq);
        $test->setDate($date);
        $test->setClassroom($classroom);
        $test->setResp($this->user);

        $this->ci->doctrine->em->persist($test);

        $test_teacher = new \Entity\Test_Teacher();
        $test_teacher->setTeacher($this->user);
        $test_teacher->setTest($test);
        $this->ci->doctrine->em->persist($test_teacher);

        $students = $this->get_students($classroom->getId());
        //$marks = array();
        for ($i=0, $max = count($students); $i<$max; ++$i) {
            $mark = new \Entity\Mark();
            $mark->setStudent($students[$i]);
            $mark->setTest($test);
            $this->ci->doctrine->em->persist($mark);
        }

        $this->ci->doctrine->em->flush();
        return $test;
    }

    public function update_test($code, $perc, $subj, $seq, $date, $clid, $id){
    $test = $this->ci->doctrine->em->getRepository('Entity\Test')
      ->find($id);
    if ($test == null) return -1;
    if ($test->cannotBeEditedBy($this->user)) return -2;

    $test->setCode($code);
    $test->setPercent($perc);
    $test->setSubject($subj);
    $test->setSeq($seq);

    $this->ci->doctrine->em->persist($test);
    $this->ci->doctrine->em->flush();
    return $test;
  }

    public function save_test($params, $id = 0) {
        $classroom = $this->user_classrooms[$params['classroom_id']];
        if ($classroom == null) return -1;
        $classroom = $classroom->getClassroom();
        $test = $this->ci->doctrine->em->getRepository('Entity\Test')->find($id);
        if ($test == null) $test = new \Entity\Test();
        $test->setCode($params['code']);
        $test->setSubject($params['subj']);
        if ($params['date']) $test->setDate(DateTime::createFromFormat('Y-m-d',$params['date']));
        $test->setDate($params['date']);
        $test->setClassroom($classroom);
        $test->setResp($this->user);

        $this->ci->doctrine->em->persist($test);

        $test_teacher = new \Entity\Test_Teacher();
        $test_teacher->setTeacher($this->user);
        $test_teacher->setTest($test);
        $this->ci->doctrine->em->persist($test_teacher);

        $students = $this->get_students($classroom->getId());
        //$marks = array();
        for ($i=0, $max = count($students); $i<$max; ++$i) {
            $mark = new \Entity\Mark();
            $mark->setStudent($students[$i]);
            $mark->setTest($test);
            $this->ci->doctrine->em->persist($mark);
        }

        $this->ci->doctrine->em->flush();
        return $test;
    }

    public function share_test($tid, $email) {
      $test = $this->ci->doctrine->em->getRepository('Entity\Test')->find($tid);
      if (!$test) return -5;
      $teacher = $this->ci->doctrine->em->getRepository('Entity\Teacher')->findOneByEmail($email);
      if (!$teacher) return -1;
    
      $classroom = $test->getClassroom();
      if (!$classroom) return -4;
      $classroom_teacher = $this->ci->doctrine->em->getRepository('Entity\Classroom_Teacher')->findOneBy(
          array('classroom'=>$classroom->getId(),'teacher'=>$teacher->getId())
		);
      if (!$classroom_teacher) return -2;

      $test_teacher = $this->ci->doctrine->em->getRepository('Entity\Test_Teacher')->findOneBy(
          array('test'=>$tid, 'teacher'=>$teacher->getId())
      );
     if ($test_teacher && $test_teacher->getActive()) return -3;

     $test_teacher = new \Entity\Test_Teacher();
     $test_teacher->setTeacher($teacher);
     $test_teacher->setTest($test);
     $test_teacher->setActive(2);

     $this->ci->doctrine->em->persist($test_teacher);
     $this->ci->doctrine->em->flush();
     return 1;
  }

    public function activate_test($tid) {
        $test_teacher = $this->ci->doctrine->em->getRepository('Entity\Test_Teacher')->findOneBy(
            array('test'=>$tid,'teacher'=>$this->user->getId())
        );
        if ($test_teacher == null) return -1;
        if ($test_teacher->getActive() == 1) return 0;
        $test_teacher->setActive(1);
        $this->ci->doctrine->em->flush();
        return 1;
    }

    public function add_file_test($id, $file) {
        $test = $this->ci->doctrine->em->getRepository('Entity\Test')->find($id);

        if ($test == null) return -1;

        $test->addFile($file);
        $this->ci->doctrine->em->persist($test);
        $this->ci->doctrine->em->flush();
        return 1;
    }

    public function test_active_status($tid) {
        $test_teacher = $this->ci->doctrine->em->getRepository('Entity\Test_Teacher')->findOneBy(
            array('test'=>$tid,'teacher'=>$this->user->getId())
        );
        if ($test_teacher == null) return -1;
        return $test_teacher->getActive();
    }

    public function add_mark($stdid, $value, $tid) {
      $stdid = (int) $stdid;
      $tid = (int) $tid;
      $student = $this->ci->doctrine->em->getRepository('Entity\Student')->find($stdid);
      if ($student == null) return -1;
      $test = $this->ci->doctrine->em->getRepository('Entity\Test')->find($tid);
      if ($test == null) return -3;
      if ($test->cannotBeEditedBy($this->user)) return -2;
      $mark = $this->ci->doctrine->em->getRepository('Entity\Mark')->findOneBy(array('student'=>$stdid, 'test'=>$tid));
      if ($mark == null) $mark = new \Entity\Mark();
      $mark->setStudent($student);
      $mark->setTest($test);
      $mark->setValue($value);

      $this->ci->doctrine->em->persist($mark);
      $this->ci->doctrine->em->flush();

      return $mark;
  }

    public function update_mark($value, $id) {
        $id = (int) $id;
        $mark = $this->ci->doctrine->em->getRepository('Entity\Mark')->find($id);

        if ($mark == null) return -1;

        $mark->setValue($value);
        $this->ci->doctrine->em->flush();
        return $mark;
    }

    public function save_mark($params, $id = 0) {
        $test = $this->ci->doctrine->em->getRepository('Entity\Test')->find($params['test_id']);
        if ($test == null) return -3;
        if ($test->cannotBeEditedBy($this->user)) return -2;

        $mark = $this->ci->doctrine->em->getRepository('Entity\Mark')->find($id);
        if ($mark == null) $mark = $this->ci->doctrine->em->getRepository('Entity\Mark')->findOneBy(
                                        array('test'=>$params['test_id'], 'student'=>$params['student_id'])
                                    );
        if ($mark == null) $mark = new \Entity\Mark();

        $student = $this->ci->doctrine->em->getRepository('Entity\Student')->find($params['student_id']);
        if ($student == null) return -1;

        $mark->setStudent($student);
        $mark->setTest($test);
        $mark->setValue($params['value']);

        $this->ci->doctrine->em->persist($mark);
        $this->ci->doctrine->em->flush();

        return $mark;
    }

    public function get_marks($tid) {
        return $this->ci->doctrine->em->getRepository('Entity\Mark')->findBy(array('test'=>$tid));
    }


  public function add_file($name, $data, $type) {
    $file = new \Entity\File();
    $file->setName($name);
    $file->setData($data);
    $file->setType($type);
    $file->setResp($this->user);

    $this->ci->doctrine->em->persist($file);
    $this->ci->doctrine->em->flush();

    return $file;
  }

  public function update_file($name, $data, $type, $id) {
    $id = (int) $id;
    $file = $this->ci->doctrine->em->getRepository('Entity\File')->find($id);
    if ($file == null) return -1;
    $file->setName($name);
    $file->setData($data);
    $file->setType($type);
    $this->ci->doctrine->em->flush();
    return $file;
  }

  public function get_files() {
    $files = $this->ci->doctrine->em->getRepository('Entity\File')
      ->findByResp($this->user);

    $results = array();
    for($i=0, $max = count($files); $i<$max; ++$i) 
      if ($files[$i]->getActive()) $results[] = $files[$i];

    return $results;
  }

  public function get_file($id) {
    $file = $this->ci->doctrine->em->getRepository('Entity\File')
      ->find($id);
    if($file != null && $file->getActive()) return $file;
  }

  public function del_file($id) {
    $file = $this->ci->doctrine->em->getRepository('Entity\File')
      ->find($id);
    if($file != null) {
      $file->setActive(0);
      $this->ci->doctrine->em->persist($file);
      $this->ci->doctrine->em->flush();
    }
  }

  public function send_file($fid, $email) {
    $rfile = $this->ci->doctrine->em->getRepository('Entity\File')->find($fid);
    if (!$rfile) return -1;
    $teacher = $this->ci->doctrine->em->getRepository('Entity\Teacher')
      ->findOneByEmail($email);
    if (!$teacher) return -1;

    $file = new \Entity\File();
    $file->setName($rfile->getName());
    $file->setData($rfile->getData());
    $file->setType($rfile->getType());
    $file->setResp($teacher);

    $this->ci->doctrine->em->persist($file);
    $this->ci->doctrine->em->flush();

    return 1;
  }

}

?>