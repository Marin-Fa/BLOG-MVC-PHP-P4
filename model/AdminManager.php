<?php

namespace Blog\model;

use Blog\model\Admin;

use PDO;

class AdminManager extends Manager
{
    public function getAuth($name, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT username, password FROM user WHERE username = ? AND password = ?');
        $req->execute(array($name, $password));
        return $req->fetch();
    }
}
