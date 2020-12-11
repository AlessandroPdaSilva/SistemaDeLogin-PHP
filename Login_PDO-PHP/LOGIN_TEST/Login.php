<?php

require_once "Conexao.php";


class Login
{


    public function cadastro($nome, $sobrenome, $email, $senha, $senhaConf)
    {


        if (empty($nome) || empty($sobrenome) || empty($email) || empty($senha) || empty($senhaConf)) {
            // campo vazio
        } else {

            $sql = "SELECT * FROM usuario WHERE email = :e";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":e", $email);

            $stmt->execute();

            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($dados) > 0) { // email ja existe
                echo '<div id="alert">email já cadastrado</div>';
            } else { // email nao existe


                if ($senha == $senhaConf) { //confirma senha

                    $senha = md5($senha); // crip senha

                    $sql = "INSERT INTO usuario (nome,sobrenome,email,senha) VALUES (?,?,?,?)";
                    $stmt = Conexao::getConexao()->prepare($sql);
                    $stmt->bindValue(1, $nome);
                    $stmt->bindValue(2, $sobrenome);
                    $stmt->bindValue(3, $email);
                    $stmt->bindValue(4, $senha);

                    $stmt->execute();
                    echo '<div id="alert">cadastrado com sucesso</div>';
                } else {

                    echo '<div id="alert">senha incorreta !! Confirme a senha </div>';
                }
            }
        }
    }


    public function logar($email, $senha)
    {

        if (empty($email) || empty($senha)) {// campo vazio
            
            echo "preencha o email e a senha ";

        } else {// campo cheio 
            

            // query
            $sql = "SELECT * FROM usuario WHERE email = ?";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $email);

            $stmt->execute();

            $dados = $stmt->fetchALL(PDO::FETCH_ASSOC);


            if (count($dados) > 0) { // email correto

                $senha = md5($senha); // crip senha

                // query
                $sql = "SELECT senha FROM usuario WHERE email = ?";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(1, $email);

                $stmt->execute();

                $dados = $stmt->fetch(PDO::FETCH_ASSOC);



                if ($senha == $dados['senha']) { // senha correta
                    
                    // query
                    $sql = "SELECT * FROM usuario WHERE email = ?";
                    $stmt = Conexao::getConexao()->prepare($sql);
                    $stmt->bindValue(1, $email);

                    $stmt->execute();

                    $dadosAll = $stmt->fetch(PDO::FETCH_ASSOC);

                    // session
                    session_start();
                    $_SESSION['id'] = $dadosAll['id'];
                    $_SESSION['nome'] = $dadosAll['nome'];
                    $_SESSION['sobrenome'] = $dadosAll['sobrenome'];
                    $_SESSION['email'] = $dadosAll['email'];

                    
                    header("location: PaginaPrivada.php");

                } else { // senha incorreta
                    echo '<div id="alert">senha incorreta !!</div>';
                }
            } else { // email incorreto
                echo ' <div id="alert">conta não cadastrada !!</div>';
            }
        }
    }
}
