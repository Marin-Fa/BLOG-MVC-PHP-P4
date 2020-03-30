<?php

namespace Blog\model;

use Blog\model\Contact;

class ContactManager extends Manager
{
    /**
     * Function to send a message
     */
    public function createMessage(Contact $contact)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO contact(name, email, message, date) VALUES (?, ?, ?, NOW())');
        $req->execute([
            $contact->getName(),
            $contact->getEmail(),
            $contact->getMessage()
        ]);
        return $req;
    }
}
