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
        var_dump($name, $password);
        $adminManager = new AdminManager();
        if (!$adminManager->getAuth($name, $password)) {
            echo 'nope';
            $this->msg = 'Invalid';
            require 'view/adminLoginView.php';
        } else {
            var_dump($name, $password);
            echo 'coucou';
            $this->msg = 'Admin';
            require 'view/adminView.php';
        }
    }
}
