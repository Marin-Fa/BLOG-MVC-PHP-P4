<?php
class Comment
{

    private $_id;
    private $_post_id;
    private $_author;
    private $_comment;
    private $_comment_date;

    // SETTERS
    public function setId(int $id)
    {
        $this->_id = $id;
    }
    public function setPostId(int $postId)
    {
        $this->_post_id = $postId;
    }
    public function setAuthor(string $author)
    {
        $this->_author = $author;
    }
    public function setComment(string $comment)
    {
        $this->_comment = $comment;
    }
    public function setCommentDate($commentDate)
    {
        $this->_comment_date = new DateTime($commentDate);
    }

    // GETTERS
    public function getId(): int
    {
        return $this->_id;
    }
    public function getPostId(): int
    {
        return $this->_post_id;
    }
    public function getAuthor(): string
    {
        return $this->_author;
    }
    public function getCommentt(): string
    {
        return $this->_comment;
    }
    public function getCommentDate()
    {
        return $this->_comment_date;
    }
}
