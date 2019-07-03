<?php
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
        echo "asdf";
        if (isset($_POST["create-agenda"])) {
            require(ROOT . 'models/Agenda.php');
            echo "I am in";
            $agenda = new Agenda();
            // if ($agenda->create(
            //     $_POST["username"],
            //     $_POST["date"],
            //     $_POST["yesterday"],
            //     $_POST["today"],
            //     $_POST["problems"]
            // )) {
            //     header("Location: " . WEBROOT . "agenda/index");
            // }
        }
        $this->render("create");
    }
}
