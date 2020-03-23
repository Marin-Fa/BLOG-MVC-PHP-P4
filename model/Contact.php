<?php

namespace Blog\model;

use DateTime;

class Contact
{

    private $_id;
    private $_name;
    private $_email;
    private $_message;
    private $_date;

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

    public function setName(string $name)
    {
        $this->_name = $name;
    }

    public function setEmail(string $email)
    {
        $this->_email = $email;
    }

    public function setMessage($message)
    {
        $this->_message = $message;
    }

    public function setDate($date)
    {
        $this->_date = new DateTime($date);
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

    public function getEmail(): string
    {
        return $this->_email;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function getDate()
    {
        return $this->_date;
    }
}
