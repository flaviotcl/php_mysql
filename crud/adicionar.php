<?php

$conn = require 'conection.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'] ?? null;
    $stmt = $conn->prepare('INSERT INTO users (email) VALUES (?)');
    $stmt->bind_param('s',$email);
    $stmt->execute();
    header('location: /crud/index.php');
    die();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/crud/adicionar.php" method="post">
        <h1>+ Adicionar</h1>
        <label for="">EMAIL</label>
        <input type="email" name="email">
        <input type="submit" value="ENVIAR">
    </form>
    <p><a href="/crud/index.php">Voltar</a></p>
</body>
</html>