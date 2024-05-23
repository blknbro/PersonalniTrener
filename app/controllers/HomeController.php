
<?php

class HomeController extends Controller
{
    public function index()
    {

        $animals = new Animal();


        $animals->findAll();


        $this->view('home');
    }

}
