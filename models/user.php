<?php
require_once 'config/db.conf.php';
class User
{
    function checkUsername($username): bool
    {
        $sth = db::get()->prepare("SELECT username FROM users WHERE username=:username");
        $sth->bindParam(':username', $username, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetchColumn();
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    function newUser($username, $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sth = db::get()->prepare("INSERT INTO users (username, password) VALUE (:username, :password)");
        $sth->bindParam(':username', $username, PDO::PARAM_STR);
        $sth->bindParam(':password', $password_hash, PDO::PARAM_STR);
        $sth->execute();
        header("location: /forum/index.php/login");
    }

    function checkUsernameLogin($username)
    {
        $sth = db::get()->prepare("SELECT * FROM users WHERE username=:username");
        $sth->bindParam(':username', $username, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if (empty($result)) {
            return 0;
        } else {
            return $result;
        }
    }
}