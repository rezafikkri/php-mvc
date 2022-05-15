<?php

class Controller
{
    public function view(string $view, array $data = [])
    {
        if (count($data)) {
            extract($data, EXTR_PREFIX_SAME, "phpmvc");
        }

        require_once '../app/Views/' . $view . '.php';
    }

    public function model(string $model)
    {
        require_once '../app/Models/' . $model . '.php';
        return new $model;
    }
}
