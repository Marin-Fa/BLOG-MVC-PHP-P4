<?php

namespace Blog\controller;

use Blog\model\{
    PostManager,
    Post,
    CommentManager,
    UserManager
};

class PostController
{
    public $msg = "";
    public $p = "";
    public $comment_err = "";
    public $info = "";
    private $postManager;
    private $commentManager;
    private $post;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->post = new Post();
    }
    /**
     * Display all posts on the front page
     */
    public function listPosts()
    {
        $posts = $this->postManager->getPosts();
        $this->msg = "Jean Forteroche";
        $this->p = "Far far away, behind the mountains, far from the industrial world, lives the peacefull place in the world.";

        require 'view/listPostsView.php';
    }
    /**
     * Display a welcoming message if a SESSION is created
     */
    public function loginListPosts()
    {
        $posts = $this->postManager->getPosts();
        $this->msg = 'Welcome';
        $this->p = $_SESSION['username'];
        require 'view/listPostsView.php';
    }
    /**
     * Display one post with its comments
     */
    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $this->postManager->getPost($_GET['id']);
            $comments = $this->commentManager->getComments($_GET['id']);
            $this->p = '';
            $this->info = 'You need to be login to leave a comment';
        } else {
            $this->p = 'This post was not found';
            require 'view/errorView.php';
            exit;
        }

        require 'view/postView.php';
    }
    /**
     * Display createPostView
     */
    public function createPostView()
    {
        $this->msg = 'Create a Post';
        require 'view/createPostView.php';
    }
    /**
     * Display modifyPostview
     */
    public function modifyPostView()
    {
        $this->msg = 'Modify a Post';
        $post = $this->postManager->getPost($_GET['id']);
        require 'view/modifyPostView.php';
    }
    /**
     * Create a new post
     */
    public function sendPost()
    {
        if (!empty($_POST['title']) && !empty($_POST['content']) && strlen(trim($_POST['title']))) {
            $this->post->setTitle($_POST['title']);
            $this->post->setContent($_POST['content']);
            $this->postManager->createPost($this->post);
            $this->msg = 'Post added !';
            $comments = $this->commentManager->getNbCommentAdmin();
            require 'view/adminView.php';
        } else {
            $this->msg = 'Cannot add post';
            require 'view/createPostView.php';
        }
    }
    /**
     * Delete a post with its comments
     */
    public function deletePost()
    {
        if (htmlentities(isset($_GET['id']))) {
            $posts = $this->postManager->getPosts();
            $this->postManager->deletePost($_GET['id']);
            $this->msg = 'Post deleted';
            $comments = $this->commentManager->getNbCommentAdmin();
            require 'view/adminView.php';
        }
    }
    /**
     * Update a post (title and content)
     */
    public function modifyPost()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $post = $this->postManager->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
            $this->msg = 'Post Updated';
            $comments = $this->commentManager->getNbCommentAdmin();
            require 'view/adminView.php';
        } else {
            $post = $this->postManager->getPost($_GET['id']);
            $this->msg = 'Something went wrong';
            require 'view/modifyPostView.php';
        }
    }
    /**
     * Display errorView
     */
    public function errorView()
    {
        $this->msg = 'Error';
        require 'view/errorView.php';
    }
}
