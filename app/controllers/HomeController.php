
<?php

class HomeController extends Controller
{
    public function index()
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];
        $data['id'] = empty($_SESSION['userId']) ? "" : $_SESSION['userId'];

        $this->view('Home',$data);
    }

}
