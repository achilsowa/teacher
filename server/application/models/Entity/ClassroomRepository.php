<?php
namespace Entity;
use Doctrine\ORM\EntityRepository;
/**
 * ClassroomRepository
 */

class ClassroomRepository extends EntityRepository{

  public function getStudents($clid) {
    $query = $this->_em->createQuery('SELECT s.id, s.name, s.phone, s.sexe, '.
				     's.birth, s.img, s.email FROM '.
				     'Entity\Student s JOIN s.classroom c '.
				     'WHERE c.id = :cid');
    $query = $this->_em->createQuery('SELECT s FROM Entity\Student s '.
				     'JOIN s.classroom c WHERE c.id = :cid');

    $query->setParameter('cid', $clid);
    return $query->getResult();
  }

  public function findByRespId($rid) {
    /*we use a left join for school so even if the classroom do not a have 
      a school, the row is still loaded. And since the row must have a resp
      for our query to be logic, we keep join for the resp's field.

      unlike findByResp, this method do not produce __CG__EntitySchool.php 
      error. From now, we dont know why.
    */
    $query = $this->_em->createQuery('SELECT c, s, r FROM Entity\Classroom c '.
				     'JOIN c.resp r LEFT JOIN c.school s '.
				     'WHERE r.id = :rid');
    $query->setParameter('rid', $rid);
    return $query->getResult();
  }


}
