<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\StudentDetails;
use AppBundle\Controller\studentController;

class StudentRepository extends EntityRepository
{
 public function findAllOrderedByName()
    {
        return $this->findBy(array(),array('name' => 'ASC'));
    }
    public function addStudent(\AppBundle\Entity\StudentDetails $stud)
    {
       $this->_em -> persist($stud);
       $this->_em -> flush();
    }
    public function deleteStudent(\AppBundle\Entity\StudentDetails $stud)
    {
        if (!$stud) {
            throw $this->createNotFoundException('No student found for id '.$id);
    }
         $this->_em -> remove($stud);
         $this->_em -> flush();
    }
    public function editStudent(\AppBundle\Entity\StudentDetails $stud)
    {
           if (!$stud) {
               throw $this->createNotFoundException('No student found for id '.$id);
           }
        $this->_em -> persist($stud);
        $this->_em -> flush();
    }
}
?>
