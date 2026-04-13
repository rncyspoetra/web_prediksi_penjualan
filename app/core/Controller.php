<?php

class Controller {

    protected function view($path, $data = [])
    {
        extract($data);
        require dirname(__DIR__, 2) . "/views/$path.php";
    }

    protected function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}