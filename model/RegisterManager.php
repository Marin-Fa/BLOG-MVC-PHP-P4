<?php
require_once 'model/Manager.php';
require_once 'model/User.php';
class RegisterManager extends Manager
{
    public function pushUserInfo($username, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(username, password, created_at) VALUES (?, ?, NOW())');
        $unserInserted = $req->execute(array($username, $password));

        return $unserInserted;
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
}
