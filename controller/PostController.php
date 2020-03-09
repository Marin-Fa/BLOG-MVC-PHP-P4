<?php

namespace Blog\controller;

use Blog\model\{PostManager, Post, CommentManager, UserManager};

class PostController
{
    public $msg = "";
    public $p = "";
    private $postManager;
    private $commentManager;
    private $comment;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->post = new Post();
    }


    // Display all posts
    public function listPosts()
    {
        $posts = $this->postManager->getPosts();
        $this->msg = "Jean Forteroche";
        $this->p = "Far far away, behind the mountains, far from the industrial world, lives the peacefull place in the world.";

        require 'view/listPostsView.php';
    }

    public function loginListPosts()
    {
        $posts = $this->postManager->getPosts();
        $this->msg = 'Welcome';
        require 'view/listPostsView.php';

    }

    // Display one posts with it's comments
    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $this->postManager->getPost($_GET['id']);
            $comments = $this->commentManager->getComments($_GET['id']);
            $nbComments = $this->commentManager->getNbComments($_GET['id']);
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
        $post = $this->postManager->getPost($_GET['id']);
        require 'view/modifyPostView.php';
    }

    public function sendPost()
    {
        if (!empty($_POST['title']) && !empty($_POST['content']) && strlen(trim($_POST['title']))) {

            $this->post->setTitle($_POST['title']);
            $this->post->setContent($_POST['content']);
//            $newPost = new Post([
//                'title' => $_POST['title'],
//                'content' => $_POST['content']]);
            var_dump($this->post);
            $create = $this->postManager->createPost($this->post);
            var_dump($create);
            if ($this->postManager === false) {
                $this->msg = 'Cannot add post';
                require 'view/createPostView.php';
            } else {
                $this->msg = 'Post added !';
                header('Location: index.php?action=showAdminPanel');
            }
        }
    }

    // Delete a post
    public function deletePost()
    {
        if (htmlentities(isset($_GET['id']))) {
            $posts = $this->postManager->getPosts();
            $this->postManager->deletePost($_GET['id']);
            $this->msg = 'Post has been deleted';
            header('Location: index.php?action=showAdminPanel');
        }
    }

    // Update post
    public function modifyPost()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {

            $post = $this->postManager->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
            $this->msg = 'Post Updated';
            $comments = $this->commentManager->getNbCommentAdmin();
            header('Location: index.php?action=showAdminPanel');
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
