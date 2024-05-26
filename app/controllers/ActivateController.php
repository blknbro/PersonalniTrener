
<?php

class ActivateController extends Controller
{
    public function index()
    {
        if (isset($_GET['token'])) {
            $token = trim($_GET['token']);
        }

        if (!(empty($token) && strlen($token) === 40)) {

            $user = new User();

            $row = $user->update($token,['token' => '','active' => 1, 'token_expire'=>''],'token');

            if (!$row) {
                redirect('home');
            }
        } else {
            redirect('login');
        }
    }



}
