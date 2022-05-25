<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // Controller
        if ($url) {
            $controller = str_replace('-', '', ucwords($url[0], '-'));
            if (file_exists('../app/Controllers/' . $controller . '.php')) {
                $this->controller = $controller;
                unset($url[0]);
            }
        }

        require_once '../app/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        if (isset($url[1])) {
            $method = str_replace('-', '', ucwords($url[1], '-'));
            if (method_exists($this->controller, $method)) {
                $this->method = $method;
                unset($url[1]);
            }
        }

        // Params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl(): ?array
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return null;
    }
}
