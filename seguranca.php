<?php


$email =  $_GET['email'] ?? null;

$id =  $_GET['id'] ?? 0;

$conn = new mysqli('localhost','root','123456','php_mysql_iniciando');

//$result = $conn->query('INSERT INTO users (email) VALUE ("'.$email.'")');

$result = $conn->query('SELECT * FROM users WHERE id='.$id.'');

$users = $result->fetch_all(MYSQLI_ASSOC);

echo "<ul>";
echo "<pre>";
foreach ($users as $user)
{
   echo $user['id'].' - '.$user['email'];
}

echo "</ul>";
