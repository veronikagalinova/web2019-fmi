<?php

class User
{

    public function create($username, $password, $email)
    {
        $sql = "INSERT INTO users (username, password,email) VALUES (:username, :password, :email)";
        $req = Database::getConnection()->prepare($sql);
        return $req->execute([
            'username' => $username,
            'password' => $password,
            'email' => $email
        ]);
    }
    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM project WHERE username =" . $username;
        $req = Database::getConnection()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}
