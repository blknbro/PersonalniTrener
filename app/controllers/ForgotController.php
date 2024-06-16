<?php

class ForgotController extends Controller
{
    public function index()
    {
        $data = [];
        if (isset($_SESSION['email']))
            redirect("Home");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user = new User();
            $email = trim($_POST['email']);
            $row = $user->where(['email' => $email]);
            if ($row) {
                if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    $tokenR = createToken(40);
                    $tokenRExpire = (new DateTime())->add(new DateInterval('P1D'))->format('Y-m-d H:i:s');
                    $user->update($email, ['tokenR' => $tokenR, 'tokenRExpire' => $tokenRExpire], 'email');
                    sendMail($email,'reset',substr($tokenR,0,40));
                    redirect("home");
                }else
                {
                    $user->errors['email'] = "Invalid email format";
                }
            }
            else{
                $user->errors['email'] = "Email not found.";
            }
            $data['err'] = $user->errors;

        }
        $this->view("Forgot",$data);
    }

}
