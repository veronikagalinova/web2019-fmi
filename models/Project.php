<?php
include_once '../config/DbConnector.php';

class Project
{
    public function create($name, $description)
    {
        $sql = "INSERT INTO project (name, description) VALUES (:name, :description)";
        $req = DbConnector::getConnection()->prepare($sql);
        return $req->execute([
            'name' => $name,
            'description' => $description,
        ]);
    }
    public function getProjectById($name)
    {
        $sql = "SELECT * FROM project WHERE name =" . "'$name'";
        $req = DbConnector::getConnection()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
    public function getAllProjects()
    {
        $sql = "SELECT * FROM project";
        $req = DbConnector::getConnection()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
