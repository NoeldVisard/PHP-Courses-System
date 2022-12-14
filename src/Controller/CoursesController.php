<?php

namespace App\Controller;

use App\Service\CourseServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function index(CourseServices $courseServices): Response
    {
        $courses = $courseServices->getAllCourses();
        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CoursesController',
            'courses' => $courses,
        ]);
    }

    #[Route('/courses/{courseId}', methods:['GET'], name: 'app_course')]
    public function getCourse(CourseServices $courseServices, int $courseId): Response
    {
        $courseBlocks = $courseServices->getCourseBlocksByCourseId($courseId);
        return new JsonResponse($courseBlocks);
    }
}
