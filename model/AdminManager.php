<?php

namespace Blog\model;

use Blog\model\Admin;

use PDO;

class AdminManager extends Manager
{
    public function getAuth($name, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT name, password FROM admin WHERE name = ? AND password = ?');
        $req->execute(array($name, $password));
        // var_dump($name, $password);
        $req->fetch();

        return $req;
    }
}
