<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == WEBROOT) {
            $request->controller = "agenda";
            $request->action = "index";
            $request->params = [];
        } else {

            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, count($explode_url) - 2);
            echo WEBROOT . "\n";
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }
    }
}
