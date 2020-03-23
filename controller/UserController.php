<?php

namespace Blog\controller;

use Blog\model\{
    CommentManager,
    PostManager,
    UserManager,
    User
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
    private $user;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
        $this->user = new User();
    }

    public function showAdminPanel()
    {
        $this->msg = 'Hello Admin';
        $comments = $this->commentManager->getNbCommentAdmin();

        require 'view/adminView.php';
    }

    public function showAdminCommentsView()
    {
        $this->msg = 'Manage Reported Comments';
        $comments = $this->commentManager->getAdminComments();

        require 'view/adminCommentsView.php';
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
        if (isset($_POST['submit'])) {
            $user = $this->userManager->getAuth($_POST['username']);
            if (empty(trim($_POST["username"]))) {
                $this->username_err = "Please enter a username.";
                $this->msg = "Register";
                require 'view/registerView.php';
                return;
            }
            if (empty(trim($_POST["password"])) || empty(trim($_POST["confirm_password"]))) {
                $this->password_err = "Please enter a password.";
                $this->confirm_password_err = "Please confirm password.";
                $this->msg = "Register";
                require 'view/registerView.php';
                return;
            }
            if ($user) {
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
                $hash_pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $this->user->setUsername($_POST['username']);
                $this->user->setPassword($hash_pwd);
                $this->userManager->addUser($this->user);

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
        if (isset($_POST['submit'])) {
            $user = $this->userManager->getAuth($username);
            $pwdChecked = password_verify($_POST['password'], $user['password']);
            if (empty(trim($_POST["username"]))) {
                $this->username_err = "Please enter a username.";
                $this->msg = "Login...";
                require 'view/loginView.php';
                return;
            }
            if (empty(trim($_POST["password"]))) {
                $this->password_err = "Please enter a password.";
                $this->msg = "Login...";
                require 'view/loginView.php';
                return;
            }
            if (!$user) {
                $this->msg = 'Something went wrong';
                require 'view/loginView.php';
            }
            if (!$pwdChecked) {
                $this->password_err = "Password did not match.";
                $this->msg = "Login...";
                require 'view/loginView.php';
                return;
            } else {
                $_SESSION['user_id'] = $user['id'];
                if ($user['role'] === 'admin') {
                    var_dump($user['role']);
                    $this->role = 'admin';
                    $this->msg = 'Hello Admin';
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = 'admin';
                    header('Location: index.php?action=showAdminPanel');
                } elseif ($user['role'] === 'user') {
                    $posts = $this->postManager->getPosts();
                    $this->role = 'user';
                    $this->msg = "Welcome";
                    $_SESSION['username'] = $username;
                    $this->p = $username;
                    $_SESSION['role'] = 'user';
                    $this->username = $username;
                    $this->password = $password;
                    header('Location: index.php?action=loginListPosts');
                } else {
                    $this->msg = 'Login...';
                    $this->p = 'Please fill in the form';
                }

                require 'view/loginView.php';
            }
        }
    }

    public
    function logOut()
    {
        $posts = $this->postManager->getPosts();
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
