<?php

namespace Blog\model;

use Blog\model\Comment;

use PDO;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute([$postId]);

        return $comments;
    }

    // Ajouter un commentaire
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute([$postId, $author, $comment]);

        return $affectedLines;
    }

    public function getCommentsAdmin()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY comment_date DESC');
        $comments->execute();

        return $comments;
    }

    public function getNbComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT COUNT(*) AS nb_comments FROM comments WHERE post_id = ?');
        $comments->execute([$postId]);
        $nbComments = $comments->fetch();

        return $nbComments;
    }

    public function getNbComment()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(comments.id) AS nb_comments, posts.title AS post_title, posts.content AS post_content FROM comments
            INNER JOIN posts ON comments.post_id=posts.id
            GROUP BY comments.post_id');
        $req->fetchAll();
//        var_dump($req);

        return $req;
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
