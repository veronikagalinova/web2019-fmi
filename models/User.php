<?php
include_once '../config/DbConnector.php';
class User
{

    public function create($username, $password, $email)
    {
        $sql = "INSERT INTO users (username, password, email, project_name) VALUES (:username, :password, :email, :project_name)";
        $req = DbConnector::getConnection()->prepare($sql);
        return $req->execute([
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'project_name' => 'WEB'
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
    public function updateUserProject($username, $project) {
        try {
            $sql = "UPDATE users SET project_name = :project WHERE username = :username";
            $req = DbConnector::getConnection()->prepare($sql);
            $req->execute([
                'project' => $project,
                'username' => $username
            ]);
            return $req->fetchObject();
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
}
