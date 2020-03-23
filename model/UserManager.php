<?php


namespace Blog\model;

use Blog\model\User;

use PDO;

class UserManager extends Manager
{
    // Matching username and password
    public function getAuth($name)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, username, password, role FROM user WHERE username = ?');
        $req->execute([$name]);
        return $req->fetch();
    }

    // Get role admin/user
    public function getRole($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT role FROM user WHERE username = ? AND password = ?');
        $req->execute([$username, $password]);
        return $req->fetch();
    }

    // Insert a new user with role = user
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
