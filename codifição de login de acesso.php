<?php
session_start();

$login = $_POST['nome'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);
$connect = mysqli_connect('localhost','root','','star');
  if (isset($entrar)) {
    $verifica = mysqli_query("SELECT * FROM usuario WHERE nome = '$login' AND senha = '$senha'");
      if (mysqli_num_rows($verifica)<=0){
        if($login==='admin' && $senha==='admin'){
		/**/
        setcookie("nome",$login);
        header("Location:admin.php");
      }else{
		setcookie("nome",$login);
        header("Location:index1.php");
	  }
	  }else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.php';</script>";
        die();
      }
  }
?>
