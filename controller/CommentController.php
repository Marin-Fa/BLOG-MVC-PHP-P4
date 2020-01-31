<?php

namespace Blog\controller;

use Blog\model\CommentManager;

class CommentController
{
    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
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
