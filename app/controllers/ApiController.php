<?php

class ApiController extends Controller
{

    public function index()
    {
        
    }
    public function exercises()
    {

        if ($_SESSION['type'] !== 'admin') {
            echo json_encode(['error' => 'Unauthorized']);
            http_response_code(401);
            exit();
        }

        $exercise = new Exercise();
        $exercises = $exercise->findAll();

        echo json_encode(['exercises' => $exercises], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
    }

    public function publicWorkouts()
    {

        if ($_SESSION['type'] !== 'admin') {
            echo json_encode(['error' => 'Unauthorized']);
            http_response_code(401);
            exit();
        }

        $training = new Training();
        $trainings = $training->where(['privacy' => 'public']);

        echo json_encode(['trainings' => $trainings], JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
    }

}