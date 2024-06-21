<?php

class TrainingsController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['type']))
            redirect('home');
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $training = new Training();
        $category = new Category();
        $data['categories'] = $category->findAll();
        $data['info'] = $training->findAllPublicWithJoins('public');


        $this->view('Trainings', $data);

    }

    public function workout()
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $workout = new Training();
        $data['workout'] = $workout->findWhereIdWithJoinsDetailed($_GET['id']);


        $this->view('Workout', $data);

    }

    public function make()
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $category = new Category();
        $exercises = new Exercise();
        $workout = new Training();
        $workoutExercises = new WorkoutExercises();
        $user = new User();


        if ($_SESSION['type'] === 'trainer' && $user->where(['id' => $_SESSION['userId']])[0]['permission'] !== 'approved')
            redirect('home');


        if ($_POST) {
            $categoryId = $category->where(['name' => $_POST['category']])[0]['category_id'];
            if ($_POST['duration_unit'] === 'none' || empty($_POST['title']) || empty($_POST['description']) || empty($_POST['privacy']))
                $category->errors['duration_unit'] = 'Please fill out the form.';
            else {
                $title = trim($_POST['title']);
                $description = trim($_POST['description']);
                $durationV = $_POST['duration_value'];
                $durationU = $_POST['duration_unit'];
                $userId = $_SESSION['userId'];
                $privacy = $_POST['privacy'];
                $workout->insert(['title' => $title, 'description' => $description, 'duration_value' => $durationV, 'duration_unit' => $durationU, 'id' => $userId, 'category_id' => $categoryId, 'privacy' => $privacy]);


                $findAll = $workout->findAll();
                $lastWorkout = $workout->findAll()[count($findAll) - 1]['workout_id'];

                foreach ($_POST['exercises'] as $index => $exerciseTitle) {
                    $dayOfWeek = $_POST['days_of_week'][$index];
                    $exerciseId = $exercises->where(['title' => $exerciseTitle])[0]['exercise_id'];
                    $workoutExercises->insert(['workout_id' => $lastWorkout, 'exercise_id' => $exerciseId, 'day_of_week' => $dayOfWeek]);
                }

                $data['succ'] = 'success';
            }
        }

        $data['exercises'] = $exercises->findAll();
        $data['categories'] = $category->findAll();
        $data['errors'] = $category->errors;
        $this->view('MakeWorkout', $data);

    }


    public function my()
    {
        if (!isset($_SESSION['type']))
            redirect('home');
        elseif ($_SESSION['type'] === 'admin')
            redirect('home');
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $training = new Training();

        if(isset($_POST['remove']) && $_POST['remove'] === 'true'){
            $training->delete($_POST['workout_id'],'workout_id');
        }

        $data['workouts'] = $training->findAllPrivateWithJoins($_SESSION['userId']);


        $this->view('MyWorkouts', $data);

    }

}