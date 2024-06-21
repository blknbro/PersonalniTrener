<?php

class LoginController extends Controller
{
    public function index()
    {

        $data = [];

        if (isset($_SESSION['email']))
            redirect("Home");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = new User();
            if ($user->validateLogin($_POST)) {
                $arr['email'] = $_POST['email'];
                $row = $user->where($arr);
                if ($row) {
                    if ($row[0]['active'] === 1) {
                        if (password_verify($_POST['passwd'], $row[0]['passwd'])) {
                            if ($row[0]['permission'] !== 'blocked') {
                                $_SESSION['email'] = $row[0]['email'];
                                $_SESSION['userId'] = $row[0]['id'];
                                $_SESSION['type'] = $row[0]['type'];
                                $_SESSION['name'] = $row[0]['name'];
                                $_SESSION['permission'] = $row[0]['permission'];
                                redirect("Home");
                            }else{
                                $user->errors['permission'] = "Blocked by admin.";
                            }
                        } else
                            $user->errors['passwd'] = "Wrong password.";
                    } else {
                        $user->errors['email'] = "Email is not activated.";
                    }
                } else {
                    $user->errors['email'] = "Email is not found.";
                }
            }
            $data['err'] = $user->errors;
        }
        $this->view("Login", $data);
    }
}
