<?php

namespace Blog\model;

use Blog\model\Admin;

use PDO;

class AdminManager extends Manager
{
    public function getAuth($name, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT admin_name, password FROM admin WHERE admin_name = ? AND password = ?');
        $req->execute(array($name, $password));
        // var_dump($name, $password);
        return $req->fetch();
    }
}
