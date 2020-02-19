<?php

namespace Blog\controller;

use Blog\model\AdminManager;

class AdminController
{
    public $msg = "";

    public function showLoginAdminPanel()
    {
        $this->msg = 'Login Admin';
        require 'view/adminLoginView.php';
    }

    public function showAdminPanel($name, $password)
    {
        if ($_POST['name'] === $name || $_POST['password'] === $password) {
            $adminManager = new AdminManager();
            $adminManager->getAuth($name, $password);
            // var_dump($name, $password);
            $this->msg = 'Admin';
        } else {
            echo 'nope';
            $this->msg = 'Invalid';
            return;
        }

        require 'view/adminView.php';
    }
}
