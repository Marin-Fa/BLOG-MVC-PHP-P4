<?php

namespace Blog\model;

use DateTime;

class Post
{

    private $_id;
    private $_title;
    private $_content;
    private $_creation_date;
    private $_picture;

    // Constructor
//    public function __construct(array $donnees)
//    {
//        $this->hydrate($donnees);
//    }
//
//    // Method hydratation
//    public function hydrate(array $donnees)
//    {
//        foreach ($donnees as $key => $value) {
//            $method = 'set' . ucfirst($key);
//
//            if (method_exists($this, $method)) {
//                $this->$method($value);
//            }
//        }
//    }

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

    public function setPicture($picture)
    {
        $this->_picture = $picture;
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

    public function getPicture()
    {
        return $this->_picture;
    }
}
