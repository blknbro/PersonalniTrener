<?php

class EditController extends Controller
{
    public function category(): void
    {
        if ($_SESSION['type'] !== 'admin') {
            redirect('home');
        }

        $category = new Category();

        $data['category'] = $category->where(['category_id' => $_GET['id']])[0];


        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newName = test_input($_POST['categoryName']);
            if (empty($newName)) {
                $category->errors['name'] = 'Please fill out all fields.';
            } else {
                $category->update($_GET['id'], ['name' => $newName], 'category_id');
                redirect('admin');
            }
        }


        $data['err'] = $category->errors;
        $this->view('EditCategory', $data);


    }

    public function exercise(): void
    {
        if ($_SESSION['type'] !== 'admin') {
            redirect('home');
        }

        $exercise = new Exercise();

        $data['exercise'] = $exercise->where(['exercise_id' => $_GET['id']])[0];


        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $newTitle = test_input($_POST['exerciseTitle']);
            $newDesc = test_input($_POST['exerciseDesc']);
            $newDuration = test_input($_POST['categoryDuration']);
            $newImageLink = test_input($_POST['pictureLink']);
            $newVideoLink = test_input($_POST['videoLink']);
            if (empty($newTitle) || empty($newDesc) || empty($newDuration) || empty($newImageLink)) {
                $exercise->errors['name'] = 'Please fill out all fields.';
            } else {
                $exercise->update($_GET['id'], ['title' => $newTitle, 'description' => $newDesc, 'duration' => $newDuration, 'image_url' => $newImageLink, 'video_url' => $newVideoLink], 'exercise_id');
                redirect('admin');
            }

        }

        $data['err'] = $exercise->errors;
        $this->view('EditExercise', $data);


    }


}