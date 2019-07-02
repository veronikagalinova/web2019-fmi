<?php
include_once '../config/DbConnector.php';

class Agenda
{

    public function create($username, $date, $yesterday, $today, $problems)
    {
        $sql = "INSERT INTO agenda (username, date, yesterday, today, problems) 
        VALUES (:username, :date, :yesterday, :today, :problems)";
        $req = DbConnector::getConnection()->prepare($sql);
        return $req->execute([
            'username' => $username,
            'date' => $date,
            'yesterday' => $yesterday,
            'today' => $today,
            'problems' => $problems
        ]);
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM agenda";
            $stmt = DbConnector::getConnection()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo ['error' => $exception->getMessage()];
        }
    }
}
