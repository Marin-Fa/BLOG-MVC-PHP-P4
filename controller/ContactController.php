<?php
require_once 'model/ContactManager.php';

class ContactController
{
    public $msg = "";

    public function showContactPage()
    {
        $this->msg = "Contact Me";
        require 'view/contactView.php';
    }
    public function addMessage($name, $email, $message)
    {
        $contactManager = new ContactManager();
        if (isset($_POST['submit'])) {
            $messageInserted = $contactManager->postMessage($name, $email, $message);
            $this->msg = "Thank You !";
        }

        if ($messageInserted === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=showContactPage');
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
