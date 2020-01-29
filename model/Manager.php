<?php
// BDD connection
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=P4;charset=utf8', 'root', '');
        return $db;
    }
}
