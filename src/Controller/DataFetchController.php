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
        $students = $entityManager->getRepository(Student::class)->fetchAllStudentData(); //Using previously created function on repository to fetch all necessary student data.
        $studentsSorted = array(); //Creating empty array to sort out the fetched data.
        foreach($students as $student) {
            /*
             * Down here I am creating associative array structure like this:
             * student_id: {
             *      full_name: "",              //Student first and last name.
             *      university_name: "",        //University name.
             *      subject_code: {             //Subject code is being used from the Database, to eliminate any Lithuanian characters from variables. This variable array gets created as many times as there are subjects.
             *          subject_name: "",       //Subject name now with the proper grammar
             *          average_mark: ""        //Already calculated average mark, but before it gets sent out as json, this number is formatted and rounded.
             *      }
             * }
             */
            $studentsSorted[$student['id']]['full_name'] = $student['first_name'] . ' ' . $student['last_name'];
            $studentsSorted[$student['id']]['university_name'] = $student['university_name'];
            $studentsSorted[$student['id']][$student['subject_code']] = array(
                'subject_name' => $student['subject_name'],
                'avg_mark' => number_format($student['avg_mark'], 1, ',', '')
            );

        }
        //Returning JsonResponse
        return new JsonResponse($studentsSorted, Response::HTTP_OK);
    }
}