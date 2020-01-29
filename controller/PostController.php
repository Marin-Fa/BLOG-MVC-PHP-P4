<?php
require_once 'model/PostManager.php';
class PostController
{
    public function listPosts()
    {
        $postManager = new PostManager(); // Creation obj 
        $posts = $postManager->getPosts(); // Call the function

        require 'view/listPostsView.php';
    }
    public function post()
    {
        $postManager = new PostManager();
        // $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        // $comments = $commentManager->getComments($_GET['id']);

        require 'view/postView.php';
    }
}
