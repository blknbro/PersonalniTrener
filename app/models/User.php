<?php


class User extends Model
{


    protected $table = 'users';
    public $errors = [];

    protected $allowedColumns =[
        'email',
        'passwd',
        'name',
        'surname',
        'phone',
        'type',
        'token',
        'token_expire',
        'active',
        'tokenR',
        'tokenRExpire',
        'bio',
        'permission',
    ];

    /**Validate register data
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        $this->errors = [];

        $email = $data['email'];
        $passwd = $data['passwd'];
        $passwdR = $data['passwdR'];
        $name = $data['name'];
        $surname =  $data['surname'];
        $phone = $data['phone'];


        if(empty($email)){
            $this->errors['email'] = "Email is required.";
        }
        else
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Email is not valid.";
        }

        if(empty($passwd)){
            $this->errors['passwd'] = "Password is required.";
        }elseif ($passwd !== $passwdR)
            $this->errors['passwd'] = "Password reapeat does not match.";

        if(empty(trim($name))){
            $this->errors['name'] = "Name is required.";
        }
        if(empty(trim($surname))){
            $this->errors['surname'] = "Surname is required.";
        }
        if(empty(trim($phone))){
            $this->errors['phone'] = "Phone is required.";
        }

        if(empty($this->errors)){
            return true;
        }
        return false;

    }

    /**
     * @param array $data
     * @return bool
     */
    public function validateLogin(array $data): bool
    {
        $this->errors = [];

        if(empty($data['email'])){
            $this->errors['email'] = "Email is required.";
        }
        else
            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                $this->errors['email'] = "Email is not valid.";
            }

        if(empty($data['passwd'])){
            $this->errors['passwd'] = "Password is required.";
        }

        if(empty($this->errors)){
            return true;
        }
        return false;

    }
    public function validateReset(array $data): bool
    {
        $this->errors = [];

        $passwdR = trim($data['passwdR']);
        $passwdRConfirm = trim($data['passwdRConfirm']);

        if(empty($passwdR) || (strlen($passwdR) < 8)){
            $this->errors['passwd'] = "Proper password is required.(min. 8 characters length)";
        }else
        if(empty($passwdRConfirm) || (strlen($passwdRConfirm) < 8)){
            $this->errors['passwd'] = "Proper password repeat is required. (min. 8 characters length)";
        }else
        if($passwdR !== $passwdRConfirm){
            $this->errors['passwd'] = "Password doesn't match.";
        }


        if(empty($this->errors)){
            return true;
        }
        return false;

    }

}