<?php
    $dsn = 'mysql:host=localhost;dbname=assignment_tracker';
    $username = 'root';
    $password = 'elashry1072005';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = 'Database error:';
    $error .= $e-> getMessage();
    include('view/error.php');
    exit();
}