<?php
include_once '../config/DbConnector.php';

class Agenda
{

    public function create($username, $date, $yesterday, $today, $problems)
    {
        $sql = "INSERT INTO agenda (username, date, yesterday, today, problems) 
        VALUES (:username, :date, :yesterday, :today, :problems)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([
            'username' => $username,
            'date' => $$date,
            'yesterday' => $yesterday,
            'today' => $today,
            'problems' => $problems
        ]);
    }
}
