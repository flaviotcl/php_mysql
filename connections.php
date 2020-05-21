<?php

$conn = new mysqli('localhost','root','123456','php_mysql_iniciando');

if($conn->connect_errno)
{
    die('Falhou em conectar: ('.$conn->connect_errno.') '.$conn->connect_error);
}
echo $conn->host_info;

echo "<br>";

$sql = 'CREATE TABLE products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL    
    )';

if (!$conn->query($sql))
{
    echo "Tabela Users já existe !";
}

$result = $conn->query('INSERT INTO users (email) VALUE ("flaviotcl@hotmail.com")');

var_dump($result);

echo "<br>";