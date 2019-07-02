<?php
class Controller
{
    var $elements = [];
    var $layout = "default";

    function set($data)
    {
        $this->elements = array_merge($this->elements, $data);
    }

    function render($filename)
    {

        extract($this->elements);
        // това ще отговаря за динамичната смяна на вютата

        ob_start();
        // в името на класа премахва низът `Controller` и прави първата буква главна 
        // така от agendaController ще отидем във views/Agenda/подадения файл.php
        require(ROOT . "views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        // запазва в буфер даденото съдържание
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "views/Layouts/" . $this->layout . '.php');
        }
    }
}
