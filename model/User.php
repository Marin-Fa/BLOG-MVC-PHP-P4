<?php

namespace Blog\model;

use DateTime;

class User
{
    private $_id;
    private $_username;
    private $_password;
    private $_role;
    private $_created_at;

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

    public function setUsername(string $username)
    {
        $this->_username = $username;
    }

    public function setPassword(string $password)
    {
        $this->_password = $password;
    }

    public function setRole(string $role)
    {
        $this->_role = $role;
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

    public function getRole(): string
    {
        return $this->_role;
    }

    public function getCreatedAt()
    {
        return $this->_created_at;
    }
}
