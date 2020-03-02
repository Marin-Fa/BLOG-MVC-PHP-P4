<?php

namespace Blog\controller;

use Blog\model\{
    CommentManager,
    PostManager,
    UserManager
};

class UserController
{
    public $msg = "";
    public $p = "";
    public $username = "";
    public $password = "";
    public $role = "";
    public $confirm_password = "";
    public $username_err = "";
    public $password_err = "";
    public $confirm_password_err = "";
    public $id = "";
    private $userManager;
    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function showLoginAdminPanel()
    {
        $this->msg = 'Login Admin';
        require 'view/adminLoginView.php';
    }

    public function showAdminPanel()
    {
        $this->msg = 'Hello Admin';
        $postsList = new PostManager();
        $posts = $postsList->getPosts();
        $commentList = new CommentManager();
        $comments = $commentList->getCommentsAdmin();
        require 'view/adminView.php';

    }

    public function showRegisterPage()
    {
        $this->msg = "Register";
        require 'view/registerView.php';
    }

    public function addNewUser($username, $password)
    {
        $this->username = $username;
        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $this->userManager->getAuth($_POST['username'], $_POST['password']);
            if (empty(trim($_POST["username"])) || empty(trim($_POST["password"])) || empty(trim($_POST["confirm_password"]))) {
                $this->username_err = "Please enter a username.";
                $this->password_err = "Please enter a password.";
                $this->confirm_password_err = "Please confirm password.";
                $this->msg = "Register";
                require 'view/registerView.php';
                return;
            }
            if ($user) {
                var_dump($user);
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
                $this->userManager->pushUserInfo($username, $password);
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

    public function welcome($username, $password)
    {
        $commentManager = new CommentManager();
        $postManager = new PostManager();
        $userManager = new UserManager();

        $user = $userManager->getRole($username, $password);
        if (!$userManager->getAuth($username, $password)) {
            $this->msg = 'Something went wrong';
            require 'view/loginView.php';
        } elseif ($user['role'] === 'admin') {
            $this->role = 'admin';
            $this->msg = 'Hello Admin';
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            $posts = $postManager->getPosts();
            $comments = $commentManager->getNbComment();
            require 'view/adminView.php';
        } else {
            $posts = $postManager->getPosts();
            $this->role = 'user';
            $this->msg = "Welcome";
            $this->p = $username;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';
            $this->username = $username;
            $this->password = $password;
            header('Location: index.php');
        }
    }

    public function logOut()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        $this->msg = "See Ya";
        unset($_SESSION['username']);
        // Unset all of the session variables
        $_SESSION = array();
        // Destroy the session.
        session_destroy();
        // Redirect to login page
        require 'view/listPostsView.php';
        exit;
    }
}
