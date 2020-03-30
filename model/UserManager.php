<?php


namespace Blog\model;

use Blog\model\User;

use PDO;

class UserManager extends Manager
{
    /**
     * Check if the username allready exists
     */
    public function getAuth($name)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, username, password, role FROM user WHERE username = ?');
        $req->execute([$name]);
        return $req->fetch();
    }
    /**
     * Create a new user
     * Role user
     */
    public function addUser(User $user)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO user(username, password, created_at, role) VALUES (?, ?, NOW(), "user")');
        $req->execute([
            $user->getUsername(),
            $user->getPassword(),
        ]);
        return $req;
    }
}
