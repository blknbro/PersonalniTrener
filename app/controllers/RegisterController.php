
<?php

class RegisterController extends Controller
{
    public function index()
    {
        $user = new User();
        $_POST['type'] = empty($_POST['type']) ? "user" : "trainer";
        if($user->validate($_POST)){
            $_POST['passwd'] = password_hash($_POST['passwd'],PASSWORD_DEFAULT);
            $user->insert($_POST);
            redirect("Home");
        }

        $data['err'] = $user->errors;
        $this->view("Register",$data);
    }
}
