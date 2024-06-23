
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
        if(!empty($_SESSION["name"]))
            unset($_SESSION['name']);
        if(!empty($_SESSION["permission"]))
            unset($_SESSION['permission']);
        redirect("home");
    }

}
