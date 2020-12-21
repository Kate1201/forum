<?php
require_once 'vendor/autoload.php';

use Valitron\Validator;
Validator::langDir('lang');
Validator::lang('ru');
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

    public function validateChangeStore($address, $phone, $description, $openingHours, $lift_loc)
    {
        $data = [
            'address' => $address,
            'phone' => $phone,
            'description' => $description,
            'openingHours' => $openingHours,
            'lift_location' => $lift_loc,
        ];

        $validator = new Validator($data);

        $validator->rule('required', 'address') ;
        $validator->rule('regex', 'phone', '/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/');
        $validator->rule('required', 'description');
        $validator->rule('regex', 'openingHours', '(^([0-1][0-9]|[2][0-3]):([0-5][0-9])-([0-1][0-9]|[2][0-3]):([0-5][0-9])$)');
        $validator->rule('required', 'lift_location');
        $validator->validate();

        return $validator->errors();
    }

    public function validateCreateStore($address, $phone, $description, $openingHours, $lift_loc)
    {
        $data = [
            'address' => $address,
            'phone' => $phone,
            'description' => $description,
            'openingHours' => $openingHours,
            'lift_location' => $lift_loc,
        ];
        $validator = new Validator($data);

        $validator->rule('required', 'address') ;
        $validator->rule('regex', 'phone', '/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/');
        $validator->rule('required', 'description');
        $validator->rule('regex', 'openingHours', '(^([0-1][0-9]|[2][0-3]):([0-5][0-9])-([0-1][0-9]|[2][0-3]):([0-5][0-9])$)');
        $validator->rule('required', 'lift_location');
        $validator->validate();

        return $validator->errors();
    }
}
