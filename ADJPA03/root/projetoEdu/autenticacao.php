<!doctype>
<html>
    <head>
    
        <meta charset="utf-8" />
    
    </head>
</html>


<?php

if(isset($_POST['email']) && isset($_POST['senha']))
 {
     $email = $_POST['email'];
     $senha = $_POST['senha'];
     $link = mysqli_connect("127.0.0.1:3307", "root", "usbw", "site_exemplo");

        if (!$link){
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

   
    if($result = $link->query("SELECT email FROM usuario WHERE email = '$email' and senha = '$senha'"))
    {
    $row = $result->fetch_row();
    printf('usuario encontrado 0: %s', $row[0]);
    }

}
     
$minhavariavel = 2 + 2;
echo "<h2>meu arquivo</h2>";
echo $minhavariavel;
    
    
?>