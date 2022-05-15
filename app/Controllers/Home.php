<?php

class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['nama'] = $this->model('UserModel')->getUser();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
