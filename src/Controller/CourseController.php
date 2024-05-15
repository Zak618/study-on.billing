<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CourseRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

class CourseController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @OA\Get(
     *     path="/api/v1/courses",
     *     summary="Получение списка всех курсов",
     *     description="Возвращает список всех доступных курсов.",
     *     @OA\Response(
     *         response=200,
     *         description="Список курсов",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref=@Model(type=Course::class))
     *         )
     *     )
     * )
     */
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
    /**
     * @OA\Get(
     *     path="/api/v1/courses/{code}",
     *     summary="Получение информации о курсе",
     *     description="Возвращает детальную информацию о курсе по его коду.",
     *     @OA\Parameter(
     *         name="code",
     *         in="path",
     *         required=true,
     *         description="Код курса",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Информация о курсе",
     *         @OA\JsonContent(ref=@Model(type=Course::class))
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Курс не найден"
     *     )
     * )
     */
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
    /**
     * @OA\Post(
     *     path="/api/v1/courses/create",
     *     summary="Создание нового курса",
     *     description="Создает новый курс с указанными данными.",
     *     @OA\RequestBody(
     *         description="Данные нового курса",
     *         required=true,
     *         @OA\JsonContent(ref=@Model(type=Course::class))
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Курс успешно создан",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Ошибка в данных"
     *     )
     * )
     */
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
    /**
     * @OA\Post(
     *     path="/api/v1/courses/{code}/update",
     *     summary="Обновление данных курса",
     *     description="Обновляет информацию о курсе на основе предоставленных данных.",
     *     @OA\Parameter(
     *         name="code",
     *         in="path",
     *         required=true,
     *         description="Код курса для обновления",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         description="Обновленные данные курса",
     *         required=true,
     *         @OA\JsonContent(ref=@Model(type=Course::class))
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Курс успешно обновлен",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверные данные для обновления"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Курс не найден"
     *     )
     * )
     */
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
