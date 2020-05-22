<?php 
    
    $conn = require 'conection.php';

    $id = $_GET['id'] ?? 0;
    
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
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
</head>
<body>             
     <h1><?php echo $user['email']; ?></h1>
     <p>O id deste usuário é <?php echo $user['id']; ?></p>
     <p>
         <a href="/crud/remover.php?id=<?php echo $user['id'];?>">DELETE</a>
         <a href="/crud/editar.php?id=<?php echo $user['id'];?>">EDIT</a>
     </p>
     <p><a href="/crud">voltar</a></p>
</body>
</html>