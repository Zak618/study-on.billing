<?php



namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CourseRepository;

class CourseController extends AbstractController
{
    #[Route('/api/v1/courses', name: 'get_courses', methods: ['GET'])]
    public function getCourses(CourseRepository $courseRepository): JsonResponse
    {
        $courses = $courseRepository->findAll();
        $data = [];
        
        foreach ($courses as $course) {
            $data[] = [
            'code' => $course->getCode(),
            'name' => $course->getName(), 
            'description' => $course->getDescription(), 
            'type' => $course->getType(),
            'price' => $course->getPrice(),
            ];
        }
        
        return $this->json($data);
    }

    #[Route('/api/v1/courses/{code}', name: 'get_course', methods: ['GET'])]
    public function getCourse(CourseRepository $courseRepository, string $code): JsonResponse
    {
        $course = $courseRepository->findOneBy(['code' => $code]);
        
        if (!$course) {
            return $this->json(['message' => 'Course not found'], 404);
        }
        
        return $this->json([
            'code' => $course->getCode(),
        'name' => $course->getName(),
        'description' => $course->getDescription(),
        'type' => $course->getType(),
        'price' => $course->getPrice(),
        ]);
    }
}
