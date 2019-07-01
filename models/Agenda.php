<?php
class Agenda
{
    private $username;
    private $date;
    private $yesterday;
    private $today;
    private $problems;


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getYesterday()
    {
        return $this->yesterday;
    }

    public function setYesterday($yesterday)
    {
        $this->yesterday = $yesterday;

        return $this;
    }

    public function getToday()
    {
        return $this->today;
    }

    public function setToday($today)
    {
        $this->today = $today;

        return $this;
    }

    public function getProblems()
    {
        return $this->problems;
    }

    public function setProblems($problems)
    {
        $this->problems = $problems;

        return $this;
    }
}
