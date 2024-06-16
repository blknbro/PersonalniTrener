<?php

class ResetController extends Controller
{
    public function index()
    {
        $data = [];

        if (isset($_SESSION['email']))
            redirect("Home");


        if (isset($_GET['token'])) {
            $token = trim($_GET['token']);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = new User();
            if ($user->validateReset($_POST)) {
                if (!(empty($token)) && strlen($token) === 40) {
                    $user = new User();
                    $row = $user->where(['tokenR' => $token]);
                    if ($row) {
                        if($row[0]['tokenRExpire'] > now()) {
                            $password = password_hash(trim($_POST['passwdR']), PASSWORD_DEFAULT);
                            $row = $user->update($token, ['passwd' => $password, 'tokenR' => '', 'tokenRExpire' => ''], 'tokenR');

                            if (!$row) {
                                redirect('login');
                            }
                        }
                    }else{
                        $user->errors['passwd'] = "Wrong token.";
                    }
                }else{
                    $user->errors['passwd'] = "Invalid token.";
                }
            }
            $data['err'] = $user->errors;
        }
        $this->view("Reset", $data);
    }

}
