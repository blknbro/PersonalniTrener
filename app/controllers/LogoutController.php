
<?php

class LogoutController extends Controller
{
    public function index()
    {
        if(!empty($_SESSION["email"]))
            unset($_SESSION['email']);
        if(!empty($_SESSION["userId"]))
            unset($_SESSION['userId']);
        if(!empty($_SESSION["type"]))
            unset($_SESSION['type']);
        redirect("home");
    }

}
