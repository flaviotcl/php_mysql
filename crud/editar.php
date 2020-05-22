<?php

$conn = require 'conection.php';

$id = $_GET['id'] ?? 0;

if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'] ?? null;
    $id = $_GET['id'] ?? 0;

    $stmt = $conn->prepare('UPDATE users SET email=? WHERE id=?');
    $stmt->bind_param('si',$email, $id);
    $stmt->execute();
    header('location: /crud/index.php');
    die();
}

if(!0)
{
    $stmt = $conn->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result =  $stmt->get_result();
    $user = $result->fetch_assoc();  
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
    <form action="/crud/editar.php?id=<?php echo $user['id']; ?>" method="post">
        <h1>Editar Usuário</h1>
        <label for="">EMAIL</label>
        <input type="email" name="email" value="<?php echo $user['email'];?>">
        <input type="submit" value="ENVIAR">
    </form>
    <p><a href="/crud/index.php">Voltar</a></p>
</body>
</html>