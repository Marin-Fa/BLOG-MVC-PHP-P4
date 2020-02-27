<?php


namespace Blog\model;

use Blog\model\User;

use PDO;

class UserManager extends Manager
{
    // Matching username and password
    public function getAuth($name, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT username, password, role FROM user WHERE username = ? AND password = ?');
        $req->execute(array($name, $password));
        return $req->fetch();
    }

    // Get role admin/user
    public function getRole($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT role FROM user WHERE username = ? AND password = ?');
        $req->execute(array($username, $password));
        return $req->fetch();
    }

    // Insert a new user with role = user
    public function pushUserInfo($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO user(username, password, created_at, role) VALUES (?, ?, NOW(), "user")');
        $req->execute(array($username, $password));

        return $req;
    }

    // Check if the username is allready taken
    public function matchUser($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id FROM user WHERE username = ?');
        $req->execute(array($username));
        $req->fetch();
//        var_dump($req->fetch());
        return $req;
    }
}
