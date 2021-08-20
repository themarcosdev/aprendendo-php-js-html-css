<?php

    // recebendo dados do user
    $login = $_POST['login'];
    //$senha = hash ( 'sha3-512',$_POST['senha']);
    $senha = ($_POST['senha']);


    // conectando ao banco e tratando erros
    $id = 1;
    try {
        $conectarBanco = new PDO("mysql:host=localhost;dbname=test", 'root', '');
        $statment = $conectarBanco->query("SELECT * FROM usuarios u WHERE u.login = '$login' AND u.senha = '$senha'");
        //$statment->execute(array('id' => $id));

    $resultado = $statment->fetchAll();

        if (count($resultado) > 0) {
           //print_r($resultado[0]["login"]);
            $_SESSION["login"] = $resultado['login'];
            echo "logado com sucesso";
            $_SESSION['iniciosessao'] = time();
            header("Location:logado.html");
        }
        else {
            echo "
            Usuário ou Senha incorretos
            <div class='backtoindex'>
                <a href='sair.php' onclick='Evento()'>sair</a>
                    <script>
                        function Evento(){
                            alert('Voltando a página inicial');
                                    }
                     </script>
            </div>";
                 
            //print_r( $statment);
            
        }
        // header("Location: index.php");
    } 
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }



