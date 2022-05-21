<?php

class Pages {
    public function __construct()
    {
        // echo 'Pages Constructor';
    }

    public function index()
    {
        echo 'Pages Index';
    }

    public function about($id)
    {
        echo 'Pages About ' . $id;
    }
}