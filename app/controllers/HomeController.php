<?php

class HomeController extends Controller
{
    public function index()
    {
        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];
        $data['id'] = empty($_SESSION['userId']) ? "" : $_SESSION['userId'];

        $this->view('Home', $data);
    }

    public function profile(): void
    {
        $user = new User();

        $data['username'] = empty($_SESSION['email']) ? "Guest" : $_SESSION["email"];
        $data['info'] = $user->where(['email' => $_GET['id']]);

        if (!empty($_POST)) {
            $updatedValue = [
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'bio' => $_POST['bio'],
            ];

            $originalValues = [
                'name' => $data['info'][0]['name'],
                'surname' => $data['info'][0]['surname'],
                'email' => $data['info'][0]['email'],
                'phone' => $data['info'][0]['phone'],
                'bio' => $data['info'][0]['bio'],
            ];
            $changes = [];
            foreach ($originalValues as $key => $oldValue) {
                if ($oldValue !== $updatedValue[$key]) {
                    $changes[$key] = $updatedValue[$key];
                }
            }


            if(!empty($changes) && !empty($changes['bio'])){
                $user->update($_SESSION['email'], $changes, 'email');
            }


            redirect('/home/profile?id=' . $_SESSION['email']);

        }

        $data['info'] = $user->where(['email' => $_GET['id']]);

        if (empty($_GET['id']) || $_GET['id'] !== $data['info'][0]['email']) redirect("404");

        $this->view('Profile', $data);
    }

}
