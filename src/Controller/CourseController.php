<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CourseRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;

class CourseController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/api/v1/courses', name: 'get_courses', methods: ['GET'])]
    public function getCourses(CourseRepository $courseRepository): JsonResponse
    {
        $courses = $courseRepository->findAll();
        $data = [];
        
        foreach ($courses as $course) {
            $data[] = [
                'code' => $course->getCode(),
                'title' => $course->getTitle(),
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
            'title' => $course->getTitle(),
            'description' => $course->getDescription(),
            'type' => $course->getType(),
            'price' => $course->getPrice(),
        ]);
    }

    #[Route('/api/v1/courses/create', name: 'create_course', methods: ['POST'])]
    public function createCourse(Request $request, CourseRepository $courseRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['code'], $data['title'], $data['type'], $data['price'], $data['description'])) {
            return $this->json(['message' => 'Недостаточно данных для создания курса'], 400);
        }

        $existingCourse = $courseRepository->findOneBy(['code' => $data['code']]);
        if ($existingCourse) {
            return $this->json(['message' => 'Курс с таким символьным кодом уже существует'], 400);
        }

        $course = new Course();
        $course->setCode($data['code']);
        $course->setTitle($data['title']);
        $course->setDescription($data['description']);
        $course->setType($data['type']);
        $course->setPrice($data['price']);

        $this->entityManager->persist($course);
        $this->entityManager->flush();

        return $this->json(['success' => true], 201);
    }

    #[Route('/api/v1/courses/{code}/update', name: 'update_course', methods: ['POST'])]
    public function updateCourse(Request $request, CourseRepository $courseRepository, string $code): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['code'], $data['title'], $data['type'], $data['price'], $data['description'])) {
            return $this->json(['message' => 'Недостаточно данных для обновления курса'], 400);
        }

        $course = $courseRepository->findOneBy(['code' => $code]);
        if (!$course) {
            return $this->json(['message' => 'Курс не найден'], 404);
        }

        $course->setCode($data['code']);
        $course->setTitle($data['title']);
        $course->setDescription($data['description']);
        $course->setType($data['type']);
        $course->setPrice($data['price']);

        $this->entityManager->flush();

        return $this->json(['success' => true]);
    }
}
