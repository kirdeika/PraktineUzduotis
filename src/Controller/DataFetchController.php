<?php


namespace App\Controller;

use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataFetchController extends AbstractController
{
    /**
     * @Route("/fetchStudentData", name="student_data", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function sortOutStudentData(EntityManagerInterface $entityManager, Request $request) {
        $students = $entityManager->getRepository(Student::class)->fetchAllStudentData();
        $studentsSorted = array();
        foreach($students as $student) {
            $studentsSorted[$student['id']]['full_name'] = $student['first_name'] . ' ' . $student['last_name'];
            $studentsSorted[$student['id']]['university_name'] = $student['university_name'];
            $studentsSorted[$student['id']][$student['subject_code']] = array(
                'subject_name' => $student['subject_name'],
                'avg_mark' => number_format($student['avg_mark'], 1, ',', '')
            );

        }

        return new JsonResponse($studentsSorted, Response::HTTP_OK);
    }
}