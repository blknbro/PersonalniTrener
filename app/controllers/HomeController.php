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
            if (isset($_POST['reset'])) {
                $currentP = test_input($_POST['passwdCurrent']);
                $newP = test_input($_POST['passwdNew']);
                $newPRepeat = test_input($_POST['passwdNewR']);
                $user = new User();
                $passwdData = $user->where(['email' => $_SESSION['email']])[0]['passwd'];
                if (!empty($currentP) || !empty($newP) || !empty($newPRepeat)) {
                    if ($newP === $newPRepeat) {
                        if (strlen($newP) >= 8) {
                            if (password_verify($currentP, $passwdData)) {
                                $newPHash = password_hash($newP,PASSWORD_DEFAULT);
                                $user->update($_SESSION['email'],['passwd' => $newPHash], 'email');
                                redirect('/home/profile?id=' . $_SESSION['email'] . "&s=3");
                            } else {
                                $user->errors['passwd'] = 'Current password wrong.';
                            }
                        } else {
                            $user->errors['passwd'] = 'New password must be 8 characters or more.';
                        }
                    } else {
                        $user->errors['passwd'] = 'New password and new password repeat dont match.';
                    }
                }else{
                    $user->errors['passwd'] = 'Please fill out all fields.';
                }
                $data['err'] = $user->errors;

            } else {
                $updatedValue = [
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'phone' => $_POST['phone'],
                    'bio' => $_POST['bio'],
                ];

                $originalValues = [
                    'name' => $data['info'][0]['name'],
                    'surname' => $data['info'][0]['surname'],
                    'phone' => $data['info'][0]['phone'],
                    'bio' => $data['info'][0]['bio'],
                ];
                $changes = [];
                foreach ($originalValues as $key => $oldValue) {
                    if ($oldValue !== $updatedValue[$key]) {
                        $changes[$key] = $updatedValue[$key];
                    }
                }

                if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['profileImage']['tmp_name'];
                    $fileName = $_FILES['profileImage']['name'];
                    $fileSize = $_FILES['profileImage']['size'];
                    $fileType = $_FILES['profileImage']['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));

                    $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
                    if (in_array($fileExtension, $allowedfileExtensions)) {
                        $uploadFileDir = '/assets/images/Profile/';
                        $dest_path = '../public' . $uploadFileDir . $fileName;


                        if(move_uploaded_file($fileTmpPath, $dest_path)) {
                            $data['err']['file'] ='File is successfully uploaded.';
                            $user->update($_SESSION['email'],['profile_image' => $fileName],'email');
                            redirect('/home/profile?id=' . $_SESSION['email'] . "&s=2");
                        } else {
                            $data['err']['file'] = 'There was some error moving the file to upload directory.';
                        }
                    } else {
                        $data['err']['file'] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                    }
                }


                if (!empty($changes)) {
                    $user->update($_SESSION['email'], $changes, 'email');
                    redirect('/home/profile?id=' . $_SESSION['email'] . "&s=1");
                }


                redirect('/home/profile?id=' . $_SESSION['email'] . "&s=1");

            }
        }

        $data['info'] = $user->where(['email' => $_GET['id']]);

        if (empty($_GET['id']) || $_GET['id'] !== $data['info'][0]['email']) redirect("404");

        $this->view('Profile', $data);
    }

}
