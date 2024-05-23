
<?php

class HomeController extends Controller
{
    public function index()
    {

        $animals = new Animal();




        $this->view('home');
    }

}
