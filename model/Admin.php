<?php

namespace Blog\model;

class Admin
{

    private $_id;
    private $_name;
    private $_password;

    // SETTERS
    public function setId(int $id)
    {
        $this->_id = $id;
    }
    public function setName(string $name)
    {
        $this->_name = $name;
    }
    public function setPassword(string $password)
    {
        $this->_password = $password;
    }

    // GETTERS
    public function getId(): int
    {
        return $this->_id;
    }
    public function getName(): string
    {
        return $this->_name;
    }
    public function getPassword(): string
    {
        return $this->_password;
    }
}
