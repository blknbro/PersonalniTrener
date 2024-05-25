<?php


class User extends Model
{


    protected $table = 'users';
    public $errors = [];

    protected $allowedColumns =[
        'email',
        'passwd',
        'type'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['email'])){
            $this->errors['email'] = "Email is required.";
        }
        else
            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Email is not valid";
        }

        if(empty($data['passwd'])){
            $this->errors['passwd'] = "Password is required.";
        }

        if(empty($this->errors)){
            return true;
        }
        return false;

    }

}