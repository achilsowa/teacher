<?php
namespace Entity;
use Doctrine\ORM\EntityRepository;
/**
 * MarkRepository
 */

class MarkRepository extends EntityRepository{
  
  public function findByTestId($tid) {
    /*we use a left join for school so even if the classroom do not a have 
      a school, the row is still loaded. And since the row must have a resp
      for our query to be logic, we keep join for the resp's field.

      unlike findByTest, this method do not produce __CG__EntityStudent.php 
      error. From now, we dont know why.
    */
    $query = $this->_em->createQuery('SELECT m, t, s FROM Entity\Mark m '.
				     'JOIN m.test t JOIN m.student s '.
				     'WHERE t.id = :tid');
    $query->setParameter('tid', $tid);
    return $query->getResult();
  }

  public function findById($id) {
    $query = $this->_em->createQuery('SELECT m, t, s FROM Entity\Mark m '.
				     'JOIN m.test t JOIN m.student s '.
				     'WHERE m.id = :id');
    $query->setParameter('id', $id);
    return $query->getResult();

  }
}
