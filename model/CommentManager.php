<?php

namespace Blog\model;

use Blog\model\Comment;

use PDO;

class CommentManager extends Manager
{
    /**
     * Get all comments on a post
     */
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute([$postId]);
        return $comments;
    }
    /**
     * Get all reported comments
     */
    public function getAdminComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, post_id FROM comments WHERE status = 1 ORDER BY comment_date DESC');
        return $req;
    }
    /**
     * Create a comment on a post
     */
    public function createComment(Comment $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(post_id, author, comment, status, comment_date, id_user) VALUES (?,?,?,0,NOW(),?)');
        $req->execute([
            $comment->getPostId(),
            $comment->getAuthor(),
            $comment->getComment(),
            $comment->getIdUser()
        ]);
        return $req;
    }
    /**
     * Get one specific comment
     */
    public function getComment($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id FROM comments WHERE id = ?');
        $req->execute([$postId]);
        $req->fetch();
        return $req;
    }
    /**
     * Count nb comments on a post
     */
    public function getNbComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT COUNT(*) AS nb_comments FROM comments WHERE post_id = ?');
        $comments->execute([$postId]);
        $nbComments = $comments->fetch();
        return $nbComments;
    }
    /**
     * Create a comment on a post
     */
    public function getNbCommentAdmin()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT posts.title AS title, COUNT(comments.id) AS nb_comments,  posts.content AS content, posts.id AS post_id, posts.creation_date AS creation_date_fr 
                            FROM posts
                            LEFT JOIN comments ON comments.post_id = posts.id
                            GROUP BY posts.id');
        return $req;
    }
    /**
     * Function to report a comment
     */
    public function updateStatusComment($commentId)
    {

        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET status = 1 WHERE id = ?');
        $req->execute([$commentId]);
        return $req;
    }
    /**
     * Delete a comment
     */
    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $deleteComment = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment->execute([$commentId]);
    }
}
