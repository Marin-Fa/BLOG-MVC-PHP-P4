<?php
class Contact
{

    private $_id;
    private $_name;
    private $_email;
    private $_message;
    private $_date;

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
