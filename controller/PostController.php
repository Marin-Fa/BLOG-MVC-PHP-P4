<?php

namespace Blog\controller;

use Blog\model\{PostManager, Post, CommentManager, UserManager};

class PostController
{
    public $msg = "";
    public $p = "";
    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }


    // Display all posts
    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();
        $this->msg = "Jean Forteroche";
        $this->p = "Far far away, behind the mountains, far from the industrial world, lives the peacefull place in the world.";

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
            $nbComments = $commentManager->getNbComments($_GET['id']);
//            var_dump($nbComments);
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }

        require 'view/postView.php';
    }

    public function createPostView()
    {
        $this->msg = 'Create a Post';
        require 'view/createPostView.php';
    }

    public function modifyPostView()
    {
        $this->msg = 'Modify a Post';
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        require 'view/modifyPostView.php';
    }

    public function sendPost()
    {
        if (!empty($_POST['title']) && !empty($_POST['content']) && strlen(trim($_POST['title']))) {
            $newPost = new Post([
                'title' => $_POST['title'],
                'content' => $_POST['content']]);
            var_dump($newPost);
            $postManager = new PostManager();
            $create = $postManager->createPost($newPost);
            var_dump($create);
            if ($postManager === false) {
                $this->msg = 'Cannot add post';
                require 'view/createPostView.php';
            } else {
                $this->msg = 'Post added !';
                require 'view/adminView.php';
            }
        }
    }

    // Delete a post
    public function deletePost()
    {
        if (htmlentities(isset($_GET['id']))) {
            $postManager = new PostManager();
            $posts = $postManager->getPosts();
            $postManager->deletePost($_GET['id']);
            $this->msg = 'Post has been deleted';
            require 'view/adminView.php';
        }
    }

    // Update post
    public function modifyPost()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {

            $postManager = new PostManager();
            $post = $postManager->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
            $this->msg = 'Update post';
            $comments = $this->commentManager->getNbCommentAdmin();
            require 'view/adminView.php';
        } else {
            $this->msg = 'Something went wrong';
            require 'view/modifyPostView.php';
        }
    }

    public function errorView()
    {
        $this->msg = 'Error';
        require 'view/errorView.php';
    }

}
