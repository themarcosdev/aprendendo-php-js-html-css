<?php

// recebendo dados do user
$login = $_POST['login'];
//$senha = hash ( 'sha3-512',$_POST['senha']);
$senha = ($_POST['senha']);


// conectando ao banco e tratando erros
$id = 1;
try {
  	$conectarBanco = new PDO("mysql:host=localhost;dbname=test", 'root', '');
  	$statment = $conectarBanco->query("INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')");
  	//$statment->execute(array('id' => $id));

  $resultado = $statment->fetchAll();

  	if (count($resultado) ) {
		foreach ($resultado as $row) {
			echo "
				<div>
					<h1>nome:". $row["login"]  ."</h1>
					<h1>senha:". $row["senha"]  ."</h1>
				</div>
			";

		}
  	}
	else {
    // echo "Nenhum resultado retornado.<br>";
    	print_r($resultado);
  	}
} 
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

// verificando se o login é vazio ou nulo
if($login == "" || $login == null){
  echo"<script language='javascript' type='text/javascript'>
  alert('O campo login deve ser preenchido');window.location.href='
  index.php';</script>";
}else{
  if($resultado == $login){

    echo"<script language='javascript' type='text/javascript'>
    alert('Esse login já existe');window.location.href='
    index.php';</script>";
    die();
  }else{
    $query = "INSERT INTO usuarios ('login','senha') VALUES ('$login','$senha')";
   
    if($statment){
        echo"<script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!');window.location.
        href='index.php'</script>";
        
    }else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse usuário');window.location
        .href='index.php'</script>";
    }
  }
}





?>