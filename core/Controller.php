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
        ob_start();
        require(ROOT . "views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "views/Layouts/" . $this->layout . '.php');
        }
    }
}
