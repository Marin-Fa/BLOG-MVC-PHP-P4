<?php

namespace Blog\controller;

use Blog\model\RegisterManager;

class RegisterController
{
    public $msg = "";
    public $p = "";
    public $username =  "";
    public $password = "";
    public $confirm_password = "";
    public $username_err  =  "";
    public $password_err = "";
    public $confirm_password_err = "";
    public $a = "";

    public function showRegisterPage()
    {
        $this->msg = "Register";
        require 'view/registerView.php';
    }
    public function addNewUser($username, $password)
    {
        $registerManager = new RegisterManager();
        if (empty(trim($_POST["username"])) || empty(trim($_POST["password"])) || empty(trim($_POST["confirm_password"]))) {
            $this->msg = "...Login";
            // echo 'nope';
            $this->username_err = "Please enter a username.";
            $this->password_err = "Please enter a password.";
            $this->confirm_password_err = "Please confirm password.";
            $this->msg = "Register";
            require 'view/registerView.php';
            return;
        } else {
            if (($user = $registerManager->matchUser($this->username) == 1) && strlen(trim($_POST["password"])) < 6 && trim($_POST["confirm_password"])) {
                $this->username_err = "This username is already taken.";
                $this->password_err = "Password must have atleast 6 characters.";
                if (empty($this->password_err) && ($this->password != $this->confirm_password)) {
                    $this->confirm_password_err = "Password did not match.";
                }
            } else {
                $userInserted = $registerManager->pushUserInfo($username, $password);
                $this->msg = "Successful Registration";
                require 'view/loginView.php';
            }
        }
    }
    public function showLoginPage()
    {
        $this->msg = "...Login";
        require 'view/loginView.php';
    }
    public function login($username, $password)
    {
        var_dump('test');
        $registerManager = new RegisterManager();
        $userSelected = $registerManager->getUserForLogin($username, $password);
        $this->msg = "...Login";

        require 'view/loginView.php';
    }
    public function welcome($username)
    {
        $registerManager = new RegisterManager();
        $userLogedIn = $registerManager->getUser($username);
        $this->msg = "Welcome";
        $this->p = $username;
        $_SESSION['username'] = $username;
        $this->username = $username;

        require 'view/welcomeView.php';
    }
    public function logOut()
    {
        $this->msg = "See Ya";
        unset($_SESSION['username']);
        // Unset all of the session variables
        $_SESSION = array();
        // Destroy the session.
        session_destroy();
        // Redirect to login page
        require 'view/logedOutView.php';
        exit;
    }
}
