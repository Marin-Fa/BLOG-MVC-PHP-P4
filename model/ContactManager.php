<?php

namespace Blog\model;

use Blog\model\Contact;

class ContactManager extends Manager
{
    public function postMessage($name, $email, $message)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO contact(name, email, message, date) VALUES(?, ?, ?, NOW())');
        $messageInserted = $req->execute([$name, $email, $message]);

        return $messageInserted;
    }
    // public function getMessages()
    // {
    //     $db = $this->dbConnect();
    //     $messages = $db->prepare('SELECT id, name, email, message, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS contact_date FROM contact WHERE id = ? ORDER BY date DESC');

    //     return $messages;
    // }
}
