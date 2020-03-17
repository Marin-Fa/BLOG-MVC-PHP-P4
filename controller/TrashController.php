<?php

// if (!empty(trim($_POST["username"])) && !empty(trim($_POST["password"])) && !empty(trim($_POST["confirm_password"]))) {
//     $registerManager = new RegisterManager();
//     $userInserted = $registerManager->pushUserInfo($username, $password);
//     $this->msg = "Successful Registration";
//     require 'view/loginView.php';
// } else {
//     if (($username->rowCount() == 1) && strlen(trim($_POST["password"])) < 6 && trim($_POST["confirm_password"])) {
//         $username_err = "This username is already taken.";
//         $password_err = "Password must have atleast 6 characters.";
//         if (empty($password_err) && ($password != $confirm_password)) {
//             $confirm_password_err = "Password did not match.";
//         }
//     } else {
//         $username_err = "Please enter a username.";
//         $password_err = "Please enter a password.";
//         $confirm_password_err = "Please confirm password.";
//     }
// }


if (($user = $registerManager->matchUser($this->username) == 1) && strlen(trim($_POST["password"])) < 6 && trim($_POST["confirm_password"])) {
    $this->username_err = "This username is already taken.";
    $this->password_err = "Password must have atleast 6 characters.";
} else {
    echo '404';
}


public
function welcome($username, $password)
{
    if (isset($_POST['submit'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $this->userManager->getRole($username, $password);
            var_dump($user);
            if (!$this->userManager->getAuth($username, $password)) {
                $this->msg = 'Something went wrong';
                require 'view/loginView.php';
            } else {
                $hashChecked = password_verify($_POST['password'], $user['password']);
                if ($hashChecked) {
                    if ($user['role'] === 'admin') {
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
                    }
                } else {
                    $this->msg = 'please fill in the form';
                }
            }
            require 'view/loginView.php';
        } else {
            require 'view/loginView.php';
        }
    }
}

public
function welcome($username, $password)
{
    if (isset($_POST['submit'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $this->userManager->getRole($username, $password);
//                var_dump($user);
            if (!$this->userManager->getAuth($username, $password)) {
                $this->msg = 'Something went wrong';
                require 'view/loginView.php';
            } elseif ($user['role'] === 'admin') {
                $this->role = 'admin';
                $this->msg = 'Hello Admin';
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin';
//                    header('Location: index.php?action=showAdminPanel');
                require 'view/adminLoginView.php';
            } else {
                $posts = $this->postManager->getPosts();
                $this->role = 'user';
                $this->msg = "Welcome";
                $_SESSION['username'] = $username;
                $this->p = $username;
                $_SESSION['role'] = 'user';
                $this->username = $username;
                $this->password = $password;
//                    header('Location: index.php?action=loginListPosts');
                require 'view/listPostsView.php';
            }
        }
        require 'view/listPostsView.php';
    }
    require 'view/loginView.php';

}

$pwdChecked = password_verify($_POST['password'], $password);

public
function welcome($username, $password)
{
    if (isset($_POST['submit'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            if (!$this->userManager->getAuth($username, $password)) {
                $this->msg = 'Something went wrong';
                require 'view/loginView.php';
                // This works
            }
            $user = $this->userManager->getRole($username, $password);
            if (!$this->userManager->getAuth($username, $password)) {
                $this->msg = 'Something went wrong';
                require 'view/loginView.php';
            } elseif ($user['role'] === 'admin') {
                $this->role = 'admin';
                $this->msg = 'Hello Admin';
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin';
                header('Location: index.php?action=showAdminPanel');
            } else {
                $posts = $this->postManager->getPosts();
                $this->role = 'user';
                $this->msg = "Welcome";
                $_SESSION['username'] = $username;
                $this->p = $username;
                $_SESSION['role'] = 'user';
                $this->username = $username;
                $this->password = $password;
                header('Location: index.php?action=loginListPosts');
            }
        }
    }
}


