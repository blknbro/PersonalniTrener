<?php

class TrainingsController extends Controller
{
    public function index()
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $this->view('Trainings',$data);

    }

}