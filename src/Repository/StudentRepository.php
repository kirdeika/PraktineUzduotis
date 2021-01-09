<?php

namespace App\Repository;

use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }

    public function fetchAllStudentData() {
        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = '
                SELECT student.id, student.first_name, student.last_name, AVG(mark.mark) AS avg_mark, subject.name as subject_name, university.name as university_name, subject.code as subject_code
                FROM student
                INNER JOIN mark ON mark.student_id = student.id
                INNER JOIN subject ON mark.subject_id = subject.id
                INNER JOIN university ON student.university_id = university.id
                GROUP BY mark.subject_id, student.id
                ORDER BY student.id ASC, mark.subject_id
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAllAssociative();
    }
}