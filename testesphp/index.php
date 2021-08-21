<!DOCTYPE html>
<html>

<head>
    <meta lang="pt-BR">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">

</head>

<body>
    <?php
    // controle de login por tempo;
    /*
    if (time() - $_SESSION['iniciosessao'] > 600){
            session_destroy();
    }

    */
   
    if (isset($_SESSION['usuario'])) {
        echo "
                logado
        ";
        
    } else {
        
        echo "
            <div class='cadastrodiv'>
                <form method='POST' action='cadastro.php'>
                    <h1> Cadastro </h1>
                    <label>Login:</label><input type='text' required name='login' id='login'><br>
                    <label>Senha:</label><input type='password' required name='senha' id='senha'><br>
                    <input type='submit' value='Cadastrar' id='cadastrar' name='cadastrar'>
                </form>
            </div>
            <div class='logindiv'>
                <form method='POST' action='login.php'>
                    <h1>Login</h1>
                    <label>Login:</label><input type='text' required name='login' id='login'><br>
                    <label>Senha:</label><input type='password' required name='senha' id='senha'><br>
                    <input type='submit' value='entrar' id='entrar' name='entrar'>
                </form>
            </div>
        ";
    }


?>

</body 
</html>