<?php

class User 
{
    private $username;
    private $password;
    private $email;


    public function create()
    {
        $sql = "INSERT INTO users (username, password,email) VALUES (:username, :password, :email)";
        $req = Database::getConnection()->prepare($sql);
        return $req->execute([
            'username' => $this->name,
            'password' => $this->description,
            'email' => $this->email
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

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
?>