<?php
class Task
{
    private $id;
    private $description;
    private $status;

    private $conn;
    private $table_name = 'tasks';

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // public function allTasks()
    // {
    //     try {
    //         echo json_encode($this->conn->select("SELECT * FROM tasks"), JSON_UNESCAPED_UNICODE);
    //     } catch (PDOException $exception) {
    //         echo ['error' => $exception->getMessage()];
    //     }
    // }

    public function create()
    { }

    public function read()
    {
        // TO DO - FIX COLUMNS
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function update()
    { }

    public function delete()
    { }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
