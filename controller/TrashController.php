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
