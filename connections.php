<?php

$conn = new mysqli('localhost','root','123456','php_mysql_iniciando');

if($conn->connect_errno)
{
    die('Falhou em conectar: ('.$conn->connect_errno.') '.$conn->connect_error);
}
echo $conn->host_info;

echo "<br>";echo "<br>";

$sql = 'CREATE TABLE products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL    
    )';

if (!$conn->query($sql))
{
    echo "Tabela Users já existe !";
    echo "<br>";
    echo "<hr>";
    echo "<br>";
}

// $result = $conn->query('INSERT INTO users (email) VALUE ("pablo@yahoo.com")');

$result = $conn->query('SELECT * FROM users');

/** 
 *  Cada vez que o comando $result->fetch_assoc() é executado ele retorna a 
 *  linha de registro do Array e dá unset na linha inteira.
 */

var_dump('ANTES - FETCH_ASSOC',$result->fetch_assoc());

echo "<br>";

echo "<ul>";
    while($user = $result->fetch_assoc())
    {
        echo '<li>'.$user['id'].' - '.$user['email'].'</li>';
    }
echo "</ul>";

// print_r($result);

echo "<br>";

var_dump('DEPOIS - FETCH_ASSOC',$result->fetch_assoc());

echo "<br>";
echo "<hr>";
echo "<br>";




$result = $conn->query('SELECT * FROM users');

echo "<pre>";

/***
 *  O comando $result->fetch_all() retorna um array de usuarios e
 *  e após execução todo o array é esvaziado.  
 */
//var_dump('ANTES - FETCH_ALL',$result->fetch_all());

//$users = $result->fetch_all(MYSQLI_ASSOC);
$users = $result->fetch_all(MYSQLI_NUM);
echo "<ul>";
foreach ($users as $user)
{
   //echo '<li>'.$user['id'].' - '.$user['email'].'</li>';
     echo '<li>'.$user[0].' - '.$user[1].'</li>';    
}
echo "</ul>";

echo "<br>";

var_dump('DEPOIS - FETCH_ALL',$result->fetch_all());



echo "<hr>";


$users = $conn->query('SELECT * FROM users');

//var_dump($users->fetch_object());
echo "<ul>";
while ( $user = $users->fetch_object())
{
    echo '<li>'.$user->id.' - '.$user->email.'</li>';    
}
echo "</ul>"; 
