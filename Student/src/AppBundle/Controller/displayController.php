<?php

namespace AppBundle\Controller;

use AppBundle\Repository;
use AppBundle\Entity\StudentDetails;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

class displayController extends Controller
{
    /**
      * @Route("/student/displaypage" ,name = "app_student_display" )
      */
  public function displayAction(Request $request) {
      $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('AppBundle:StudentDetails')->createQueryBuilder('bp');
        if ($request->query->getAlnum('filter')) {
            $queryBuilder->where('bp.name LIKE :name')
                ->setParameter('name', '%' . $request->query->getAlnum('filter') . '%');
        }
        $query = $queryBuilder->getQuery();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 6)/*limit per page*/
        );
    // parameters to template
    return $this->render('displaystudent.html.twig', array('pagination' => $pagination));
  }
    /**
      * @Route("/student/insertpage", name="app_student_new")
      */
    public function insertAction(Request $request) {
        $stud = new StudentDetails();
        $form = $this->createFormBuilder($stud)
            ->add('name', TextType::class)
            ->add('age', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $stud = $form->getData();
            $stud = $this->getDoctrine()
                ->getRepository('AppBundle:StudentDetails')
                ->addStudent($stud);
            return $this->redirectToRoute('app_student_display');
        } else {
            return $this->render('insertstudent.html.twig', array('form' => $form->createView(),));
        }
    }

    /**
     * @Route("/student/delete/{id}", name="app_student_delete")
     */
    public function deleteAction($id) {
        $stud = $this->getDoctrine()
            ->getRepository('AppBundle:StudentDetails')
            ->find($id);
        $stud = $this->getDoctrine()
            ->getRepository('AppBundle:StudentDetails')
            ->deleteStudent($stud);
        return $this->redirectToRoute('app_student_display');
    }

    /**
     *  @Route("/student/update/{id}", name = "app_student_edit" )
     */
    public function updateAction($id, Request $request) {
        $stud = $this->getDoctrine()
            ->getRepository('AppBundle:StudentDetails')
            ->find($id);
        $form = $this->createFormBuilder($stud)
            ->add('name', TextType::class)
            ->add('age', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Submit'))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $stud = $form->getData();
            $stud = $this->getDoctrine()
                ->getRepository('AppBundle:StudentDetails')
                ->editStudent($stud);
            return $this->redirectToRoute('app_student_display');
        } else {
            return $this->render('editstudent.html.twig', array('form' => $form->createView(), ));
        }
    }
}
?>
