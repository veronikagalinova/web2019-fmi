<?php
include_once '../config/DbConnector.php';
class User
{

    public function create($username, $password, $email)
    {
        $sql = "INSERT INTO users (username, password,email) VALUES (:username, :password, :email)";
        $req = DbConnector::getConnection()->prepare($sql);
        return $req->execute([
            'username' => $username,
            'password' => $password,
            'email' => $email
        ]);
    }
    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username =" . "'$username'";
        $req = DbConnector::getConnection()->prepare($sql);
        $req->execute();
        return $req->fetchObject();
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $req = DbConnector::getConnection()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}
