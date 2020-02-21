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
        if ($_POST['admin_name'] === $name || $_POST['password'] === $password) {
            $adminManager = new AdminManager();
            if (!$adminManager->getAuth($name, $password)) {
                echo 'nope';
                $this->msg = 'Invalid';
                require 'view/adminLoginView.php';
                return;
            } else {
                var_dump($name, $password);
                echo 'coucou';
                $this->msg = 'Admin';
                require 'view/adminView.php';
                return;
            }
        } else {
            echo 'coucou';
            $this->msg = 'Admin';
            require 'view/adminView.php';
        }
    }
}
