<?php

class ApiController extends Controller
{

    public function index(): void
    {

    }

    public function exercises(): void
    {
        $exercise = new Exercise();
        $exercises = $exercise->findAll();

        echo json_encode(['exercises' => $exercises], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
    }

    public function categories(): void
    {
        $category = new Category();
        $categories = $category->findAll();

        echo json_encode(['category' => $categories], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
    }

    public function publicWorkouts(): void
    {
        $query = $_GET['query'] ?? '';
        $category = $_GET['category'] ?? '';


        try {

            $trainings = new Training();
            $workouts = $trainings->findAllPublicSearchWithJoins('public', $query, $category);

            header('Content-Type: application/json');
            echo json_encode($workouts, JSON_THROW_ON_ERROR);

        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }

    }

    public function addCategory(): void
    {

        $category = new Category();

        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = trim($_POST['categoryName']);
            if (!empty($title)) {
                $category->insert(['name' => $title]);
                $response['success'] = true;
                $response['message'] = 'Success';
            } else {
                $response['message'] = 'Category name cannot be empty.';
            }
        } else {
            $response['message'] = 'Invalid request method.';
        }

        echo json_encode($response, JSON_THROW_ON_ERROR);

    }


    public function addExercise(): void
    {

        $execise = new Exercise();

        $response = ['success' => false, 'message' => ''];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $exerciseTitle = test_input($_POST['exerciseTitle']);
            $exerciseDesc = test_input($_POST['exerciseDesc']);
            $duration = test_input($_POST['exerciseDuration']);
            $photoUrl = test_input($_POST['photo_url']);
            $videoUrl = test_input($_POST['video_url']);
            if (!empty($exerciseTitle) && !empty($exerciseDesc) && !empty($photoUrl) && !empty($duration)) {
                $execise->insert(['title' => $exerciseTitle, 'description' => $exerciseDesc,'duration' => $duration, 'image_url' => $photoUrl, 'video_url' => $videoUrl]);
                $response['success'] = true;
                $response['message'] = 'Success';
            } else {
                $response['message'] = 'Please fill out all fields (video link url is optional).';
            }
        } else {
            $response['message'] = 'Invalid request method.';
        }

        echo json_encode($response, JSON_THROW_ON_ERROR);

    }

}