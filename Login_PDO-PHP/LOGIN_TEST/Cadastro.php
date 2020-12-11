<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>
    <div id="corpo-center" style="margin-top: 8vh;">

        <h1> Cadastro</h1><!-- titulo -->

        <?php
        
            require_once "login.php";

            require_once "login.php";


        if( isset($_POST['btn-cadastrar']) ){// botao cadastrar


            // // pegando input
            $nome = addslashes($_POST['nome']);
            $sobrenome = addslashes($_POST['sobrenome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $senhaConf = addslashes($_POST['senhaConf']);
    
            // // // // inserindo
            $cadastrar = new Login();
            $cadastrar-> cadastro($nome,$sobrenome,$email,$senha,$senhaConf);


            

        }
            
        
        ?>

        <form action="" method="post">
            <!-- formulario -->

            <input type="text" name="nome" placeholder="Nome"  >

            <input type="text" name="sobrenome" placeholder="Sobrenome" >

            <input type="email" name="email" placeholder="Email" >

            <input type="password" name="senha" placeholder="Senha"  >

            <input type="password" name="senhaConf" placeholder="Confirmar Senha" >

            <button type="submit" name="btn-cadastrar"> Cadastrar </button><!-- botao cadastro -->

            <a href="index.php"> Ja sou inscrito. <strong> Fazer login!!</strong></a><!-- login -->


        </form>

        


        <footer> Create by Alessandro </footer>
    </div>
</body>

</html>