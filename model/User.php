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

    // Constructor
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    // Method hydratation
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
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
