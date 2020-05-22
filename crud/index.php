<?php 
    
    $conn = require 'conection.php';

    $result = $conn->query('SELECT * FROM users');

    $users  =  $result->fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>email</th>
                <th>teste</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
             foreach ($users as $user):
                echo '<tr>';
                    echo '<td>'.$user['id'].'</td>';
                    echo '<td>'.$user['email'].'</td>';
                    echo '<td><a href="/crud/ver.php?id='.$user['id'].'">Ver</a></td>'; 
                echo '</tr>';          
             endforeach;  
            ?>    
            </tr>
        </tbody>
    </table>
</body>
</html>