<?php

namespace Blog\model;

use DateTime;

class User
{
    private $_id;
    private $_username;
    private $_password;
    private $_created_at;

    // SETTERS
    public function setId(int $id)
    {
        $this->_id = $id;
    }
    public function setUsername(string $username)
    {
        $this->_username = $username;
    }
    public function setPassword(string $password)
    {
        $this->_password = $password;
    }
    public function setCreatedAt($createdAt)
    {
        $this->_created_at = new DateTime($createdAt);
    }

    // GETTERS
    public function getId(): int
    {
        return $this->_id;
    }
    public function getUsername(): string
    {
        return $this->_username;
    }
    public function getPassword(): string
    {
        return $this->_password;
    }
    public function getCreatedAt()
    {
        return $this->_created_at;
    }
}
