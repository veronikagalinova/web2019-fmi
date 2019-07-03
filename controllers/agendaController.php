<?php
class agendaController extends Controller
{
    function index()
    {
        require(ROOT . 'models/Agenda.php');
        $agenda = new Agenda();
        $data['agenda'] = $agenda->getAll();
        $this->set($data);
        $this->render("index");
    }
}
