<?php

class AdminController extends Controller
{

    public function index()
    {
        if($_SESSION['type'] !== 'admin')
            redirect('home');

        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];


        $categories = new Category();
        $exercises = new Exercise();
        $users = new User();


        if(isset($_POST['removeCategory']) && $_POST['removeCategory'] === 'true'){
            $categories->delete($_POST['category_id'],'category_id');
        }

        if(isset($_POST['removeExercise']) && $_POST['removeExercise'] === 'true'){
            $exercises->delete($_POST['exercise_id'],'exercise_id');
        }


        if(isset($_POST['approve']) && $_POST['approve'] === 'yes'){
            $users->update($_POST['userId'],['permission' => 'approved']);
        }

        if(isset($_POST['block']) && $_POST['block'] === 'yes'){
            $users->update($_POST['userId'],['permission' => 'blocked']);
        }

        if(isset($_POST['none']) && $_POST['none'] === 'yes'){
            $users->update($_POST['userId'],['permission' => 'none']);
        }

        $data['categories'] = $categories->findAll();
        $data['exercises'] = $exercises->findAll();
        $data['users'] = $users->findAllNonAdmin();


        $this->view('AdminDashboard',$data);

    }

}