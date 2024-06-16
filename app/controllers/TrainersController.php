
<?php

class TrainersController extends Controller
{
    public function index(): void
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];

        $user = new User();

        $data['info'] = $user->where(['type' => 'trainer']);


        $this->view('Trainers',$data);

    }


}
