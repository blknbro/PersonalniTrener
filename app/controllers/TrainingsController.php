<?php

class TrainingsController extends Controller
{
    public function index(): void
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

    public function workout(): void
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $workout = new Training();
        $data['workout'] = $workout->findWhereIdWithJoinsDetailed($_GET['id']);


        $this->view('Workout', $data);

    }

    public function make(): void
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


    public function my(): void
    {
        if (!isset($_SESSION['type']))
            redirect('home');
        elseif ($_SESSION['type'] === 'admin')
            redirect('home');
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $training = new Training();

        if (isset($_POST['remove']) && $_POST['remove'] === 'true') {
            $training->delete($_POST['workout_id'], 'workout_id');
        }

        $data['workouts'] = $training->findAllPrivateWithJoins($_SESSION['userId']);


        $this->view('MyWorkouts', $data);

    }


    public function edit(): void
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $category = new Category();
        $exercises = new Exercise();
        $workout = new Training();
        $workoutExercises = new WorkoutExercises();
        $user = new User();

        if (!$workout->where(['id' => $_SESSION['userId']]))
            redirect('home');


        if (!empty($_POST)) {

            $workoutData = $workout->where(['workout_id' => $_POST['workout_id']])[0];
            $oldCategoryName = $category->where(['category_id' => $workoutData['category_id']])[0]['name'];
            $oldExercises = $workoutExercises->where(['workout_id' => $_POST['workout_id']]);


            $originalValuesWorkout = [
                'title' => $workoutData['title'],
                'description' => $workoutData['description'],
                'category_id' => $oldCategoryName,
                'duration_value' => $workoutData['duration_value'],
                'duration_unit' => $workoutData['duration_unit'],
                'privacy' => $workoutData['privacy'],
            ];

            $originalValuesWorkoutExercises = [
                'exercises' => [],
                'days_of_week' => [],
            ];

            foreach ($oldExercises as $oldExercise) {
                $originalValuesWorkoutExercises['exercises'][] = $exercises->where(['exercise_id' => $oldExercise['exercise_id']])[0]['title'];
            }

            foreach ($oldExercises as $oldExercise) {
                $originalValuesWorkoutExercises['days_of_week'][] = $oldExercise['day_of_week'];
            }


            $updatedValuesWorkout = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'category_id' => $_POST['category'],
                'duration_value' => (int)$_POST['duration_value'],
                'duration_unit' => $_POST['duration_unit'],
                'privacy' => $_POST['privacy'],
            ];

            $updatedValuesWorkoutExercises = [
                'exercises' => $_POST['exercises'],
                'days_of_week' => $_POST['days_of_week'],
            ];

            $changesWorkout = [];
            $changesWorkoutExercises = [];
            foreach ($originalValuesWorkout as $key => $oldValue) {
                if ($oldValue !== $updatedValuesWorkout[$key]) {
                    $changesWorkout[$key] = $updatedValuesWorkout[$key];
                }
            }
            foreach ($originalValuesWorkoutExercises as $key => $oldValue) {
                if ($oldValue !== $updatedValuesWorkoutExercises[$key]) {
                    $changesWorkoutExercises[$key] = $updatedValuesWorkoutExercises[$key];
                }
            }





            if (!empty($changesWorkout)) {
                $categoryId = $category->where(['name' => $updatedValuesWorkout['category_id']])[0]['category_id'];
                $changesWorkout['category_id'] = $categoryId;
                $workout->update($_POST['workout_id'],$changesWorkout,'workout_id');
            }

            if(!empty($changesWorkoutExercises)){
                $workoutExercises->delete($_POST['workout_id'],'workout_id');
                foreach ($_POST['exercises'] as $index => $exerciseTitle) {
                    $dayOfWeek = $_POST['days_of_week'][$index];
                    $exerciseId = $exercises->where(['title' => $exerciseTitle])[0]['exercise_id'];
                    $workoutExercises->insert(['workout_id' => $_POST['workout_id'], 'exercise_id' => $exerciseId, 'day_of_week' => $dayOfWeek]);
                }
            }

            $data['succ'] = 'success';

        }
        $data['workout'] = $workout->where(['workout_id' => $_GET['id']]);
        $data['exercises'] = $exercises->findAll();
        $data['categories'] = $category->findAll();
        $data['workoutExercises'] = $workoutExercises->where(['workout_id' => $_GET['id']]);


        $this->view('EditWorkout', $data);


    }

}