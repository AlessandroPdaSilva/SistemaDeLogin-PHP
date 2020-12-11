<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> home do usuario </title>
</head>
<body>
    
    <?php
        require_once "conexao_db.php";
        session_start();

        $id = $_SESSION['id_usuario'];
        $sql = "select * from usuario where id = '$id' ";
        $resultado = mysqli_query($connect,$sql);
        $dados = mysqli_fetch_array($resultado);
        mysqli_close($connect);


    ?>

    <h1> Ola <?php echo $dados['nome']; ?></h1>

    <a href="logout.php"> Sair </a>

</body>
</html>