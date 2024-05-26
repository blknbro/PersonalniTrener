
<?php

class _404Controller extends Controller
{
    public function index()
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $this->view('404',$data);
    }
}
