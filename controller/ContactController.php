<?php

namespace Blog\controller;

use Blog\model\ContactManager;

class ContactController
{
    public $msg = "Contact Me";
    public $a = "";

    public function showContactPage()
    {
        require 'view/contactView.php';
    }
    public function addMessage($name, $email, $message)
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
            $contactManager = new ContactManager();
            $messageInserted = $contactManager->postMessage($name, $email, $message);
            $this->msg = "Thank You !";
        } else {
            echo 'Fill in the form please';
        }
    }



    // public function readMessage()
    // {
    //     $contactManager = new ContactManager();
    //     $messages = $contactManager->getMessages();
    //     var_dump($messages);
    //     header('Location: index.php?action=addMessage');
    // }
}
