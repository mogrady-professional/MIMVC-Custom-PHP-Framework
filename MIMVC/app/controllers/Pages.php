<?php

class Pages  extends Controller {
    public function __construct()
    {
        // echo 'Pages Constructor';
    }

    public function index()
    {
        // Loaded by default

        // echo 'Pages Index';
        // $this -> view('pages/index'); // -> "View does not exist"
        $data = [
            'title' => 'Welcome'
        ];

        $this->view('pages/index', $data);

    }


    public function about()
    {
        // echo 'Pages About';
        $this->view('pages/about');
    }
}