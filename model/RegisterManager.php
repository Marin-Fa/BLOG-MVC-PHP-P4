<?php

namespace Blog\model;

use Blog\model\User;

use PDO;

class RegisterManager extends Manager
{
    public function pushUserInfo($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(username, password, created_at) VALUES (?, ?, NOW())');
        $userInserted = $req->execute(array($username, $password));

        return $userInserted;
    }
    public function getUserForLogin($username, $password)
    {
        var_dump('test');
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, username, password FROM users WHERE username = ? AND password = ?');
        $req->bindParam("username", $username, PDO::PARAM_STR);
        $req->execute(array($username, $password));
        $userSelected = $req->fetch();

        return $userSelected;
    }
    public function getUser($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, username FROM users WHERE username = ?');
        $req->execute(array($username));
        $userLogedIn = $req->fetch();

        return $userLogedIn;
    }
    public function matchUser($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT username FROM users WHERE username = :username');
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
