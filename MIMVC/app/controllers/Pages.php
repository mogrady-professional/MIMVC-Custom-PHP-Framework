<?php

class Pages  extends Controller {
    public function __construct()
    {
        // echo 'Pages Constructor';
        $this->postModel = $this->model('Post'); // Access Post Model
    }

    public function index()
    {

        $posts = $this->postModel->getPosts(); // Access Post Model and getPosts() method
        $data = [
            'title' => 'This is the MIMVC Framework', 
            'posts' => $posts
        ];
        // Loaded by default

        // echo 'Pages Index';
        // $this -> view('pages/index'); // -> "View does not exist"
        // $data = [
        //     'title' => 'Welcome'
        // ];

        $this->view('pages/index', $data);

    }


    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];
        // echo 'Pages About';
        $this->view('pages/about', $data);
    }
}