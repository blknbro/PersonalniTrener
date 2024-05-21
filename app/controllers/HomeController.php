
<?php

class HomeController extends Controller
{
    public function index()
    {
        $animal = new Animal();

        print_r($animal->where(["id"=>3]));

        $this->view('home');
    }
}
