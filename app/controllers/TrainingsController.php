<?php

class TrainingsController extends Controller
{
    public function index()
    {
//        if(!isset($_SESSION['type']))
//            redirect('home');
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $training = new Training();
        $data['info'] = $training->findAllWithJoins();


        $this->view('Trainings',$data);

    }

    public function workout()
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $workout = new Training();
        $data['workout'] = $workout->findWhereIdWithJoinsDetailed($_GET['id']);


        $this->view('Workout',$data);

    }

    public function make()
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];


        $this->view('MakeWorkout',$data);

    }

}