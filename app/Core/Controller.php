<?php

class Controller {
    public function view(string $view, array $data = [])
    {
        if (count($data)) {
            extract($data, EXTR_PREFIX_SAME, "phpmvc");
        }

        require_once '../app/Views/' . $view . '.php';
    }
}
