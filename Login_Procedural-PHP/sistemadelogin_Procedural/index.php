<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> html,body{ background: rgb(201,201,201);}</style>
    <title> Meu sistema de login</title>
</head>
<body>
    
    <form action="" method="post" >

        <h1> Login </h1>

        <!-- login -->
        Login : <input type="text" name="login"><br>

        <!-- senha -->
        Senha : <input type="password" name="senha" ><br>

        <!-- entrar -->
        <button type="submit" name="entrar"> Entrar </button><br>

    </form>


    <?php
        require_once "conexao_db.php";
        session_start();
    
        if( isset( $_POST['entrar']) ){// verifica botao entrar
            
            $login = mysqli_escape_string($connect, $_POST['login']);
            $senha = mysqli_escape_string($connect, $_POST['senha']);

            if( empty($login) || empty($senha) ){// verifica login e senha vazio
                echo " preencha login e senha ";
            }else{

                $sql = "select login from usuario where login = '$login' ";
                $resultado = mysqli_query($connect,$sql);

                if( mysqli_num_rows($resultado) > 0){// verifica login

                    $senha = md5($senha);
                    $sql = " select * from usuario where login = '$login' and senha = '$senha' ";
                    $resultado = mysqli_query($connect,$sql);

                    if( mysqli_num_rows($resultado) == 1 ){// verifica login e senha

                        $dados = mysqli_fetch_array($resultado);
                        $_SESSION['id_usuario'] = $dados['id'];
                        mysqli_close($connect);
                        header("location: home.php");

                    }else{
                        echo "senha incorreta";
                    }



                }else{
                    echo " usuario nao existe ";
                }

                


            }

        }


    
    ?>

</body>
</html>