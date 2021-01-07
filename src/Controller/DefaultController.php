<?php


namespace App\Controller;


use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(EntityManagerInterface $entityManager) {
        $students = $entityManager->getRepository(Student::class)->findAll();
        return $this->render('base.html.twig', [
            'students' => $students
        ]);
    }
}