<?php

namespace Blog\controller;

use Blog\model\{
    Contact,
    ContactManager
};

class ContactController
{
    public $msg = "Contact Me";
    public $a = "";
    private $contactManager;
    private $contact;

    public function __construct()
    {
        $this->contactManager = new ContactManager();
        $this->contact = new Contact();
    }

    public function showContactPage()
    {
        require 'view/contactView.php';
    }

    public function addMessage()
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

            $this->contact->setName(htmlspecialchars($_POST['name']));
            $this->contact->setEmail(htmlspecialchars($_POST['email']));
            $this->contact->setMessage(htmlspecialchars($_POST['message']));
            $this->contactManager->createMessage($this->contact);
            $this->msg = "Thank You !";
            require 'view/contactView.php';
        } else {
            $this->msg = "Fill in the form please";
            require 'view/contactView.php';
        }
    }
}
