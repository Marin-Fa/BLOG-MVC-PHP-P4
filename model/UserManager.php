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

    public function pushUserInfo($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(username, password, created_at) VALUES (?, ?, NOW())');
        $userInserted = $req->execute(array($username, $password));

        return $userInserted;
    }

    public function getUser($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, username, password FROM user WHERE username = ? AND password = ?');
        $req->execute(array($username, $password));
        return $req->fetch();
    }

    public function matchUser($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT username FROM user WHERE username = :username');
        $req->execute([
            'username' => $username
        ]);
        // var_dump($req->execute([
        //     'username' => $username
        // ]));
        // return $username;
        $user = $req->fetch(PDO::FETCH_ASSOC);

        $trueOrfalse = $req->execute(['username' => $username]);
        return $trueOrfalse;

        // return $req($req->execute([
        //     'username' => $username
        // ]));
    }
}
