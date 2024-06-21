<?php

class ApiController extends Controller
{

    public function index()
    {

    }

    public function exercises()
    {
        $exercise = new Exercise();
        $exercises = $exercise->findAll();

        echo json_encode(['exercises' => $exercises], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
    }

    public function publicWorkouts()
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

}