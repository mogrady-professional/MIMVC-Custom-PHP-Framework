<?php
class Post {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query('SELECT * FROM post'); // Prepare statement with query -> pass through to index
        $results = $this->db->resultSet();
        return $results;
    }

}