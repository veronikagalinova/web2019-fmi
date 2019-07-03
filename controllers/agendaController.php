<?php
session_start();
require(ROOT . 'models/Agenda.php');

class agendaController extends Controller
{
    function index()
    {
        $agenda = new Agenda();
        $data['agenda'] = $agenda->getTodaysAgenda();
        $this->set($data);
        $this->render("index");
    }

    function create()
    {
        $agenda = new Agenda();
        $user =  $_SESSION['username'];
        if ($agenda->getTodaysAgenda() == true) {
            header("Location: " . WEBROOT . "agenda/index");
        }

        if (isset($_POST["create-agenda"])) {
            if ($agenda->create(
                $user,
                date('Y-m-d'),
                $_POST["yesterday"],
                $_POST["today"],
                $_POST["problems"]
            )) {
                header("Location: " . WEBROOT . "agenda/index");
            }
        }
        $this->render("create");
    }

    function myHistory()
    {
        $agenda = new Agenda();
        $user =  $_SESSION['username'];
        $data['myHistory'] = $agenda->getHistoryForUser($user);
        $this->set($data);
        $this->render("myHistory");
    }
}
