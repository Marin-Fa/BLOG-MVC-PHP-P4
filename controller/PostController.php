<?php

namespace Blog\controller;

use Blog\model\PostManager;
use Blog\model\CommentManager;

// require_once 'model/RegisterManager.php';

class PostController
{
    public $msg = "";
    public $p = "";
    // public $username = "";

    // public function getUsername()
    // {
    //     $registerManager = new RegisterManager();
    //     $username = $registerManager->getUser($_GET['username']);
    //     var_dump($username);
    //     var_dump('test');
    //     $this->username = $username;

    //     require 'view/listPostsView.php';
    // }
    public function listPosts()
    {
        $postManager = new PostManager(); // Creation obj 
        $posts = $postManager->getPosts(); // Call the function
        $this->msg = "Jean Forteroche";
        $this->p = "Far far away, behind the mountains, far from the industrial wolrd, lives the peacefull place in the world.";


        require 'view/listPostsView.php';
    }
    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require 'view/postView.php';
    }
}
