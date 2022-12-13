<?php

namespace App\Service;

use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;

class CourseServices extends AbstractService
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager);
    }

    public function getAllCourses()
    {
        return $this->entityManager->getRepository(Course::class)->findAll();
    }
}