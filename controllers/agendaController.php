<?php
session_start();
require(ROOT . 'models/Agenda.php');

class agendaController extends Controller
{
    function index()
    {
        if(!isset($_SESSION['username']))
        {
            header("Location: " . WEBROOT . "users/login");
        }
        $agenda = new Agenda();
        $data['agenda'] = $agenda->getTodaysAgenda();
        $this->set($data);
        $this->render("index");
    }

    function create()
    {
        if(!isset($_SESSION['username']))
        {
            header("Location: " . WEBROOT . "users/login");
        }
        $agenda = new Agenda();
        $user =  $_SESSION['username'];
        if ($agenda->getTodaysAgendaForUser($user) == true) {
            header("Location: " . WEBROOT . "agenda/index");
        }

        if (isset($_POST["create-agenda"])) {
            if(!isset($_POST["yesterday"]) || !isset($_POST["today"]))
            {
                echo '<div class="alert alert-danger" role="alert"> Please provide all the required fields</div>';
            }
            else
            {
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
        }
        $this->render("create");
    }

    function edit()
    {
        if(!isset($_SESSION['username']))
        {
            header("Location: " . WEBROOT . "users/login");
        }
        $agenda = new Agenda();
        $user = $_SESSION['username'];
        $d["agenda"] = $agenda->getTodaysAgendaForUser($user);

        if ($d["agenda"] == false) {
            header("Location: " . WEBROOT . "agenda/index");
            exit;
        } else {
            // if (isset($_POST["edit-agenda"])) {

            // }
            $this->set($d);
            $this->render("edit");
            if (isset($_POST["edit-agenda"])) {
                if(!isset($_POST["yesterday"]) || !isset($_POST["today"]))
                {
                    echo '<div class="alert alert-danger" role="alert">Please provide all the required fields</div>';
                }
                else 
                {
                    if ($agenda->edit($d["agenda"]['id'], $user, $_POST["yesterday"], $_POST["today"], $_POST["problems"])) {
                        header("Location: " . WEBROOT . "agenda/index");
                    }
                }
            }
        }
    }

    function myHistory()
    {
        if(!isset($_SESSION['username']))
        {
            header("Location: " . WEBROOT . "users/login");
        }
        $agenda = new Agenda();
        $user =  $_SESSION['username'];
        $data['myHistory'] = $agenda->getHistoryForUser($user);
        $this->set($data);
        $this->render("myHistory");
    }
}
