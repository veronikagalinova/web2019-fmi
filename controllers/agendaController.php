<?php
session_start();

class agendaController extends Controller
{
    function index()
    {
        require(ROOT . 'models/Agenda.php');
        $agenda = new Agenda();
        $data['agenda'] = $agenda->getTodaysAgenda();
        $this->set($data);
        $this->render("index");
    }

    function create()
    {
        require(ROOT . 'models/Agenda.php');
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
}
