<?php
// PDO Demo
// Create a Database in MySQL
// id, name, email, password, status


// PDO Sample Database Connection
$host = 'localhost';
$dbname = 'oop_sandbox';
$username = 'root';
$password = '';

// Set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Set default fetch mode to object

// Use placeholders for prepared statements -> prevent SQL injection

// :status (named parameter)
// ? positional parameter

/*
Select * from users where status = :status
*/

$sql = 'SELECT * FROM users WHERE status = :status';
$stmt = $pdo->prepare($sql);
$stmt -> execute(['status' => 1]);
$users = $stmt->fetchAll(); // fetchAll() returns an array
// $users = $stmt->fetchAll(PDO::FETCH_OBJ); // returns an object

foreach($users as $user) {
    echo $user['name'] . '<br>';
}

/*
Insert Data into the Database

Data coming from a form -> prevents from SQL injection
*/

$name = "Michael O Grady";
$email = "m@gmail.com";
$password = "123456";
$status = 1;

$sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
$stmt = $pdo->prepare($sql); // Prepare the statement
$stmt->execute(['name' => $name, 'email' => $email, 'password' => $password, 'status' => $status]); // Execute the statement
echo "User Added";