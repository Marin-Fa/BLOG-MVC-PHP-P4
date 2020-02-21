<?php

namespace Blog\controller;

use Blog\model\{
    PostManager,
    CommentManager
};

class PostController
{
    public $msg = "";
    public $p = "";


    // Display all posts
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        $this->msg = "Jean Forteroche";
        $this->p = "Far far away, behind the mountains, far from the industrial wolrd, lives the peacefull place in the world.";

        require 'view/listPostsView.php';
    }
    // Display one posts with it's comments
    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }

        require 'view/postView.php';
    }
    // Delete a post
    public function deletePost()
    {
        if (htmlentities(isset($_GET['id']))) {
            $postManager = new PostManager();
            $postManager->deletePost($_GET['id']);
            echo json_encode('success');
        }
    }
}
