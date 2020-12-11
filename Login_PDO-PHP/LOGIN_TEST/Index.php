<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>

    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>
    <div id="corpo-center">

        <h1>Login</h1><!-- titulo -->



        <?php
        
        require_once "login.php";
               


    if( isset($_POST['btn-entrar']) ){// botao cadastrar


        // // pegando input
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        

        // // // // inserindo
        $logar = new Login();
        $logar-> logar($email,$senha);


        

    }
        
    
    ?>


        <form action="" method="post"><!-- formulario -->

            <input type="email" name="email" placeholder="Email" required="">

            <input type="password" name="senha" placeholder="Senha" required="">

            <button type="submit" name="btn-entrar"> Entrar </button><!-- botao entrar -->

            <a href="cadastro.php"> Ainda não e inscrito ? <strong>Cadastre-se agora!!</strong> </a><!-- cadastro -->

        </form>

        

    </div>

    <footer> Create by Alessandro </footer>
</body>

</html>