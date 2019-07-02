<?php
class agendaController extends Controller
{
    function index()
    {
        require(ROOT . 'models/Agenda.php');
        $agenda = new Agenda();
        $agenda->create("veronika", date('2019-07-01'), 'a', 'b', 'c');
        $data['agenda'] = $agenda->getAll();
        $this->set($data);
        $this->render("index");
    }
}
