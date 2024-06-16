<?php

class TrainingsController extends Controller
{
    public function index()
    {
//        if(!isset($_SESSION['type']))
//            redirect('home');
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $this->view('Trainings',$data);

    }

}