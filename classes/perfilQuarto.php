<?php
 class PerfilQuarto{
 	
 	private $dsn = "mysql:host=127.0.0.1;dbname=admhotel;";
 	private $username = "root";
 	private $password = "";
 	private  $pdo;
 	
 	function __construct(){
 		try{
 			$this->pdo = new PDO($this->dsn, $this->username, $this->password);
 			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		}catch(PDOException $e){
 			die('<script>alert("falha ao acessar o banco de dados. Tente novamente");</script>');
 		}
 	}
 	
 	public function perfilHostel (){
 		$ps1 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Lazer-Ferias AND t.id = 1');
 		$ps1->execute();
 		$lazer_ferias = $ps1->rowCount();
 		
 		
 		
 		$ps2 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Negócios AND t.id = 1 ');
 		$ps2->execute();
 		$negocios = $ps2->rowCount();
 		
 		
 		
 		$ps3 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Congreço-Feira AND t.id = 1');
 		$ps3->execute();
 		$congreco_feira = $ps3->rowCount();
 		
 		
 		
 		$ps4 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Parentes-Amigos AND t.id = 1');
 		$ps4->execute();
 		$parentes_amigos = $ps4->rowCount();
 		
 		
 		
 		$ps5 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Estudo-Curso AND t.id = 1');
 		$ps5->execute();
 		$estudo_curso = $ps5->rowCount();
 		
 		
 		
 		$ps6 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Religião AND t.id = 1');
 		$ps6->execute();
 		$religiao = $ps6->rowCount();
 		
 		
 		
 		$ps7 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Saude AND t.id = 1');
 		$ps7->execute();
 		$saude = $ps7->rowCount();
 		
 		
 		
 		$ps8 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Compras AND t.id = 1');
 		$ps8->execute();
 		$compras = $ps8->rowCount();
 		
 		
 		
 		$ps9 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Outros AND t.id = 1');
 		$ps9->execute();
 		$outros =$ps9->rowCount();
 		
 	if($lazer_ferias>$negocios && $lazer_ferias > $congreco_feira){
 		$op1=lazer_ferias;
 	}
 	else{
 		if ($negocios>$lazer_ferias && $negocios > $congreco_feira){
 			$op1=negocios;
 			}
 		else{ $op1= congreco_feira;}
 	}
 	
 	
 	if($parentes_amigos >$estudo_curso && $parentes_amigos > $religiao){
 		$op2=parentes_amigos;
 	}
 	else{
 		if ($estudo_curso>$parentes_amigos && $estudo_curso > $religiao){
 			$op2=estudo_curso;
 		}
 		else{ $op2= religiao;}
 	}
 		
 	
 	if($saude >$compras && $saude > $outros){
 		$op3=saude;
 	}
 	else{
 		if ($compras>$saude && $compras > $outros){
 			$op3=compras;
 		}
 		else{ $op3= outros;}
 	}
 	
 	if($op1>$op2 && $op1>$op3){
 		return $op1;
 	}
 	else{
 		if($op2>$op1 && $op2 > $op3){
 			return $op2;
 		}
 		return $op3;
 	}
 	
 	}	
 	
 	
 	
 	public function perfilSolteiro (){
 		
 		
 		$pd1 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem LIKE Negócios AND t.id = 3 ');
 		$pd1->execute();
 		$lazer_ferias = $pd1->rowCount();
 		
 		
 		
 		$pd2 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Negócios AND t.id = 3 ');
 		$pd2->execute();
 		$negocios = count($pd2);
 		
 		
 		
 		$pd3 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Congreço-Feira AND t.id = 3');
 		$pd3->execute();
 		$congreco_feira = count($pd3);
 		
 		
 		
 		$pd4 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Parentes-Amigos AND t.id = 3');
 		$pd4->execute();
 		$parentes_amigos = count($pd4);
 		
 		
 		
 		$pd5 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Estudo-Curso AND t.id = 3');
 		$pd5->execute();
 		$estudo_curso = count($pd5);
 		
 		
 		
 		$pd6 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Religião AND t.id = 3');
 		$pd6->execute();
 		$religiao = count($pd6);
 		
 		
 		
 		$pd7 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Saude AND t.id = 3');
 		$pd7->execute();
 		$saude = count($pd7);
 		
 		
 		
 		$pd8 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Compras AND t.id = 3');
 		$pd8->execute();
 		$compras = count($pd8);
 		
 		
 		
 		$pd9 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Outros AND t.id = 3');
 		$pd9->execute();
 		$outros = count($pd9);
 		
 		
 		if($lazer_ferias>$negocios && $lazer_ferias > $congreco_feira){
 			$op1=lazer_ferias;
 		}
 		else{
 			if ($negocios>$lazer_ferias && $negocios > $congreco_feira){
 				$op1=negocios;
 			}
 			else{ $op1= congreco_feira;}
 		}
 		
 		
 		if($parentes_amigos >$estudo_curso && $parentes_amigos > $religiao){
 			$op2=parentes_amigos;
 		}
 		else{
 			if ($estudo_curso>$parentes_amigos && $estudo_curso > $religiao){
 				$op2=estudo_curso;
 			}
 			else{ $op2= religiao;}
 		}
 			
 		
 		if($saude >$compras && $saude > $outros){
 			$op3=saude;
 		}
 		else{
 			if ($compras>$saude && $compras > $outros){
 				$op3=compras;
 			}
 			else{ $op3= outros;}
 		}
 		
 		if($op1>$op2 && $op1>$op3){
 			return $op1;
 		}
 		else{
 			if($op2>$op1 && $op2 > $op3){
 				return $op2;
 			}
 			return $op3;
 		}
 		
 	}
 	
 	public function perfilCasal(){
 		$pr1 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Lazer-Ferias AND t.id = 2');
 		$pr1->execute();
 		$lazer_ferias = count($pr1);
 		
 		
 		
 		$pr2 = $this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Negócios AND t.id = 2 ');
 		$pr2->execute();
 		$negocios = count($pr2);
 		
 		
 		
 		$pr3 = $this->pdois->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Congreço-Feira AND t.id = 2');
 		$pr3->execute();
 		$congreco_feira = count($pr3);
 		
 		
 		
 		$pr4 = $this->pdo = $$this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Parentes-Amigos AND t.id = 2');
 		$pr4->execute();
 		$parentes_amigos = count($pr4);
 		
 		
 		$pr5 = $$this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Estudo-Curso AND t.id = 2');
 		$pr5->execute();
 		$estudo_curso = count($pr5);
 		

 		
 		$pr6 = $$this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Religião AND t.id = 2');
 		$pr6->execute();
 		$religiao = count($pr6);		
 		
 		
 		$pr7 = $$this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Saude AND t.id = 2');
 		$pr7->execute();
 		$saude = count($pr7);
 		
 		
 		$pr8 = $$this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Compras AND t.id = 2');
 		$pr8->execute();
 		$compras =count($pr8);
 		
 		
 		
 		$pr9 = $$this->pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Outros AND t.id = 2');
 		$pr9->execute();
 		$outros = count($pr9);
 		
 		
 		if($lazer_ferias>$negocios && $lazer_ferias > $congreco_feira){
 			$op1=lazer_ferias;
 		}
 		else{
 			if ($negocios>$lazer_ferias && $negocios > $congreco_feira){
 				$op1=negocios;
 			}
 			else{ $op1= congreco_feira;}
 		}
 		
 		
 		if($parentes_amigos >$estudo_curso && $parentes_amigos > $religiao){
 			$op2=parentes_amigos;
 		}
 		else{
 			if ($estudo_curso>$parentes_amigos && $estudo_curso > $religiao){
 				$op2=estudo_curso;
 			}
 			else{ $op2= religiao;}
 		}
 			
 		
 		if($saude >$compras && $saude > $outros){
 			$op3=saude;
 		}
 		else{
 			if ($compras>$saude && $compras > $outros){
 				$op3=compras;
 			}
 			else{ $op3= outros;}
 		}
 		
 		if($op1>$op2 && $op1>$op3){
 			return $op1;
 		}
 		else{
 			if($op2>$op1 && $op2 > $op3){
 				return $op2;
 			}
 			return $op3;
 		}
 		
 	}
 	
 	public function perfilDuplo(){
 		$ps1 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Lazer-Ferias AND t.id = 4');
 		$ps1->execute();
 		$lazer_ferias = count($ps1);
 		
 		
 		
 		$ps2 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Negócios AND t.id = 4 ');
 		$ps2->execute();
 		$negocios = count($ps2);
 		
 		
 		
 		$ps3 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Congreço-Feira AND t.id = 4');
 		$ps3->execute();
 		$congreco_feira = count($ps3);
 		
 		
 		
 		$ps4 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Parentes-Amigos AND t.id = 4');
 		$ps4->execute();
 		$parentes_amigos = count($ps4);
 		
 		
 		
 		$ps5 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Estudo-Curso AND t.id = 4');
 		$ps5->execute();
 		$estudo_curso = count($ps5);
 		
 		
 		
 		$ps6 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Religião AND t.id = 4');
 		$ps6->execute();
 		$religiao = count($ps6);
 		
 		
 		
 		$ps7 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Saude AND t.id = 4');
 		$ps7->execute();
 		$saude = count($ps7);
 		
 		
 		
 		$ps8 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Compras AND t.id = 4');
 		$ps8->execute();
 		$compras = count($ps8);
 		
 		
 		
 		$ps9 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Outros AND t.id = 4');
 		$ps9->execute();
 		$outros = count($ps9);
 		
 		
 		
 		
 		
 		if($lazer_ferias>$negocios && $lazer_ferias > $congreco_feira){
 			$op1=lazer_ferias;
 		}
 		else{
 			if ($negocios>$lazer_ferias && $negocios > $congreco_feira){
 				$op1=negocios;
 			}
 			else{ $op1= congreco_feira;}
 		}
 		
 		
 		if($parentes_amigos >$estudo_curso && $parentes_amigos > $religiao){
 			$op2=parentes_amigos;
 		}
 		else{
 			if ($estudo_curso>$parentes_amigos && $estudo_curso > $religiao){
 				$op2=estudo_curso;
 			}
 			else{ $op2= religiao;}
 		}
 			
 		
 		if($saude >$compras && $saude > $outros){
 			$op3=saude;
 		}
 		else{
 			if ($compras>$saude && $compras > $outros){
 				$op3=compras;
 			}
 			else{ $op3= outros;}
 		}
 		
 		if($op1>$op2 && $op1>$op3){
 			return $op1;
 		}
 		else{
 			if($op2>$op1 && $op2 > $op3){
 				return $op2;
 			}
 			return $op3;
 		}
 	}
 	
 	public function perfilTriplo(){
 		$ps1 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Lazer-Ferias AND t.id = 5');
 		$ps1->execute();
 		$lazer_ferias = count($ps1);
 		
 		
 		
 		$ps2 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Negócios AND t.id = 5');
 		$ps2->execute();
 		$negocios = count($ps2);
 		
 		
 		
 		$ps3 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Congreço-Feira AND t.id = 5');
 		$ps3->execute();
 		$congreco_feira = count($ps3);
 		
 		
 		
 		$ps4 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Parentes-Amigos AND t.id = 5');
 		$ps4->execute();
 		$parentes_amigos = count($ps4);
 		
 		
 		
 		$ps5 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Estudo-Curso AND t.id = 5');
 		$ps5->execute();
 		$estudo_curso = count($ps5);
 		
 		
 		
 		$ps6 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Religião AND t.id = 5');
 		$ps6->execute();
 		$religiao = count($ps6);
 		
 		
 		
 		$ps7 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Saude AND t.id = 5');
 		$ps7->execute();
 		$saude = count($ps7);
 		
 		
 		
 		$ps8 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Compras AND t.id = 5');
 		$ps8->execute();
 		$compras = count($ps8);
 		
 		
 		
 		$ps9 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Outros AND t.id = 5');
 		$ps9->execute();
 		$outros = count($ps9);
 		
 		
 		
 		if($lazer_ferias>$negocios && $lazer_ferias > $congreco_feira){
 			$op1=lazer_ferias;
 		}
 		else{
 			if ($negocios>$lazer_ferias && $negocios > $congreco_feira){
 				$op1=negocios;
 			}
 			else{ $op1= congreco_feira;}
 		}
 		
 		
 		if($parentes_amigos >$estudo_curso && $parentes_amigos > $religiao){
 			$op2=parentes_amigos;
 		}
 		else{
 			if ($estudo_curso>$parentes_amigos && $estudo_curso > $religiao){
 				$op2=estudo_curso;
 			}
 			else{ $op2= religiao;}
 		}
 			
 		
 		if($saude >$compras && $saude > $outros){
 			$op3=saude;
 		}
 		else{
 			if ($compras>$saude && $compras > $outros){
 				$op3=compras;
 			}
 			else{ $op3= outros;}
 		}
 		
 		if($op1>$op2 && $op1>$op3){
 			return $op1;
 		}
 		else{
 			if($op2>$op1 && $op2 > $op3){
 				return $op2;
 			}
 			return $op3;
 		}
 		
 		
 	}
 	
 	public function perfilQuintuplo(){
 		$ps1 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Lazer-Ferias AND t.id = 6');
 		$ps1->execute();
 		$lazer_ferias = count($ps1);
 		
 		
 		
 		$ps2 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Negócios AND t.id = 6 ');
 		$ps2->execute();
 		$negocios = count($ps2);
 		
 		
 		
 		$ps3 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Congreço-Feira AND t.id = 6');
 		$ps3->execute();
 		$congreco_feira = count($ps3);
 		
 		
 		
 		$ps4 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Parentes-Amigos AND t.id = 6');
 		$ps4->execute();
 		$parentes_amigos = count($ps4);
 		
 		
 		
 		$ps5 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Estudo-Curso AND t.id = 6');
 		$ps5->execute();
 		$estudo_curso = count($ps5);
 		
 		
 		
 		$ps6 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Religião AND t.id = 6');
 		$ps6->execute();
 		$religiao = count($ps6);
 		
 		
 		
 		$ps7 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Saude AND t.id = 6');
 		$ps7->execute();
 		$saude = count($ps7);
 		
 		
 		
 		$ps8 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Compras AND t.id = 6');
 		$ps8->execute();
 		$compras = count($ps8);
 		
 		
 		
 		$ps9 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Outros AND t.id = 6');
 		$ps9->execute();
 		$outros = count($ps9);
 		
 		
 		if($lazer_ferias>$negocios && $lazer_ferias > $congreco_feira){
 			$op1=lazer_ferias;
 		}
 		else{
 			if ($negocios>$lazer_ferias && $negocios > $congreco_feira){
 				$op1=negocios;
 			}
 			else{ $op1= congreco_feira;}
 		}
 		
 		
 		if($parentes_amigos >$estudo_curso && $parentes_amigos > $religiao){
 			$op2=parentes_amigos;
 		}
 		else{
 			if ($estudo_curso>$parentes_amigos && $estudo_curso > $religiao){
 				$op2=estudo_curso;
 			}
 			else{ $op2= religiao;}
 		}
 			
 		
 		if($saude >$compras && $saude > $outros){
 			$op3=saude;
 		}
 		else{
 			if ($compras>$saude && $compras > $outros){
 				$op3=compras;
 			}
 			else{ $op3= outros;}
 		}
 		
 		if($op1>$op2 && $op1>$op3){
 			return $op1;
 		}
 		else{
 			if($op2>$op1 && $op2 > $op3){
 				return $op2;
 			}
 			return $op3;
 		}
 		
 	}
 	
 	public function perfilCasalSolteiro(){
 		$ps1 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Lazer-Ferias AND t.id = 7');
 		$ps1->execute();
 		$lazer_ferias = count($ps1);
 		
 		
 		
 		$ps2 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Negócios AND t.id = 7 ');
 		$ps2->execute();
 		$negocios = count($ps2);
 		
 		
 		
 		$ps3 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Congreço-Feira AND t.id = 7');
 		$ps3->execute();
 		$congreco_feira = count($ps3);
 		
 		
 		
 		$ps4 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Parentes-Amigos AND t.id = 7');
 		$ps4->execute();
 		$parentes_amigos = count($ps4);
 		
 		
 		
 		$ps5 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Estudo-Curso AND t.id = 7');
 		$ps5->execute();
 		$estudo_curso = count($ps5);
 		
 		
 		
 		$ps6 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Religião AND t.id = 7');
 		$ps6->execute();
 		$religiao = count($ps6);
 		
 		
 		
 		$ps7 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Saude AND t.id = 7');
 		$ps7->execute();
 		$saude = count($ps7);
 		
 		
 		
 		$ps8 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Compras AND t.id = 7');
 		$ps8->execute();
 		$compras = count($ps8);
 		
 		
 		
 		$ps9 = $pdo->prepare('SELECT h.id
							FROM hospedagem h INNERJOIN quarto q ON h.id_quarto = q.id INNERJOIN tipo_quarto t ON q.id_tipo_quarto = t.id
							WHERE h.motivo_da_viagem = Outros AND t.id = 7');
 		$ps9->execute();
 		$outros = count($ps9);
 		
 		
 		if($lazer_ferias>$negocios && $lazer_ferias > $congreco_feira){
 			$op1=lazer_ferias;
 		}
 		else{
 			if ($negocios>$lazer_ferias && $negocios > $congreco_feira){
 				$op1=negocios;
 			}
 			else{ $op1= congreco_feira;}
 		}
 		
 		
 		if($parentes_amigos >$estudo_curso && $parentes_amigos > $religiao){
 			$op2=parentes_amigos;
 		}
 		else{
 			if ($estudo_curso>$parentes_amigos && $estudo_curso > $religiao){
 				$op2=estudo_curso;
 			}
 			else{ $op2= religiao;}
 		}
 			
 		
 		if($saude >$compras && $saude > $outros){
 			$op3=saude;
 		}
 		else{
 			if ($compras>$saude && $compras > $outros){
 				$op3=compras;
 			}
 			else{ $op3= outros;}
 		}
 		
 		if($op1>$op2 && $op1>$op3){
 			return $op1;
 		}
 		else{
 			if($op2>$op1 && $op2 > $op3){
 				return $op2;
 			}
 			return $op3;
 		}
 		
 	}
 }
 ?>