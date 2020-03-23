<?php

namespace Blog\controller;

use Blog\model\{
    CommentManager,
    Comment,
    PostManager,
    User,
    UserManager
};

class CommentController
{
    public $msg = "";
    public $p = "";
    public $comment_err = "";
    private $commentManager;
    private $postManager;
    private $userManager;
    private $comment;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
        $this->comment = new Comment();
    }

    public function addComment($postId)
    {
        if (isset($_POST['submit'])) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $this->comment->setPostId($postId);
                    $this->comment->setAuthor($_POST['author']);
                    $this->comment->setComment($_POST['comment']);
                    $this->comment->setIdUser((int)$_SESSION['user_id']);
                    var_dump($this->comment);
                    $comments = $this->commentManager->createComment($this->comment);
                    header('Location: index.php?action=post&id=' . $postId);
                } else {
                    $post = $this->postManager->getPost($_GET['id']);
                    $comments = $this->commentManager->getComments($_GET['id']);
                    $this->comment_err = "You must fill in the form";
                    require 'view/postView.php';
                }
            }
        }
    }

    public function reportComment()
    {
        if ($_SESSION) {
            $this->commentManager->getComment($_GET['id']);
            $this->commentManager->updateStatusComment($_GET['id']);
            $this->p = 'Comment reported';
//            var_dump($_GET);
            header('Location: index.php?action=post&id=' . $_GET['postId']);
        } else {
            $this->p = 'You are not logged in';
            require 'view/errorView.php';
        }
    }

    public function supComment()
    {
        $comments = $this->commentManager->getAdminComments();
        $this->commentManager->deleteComment($_GET['id']);
        $this->msg = 'Comment Deleted';
        header('Location: index.php?action=showAdminCommentsView');
    }
}
