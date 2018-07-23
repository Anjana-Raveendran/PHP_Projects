<?php
namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\StudentDetails;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewStudentController extends Controller{
    /**
     * @Route("/student/newstudent", name="student_app_new")
     */

    public function newStudentAction(Request $request)
    {
        $user = new UserType();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('replace_with_some_route');
        }

        return $this->render(
            'newstudent.html.twig',
            array('form' => $form->createView())
        );
    }
}
?>
