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
    public $id = "";

    public function showRegisterPage()
    {
        $this->msg = "Register";
        require 'view/registerView.php';
    }
    public function addNewUser($username, $password)
    {
        $user = $_POST['username'];
        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $registerManager = new RegisterManager();
            if (empty(trim($_POST["username"])) || empty(trim($_POST["password"])) || empty(trim($_POST["confirm_password"]))) {
                // echo 'nope';
                $this->username_err = "Please enter a username.";
                $this->password_err = "Please enter a password.";
                $this->confirm_password_err = "Please confirm password.";
                $this->msg = "Register";
                require 'view/registerView.php';
                return;
            }
            if ($user = $registerManager->matchUser($this->username) == true) {
                $this->msg = "Register";
                $this->username_err = "This username is already taken.";
                require 'view/registerView.php';
                return;
            }
            if (strlen(trim($_POST["password"])) < 6 && trim($_POST["confirm_password"]) < 6) {
                $this->msg = "Register";
                $this->password_err = "Password must have atleast 6 characters.";
                require 'view/registerView.php';
                return;
            }
            if (($_POST["password"] != $_POST["confirm_password"])) {
                $this->confirm_password_err = "Password did not match.";
                $this->msg = "Register";
                require 'view/registerView.php';
                return;
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
        // Store data in session variables
        // $_SESSION["loggedin"] = true;
        // $_SESSION["id"] = $id;
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
