<?php

namespace Blog\controller;

use Blog\model\{
    CommentManager,
    Comment,
    PostManager,
    UserManager
};

class CommentController
{
    public $msg = "";
    public $p = "";
    public $info = "";
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
                    $this->comment_err = '';
                    $this->comment->setPostId($postId);
                    $this->comment->setAuthor($_POST['author']);
                    $this->comment->setComment(htmlspecialchars($_POST['comment']));
                    $this->comment->setIdUser((int)$_SESSION['user_id']);
                    $comments = $this->commentManager->createComment($this->comment);
                    header('Location: index.php?action=post&id=' . $postId);
                } else {
                    $this->comment_err = "Please, enter a comment !";
                    $post = $this->postManager->getPost($_GET['id']);
                    $comments = $this->commentManager->getComments($_GET['id']);
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
