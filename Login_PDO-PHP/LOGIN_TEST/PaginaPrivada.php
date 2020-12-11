<?php

session_start();

if(!isset($_SESSION['id']) ){
    header("location: index.php");
}else{


?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Privada</title>
</head>
<body>

    <?php 
    
    } 
    
    ?>    
    <h1> <?php echo "Ola, ".$_SESSION['nome'];?></h1>

    <a href="sair.php"> Sair</a>

</body>
</html>