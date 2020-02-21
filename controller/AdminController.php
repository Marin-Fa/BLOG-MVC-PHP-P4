<?php

namespace Blog\controller;

use Blog\model\{
    AdminManager,
    PostManager,
    CommentManager
};

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
        $adminManager = new AdminManager();
        if (!$adminManager->getAuth($name, $password)) {
            $this->msg = 'Invalid';
            require 'view/adminLoginView.php';
        } else {
            $this->msg = 'Admin';
            $postsList = new PostManager();
            $posts = $postsList->getPosts();
            $commentList = new CommentManager();
            $comments = $commentList->getCommentsAdmin();
            require 'view/adminView.php';
        }
    }
    public function dashboardPost()
    {
        $postsList = new PostManager();
        $posts = $postsList->getPosts();
        var_dump($posts);
        require 'view/adminView.php';
    }
}
