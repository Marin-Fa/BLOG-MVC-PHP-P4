<?php

namespace Blog\controller;

use Blog\model\ContactManager;

class ContactController
{
    public $msg = "Contact Me";

    public function showContactPage()
    {
        require 'view/contactView.php';
    }
    public function addMessage($name, $email, $message)
    {
        $contactManager = new ContactManager();
        $messageInserted = $contactManager->postMessage($name, $email, $message);
        $this->msg = "Thank You !";

        if ($messageInserted === false) {
            echo ('Impossible d\'ajouter le commentaire !');
        } else {
            require 'view/contactView.php';
        }
        // if (isset($_POST['submit'])) {
        //     $messageInserted = $contactManager->postMessage($name, $email, $message);
        //     $this->msg = "Thank You !";
        //  if ($messageInserted === false) {
        //     throw new Exception('Impossible d\'ajouter le commentaire !');
        // } else {
        //     require 'view/contactView.php';
        // }
        //  require 'view/contactView.php';
        // }
    }



    // public function readMessage()
    // {
    //     $contactManager = new ContactManager();
    //     $messages = $contactManager->getMessages();
    //     var_dump($messages);
    //     header('Location: index.php?action=addMessage');
    // }
}
