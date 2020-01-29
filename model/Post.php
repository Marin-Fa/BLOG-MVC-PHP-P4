<?php
class Post
{

    private $_id;
    private $_title;
    private $_content;
    private $_creation_date;

    // SETTERS
    public function setId(int $id)
    {
        $this->_id = $id;
    }
    public function setTitle(string $postTitle)
    {
        $this->_title = $postTitle;
    }
    public function setContent(string $content)
    {
        $this->_content = $content;
    }
    public function setCreationDate($creationDate)
    {
        $this->_creation_date = new DateTime($creationDate);
    }

    // GETTERS
    public function getId(): int
    {
        return $this->_id;
    }
    public function getTitle(): string
    {
        return $this->_title;
    }
    public function getContent(): string
    {
        return $this->_content;
    }
    public function getCreationDate()
    {
        return $this->_creation_date;
    }
}
