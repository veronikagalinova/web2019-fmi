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

    public function getTodaysAgenda()
    {
        try {
            $today = date("Y-m-d");
            $query = "SELECT * FROM agenda WHERE DATE(`date`) = " . "'$today'";
            $stmt = DbConnector::getConnection()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo ['error' => $exception->getMessage()];
        }
    }

    public function getHistoryForUser($user)
    {
        try {
            $query = "SELECT * FROM agenda WHERE username = " . "'$user'";
            $stmt = DbConnector::getConnection()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo ['error' => $exception->getMessage()];
        }
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

    public function getById($id)
    {
        $sql = "SELECT * FROM agenda WHERE id =" . $id;
        echo $sql;
        $req = DbConnector::getConnection()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function getTodaysAgendaForUser($user)
    {
        try {
            $today = date("Y-m-d");
            $query = "SELECT * FROM agenda WHERE DATE(`date`) = " . "'$today'" . " AND username=" . "'$user'";
            $stmt = DbConnector::getConnection()->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo ['error' => $exception->getMessage()];
        }
    }

    public function edit($id, $username, $yesterday, $today, $problems)
    {
        echo $id;
        $sql = "UPDATE agenda SET yesterday = :yesterday, today = :today, problems = :problems WHERE id = :id";
        $req = DbConnector::getConnection()->prepare($sql);
        return $req->execute([
            'id' => $id,
            // 'username' => $username,
            // 'date' => date("Y-m-d"),
            'yesterday' => $yesterday,
            'today' => $today,
            'problems' => $problems
        ]);
    }
}
