<?php
	require_once 'classes/usuario.php';
	session_start();
	if (!($_SESSION['usuario'] instanceof Usuario)){
		header("location: login.php");
	}

	
	echo '

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--as tags acima devem vir antes de todas as outras-->

    <link href="bootstrap377/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Codigo para o plugin jQuery de calendário-->
	<link rel="stylesheet" type="text/css" href="js/datetimepicker-master/jquery.datetimepicker.css"/ >
	
			

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
			
	<title>PAAdH: Programa de Auxilio à Administração de Hotéis</title>
	';	
?>