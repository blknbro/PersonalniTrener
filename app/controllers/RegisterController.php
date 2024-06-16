<?php

class RegisterController extends Controller
{
    public function index()
    {
        $data = [];

        if (isset($_SESSION['email']))
            redirect("home");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = new User();
            $arr['email'] = trim($_POST['email']);
            $_POST['passwd'] = trim($_POST['passwd']);
            $_POST['name'] = trim($_POST['name']);
            $_POST['surname'] = trim($_POST['surname']);
            $_POST['phone'] = trim($_POST['phone']);
            $_POST['token'] = createToken(40);
            $_POST['token_expire'] = (new DateTime())->add(new DateInterval('P1D'))->format('Y-m-d H:i:s');
            $row = $user->where($arr);
            if (!$row) {
                if (strlen($_POST['passwd']) >= 8) {
                    $_POST['type'] = empty($_POST['type']) ? "user" : "trainer";
                    if ($user->validate($_POST)) {
                        $_POST['passwd'] = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
                        $user->insert($_POST);
                        sendMail($_POST['email'],'activate', substr($_POST['token'],0,40));
                        redirect("login");
                    }else {
                        $user->errors['email'] = "Info not valid.";
                    }
                } else {
                    $user->errors['passwd'] = "Password too short.";
                }

            } else {
                $user->errors['email'] = "Email already in use.";
            }

            $data['err'] = $user->errors;
        }
        $this->view("Register", $data);
    }
}
