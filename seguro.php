<?php


$email =  $_GET['email'] ?? null;

$id =  $_GET['id'] ?? 0;
$id2 =  $_GET['id2'] ?? 0;

$conn = new mysqli('localhost','root','123456','php_mysql_iniciando');

//$result = $conn->query('INSERT INTO users (email) VALUE ("'.$email.'")');

$stmt = $conn->prepare('SELECT * FROM users WHERE id > ? AND id < ?');


/***
 *  Tipos aceitos como parâmetros do $stmt->bind_param('',  );
 *  i -> integer
 *  s -> string
 *  d -> double
 *  b ->blob
 */
$stmt->bind_param('ii', $id, $id2);

$stmt->execute();

$result = $stmt->get_result();

echo "<pre>";
//var_dump($result);

$users = $result->fetch_all(MYSQLI_ASSOC);

echo "<ul>";
echo "<pre>";
foreach ($users as $user)
{
   echo '<li>'.$user['id'].' - '.$user['email'].'</li>';
}

echo "</ul>";
