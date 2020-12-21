<?php
require_once 'vendor/autoload.php';

use Valitron\Validator;


class FormValidator
{
    public function validateRegister($username, $password, $confirm_password)
    {
        $data = [
            'username' => $username,
            'password' => $password,
            'confirm_password' => $confirm_password,
        ];
        $validator = new Validator($data);
        $validator->rule('required', 'username');
        $validator->rule('required', 'password');
        $validator->rule('different', 'password', 'username');
        $validator->rule('lengthBetween', 'password', 8, 64);
        $validator->rule('equals', 'confirm_password', 'password');
        $validator->validate();
        return $validator->errors();
    }

    public function validateLogin($username, $password)
    {

        $data = [
            'username' => $username,
            'password' => $password
        ];
        $validator = new Validator($data);
        $validator->rule('required', 'username');
        $validator->rule('required', 'password');
        $validator->rule('lengthBetween', 'password', 8, 64);
        $validator->validate();
        return $validator->errors();

    }

   }
