<?php

namespace Blog\model;

use DateTime;

class Comment
{

    private $_id;
    private $_post_id;
    private $_status;
    private $_author;
    private $_comment;
    private $_comment_date;
    private $_id_user;

    public function __construct($value = array())
    {
        if (!empty($value))
            $this->hydrate($value);
    }

    public function hydrate($data)
    {
        foreach ($data as $attribut => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }

    // SETTERS
    public function setId(int $id)
    {
        $this->_id = $id;
    }

    public function setPostId(int $postId)
    {
        $this->_post_id = $postId;
    }

    public function setStatus(int $status)
    {
        $this->_status = $status;
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

    public function setIdUser(int $idUser)
    {
        $this->_id_user = $idUser;
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

    public function getStatus(): int
    {
        return $this->_status;
    }

    public function getAuthor(): string
    {
        return $this->_author;
    }

    public function getComment(): string
    {
        return $this->_comment;
    }

    public function getCommentDate()
    {
        return $this->_comment_date;
    }

    public function getIdUser(): int
    {
        return $this->_id_user;
    }
}

//$comment = new Comment(["author" => "Hortense", "comment" => "You're gonna enjoy php"]);
//$new_values = ["author" => "Mom", "comment" => "What is php?"];
//$comment->hydrate($new_values);
