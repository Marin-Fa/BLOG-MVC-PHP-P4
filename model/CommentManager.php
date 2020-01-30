<?php
require_once 'model/Manager.php';
require_once 'model/Comment.php';
class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    // Ajouter un commentaire
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        var_dump($affectedLines);

        return $affectedLines;
    }
    // public function readOneComment($postId, $commentId)
    // {
    //     $db = $this->dbConnect();
    //     $comment = $db->prepare('SELECT id, author, comment, comment_date, post_id FROM comments WHERE post_id = ? AND id = ?');
    //     $comment->execute(array($postId, $commentId));
    //     $myComment = $comment->fetch();

    //     return $myComment;
    // }
    // public function update($author, $comment, $postId, $id)
    // {
    //     var_dump($author, $comment, $postId, $id);
    //     $db = $this->dbConnect();
    //     $commentPo = $db->prepare('UPDATE comments SET author = :author, comment = :comment, comment_date = NOW() WHERE post_id = :post_id AND id = :id');

    //     $modifiedLine = $commentPo->execute(array(
    //         'author' => $author,
    //         'comment' => $comment,
    //         'post_id' => $postId,
    //         'id' => $id
    //     ));

    //     return $modifiedLine;
    // }
}
