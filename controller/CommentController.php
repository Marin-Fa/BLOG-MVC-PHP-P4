<?php

namespace Blog\controller;

use Blog\model\{
    CommentManager,
    Comment,
    PostManager
};

class CommentController
{
    public $p = "";
    private $commentManager;
    private $postManager;
    private $comment;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->comment = new Comment();
    }

    public function addComment($postId, $author, $comment)
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $this->comment->setAuthor($_POST['author']);
                $this->comment->setComment($_POST['comment']);
                var_dump($this->comment);

                $comments = $this->commentManager->postComment($postId, $author, $comment);
                header('Location: index.php?action=post&id=' . $postId);
                exit;
            } else {
                echo 'You must fill in the form';
            }
        }
    }

    public function reportComment()
    {
        if ($_SESSION) {
            $this->commentManager->getComment($_GET['id']);
            $this->commentManager->updateStatusComment($_GET['id']);
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
    // public function oneComment($postId, $commentId)
    // {
    //     $commentManager = new CommentManager();
    //     $myComment = $commentManager->readOneComment($postId, $commentId);
    //     // var_dump($myComment);
    //     require('view/modifiedCommentView.php');
    // }
    // public function updateActionComment($author, $comment, $postId, $id)
    // {
    //     var_dump((int) $postId, (int) $id);
    //     $commentManager = new CommentManager();
    //     $modifiedComment = $commentManager->update($author, $comment, (int) $postId, (int) $id);

    //     if ($modifiedComment === false) {
    //         throw new Exception('Impossible de modifier le commentaire !');
    //     } else {
    //         header('Location: index.php?action=post&id=' . $postId);
    //         // var_dump($modifiedComment);
    //     }
    // }
}
