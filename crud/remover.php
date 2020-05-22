<?php

$conn = require 'conection.php';

$id = $_GET['id'] ?? 0;

if(!0)
{
    $stmt = $conn->prepare('DELETE FROM users WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();   
    header('location: /crud/index.php');
}
 