<?php header('Content-Type: text/html: charset=iso-8859-1')?>
<?php
	try{
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=banco','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		throw PDOException;
		die($e->getMessage());
	}

	
	$estadoQuarto = $_POST['estadoQuarto'];
	
	
	if($estadoQuarto != "todos"){
	$ps = $pdo->prepare('SELECT numeroQuarto, capacidade_de_pessoas, numeroCamas, precoPadrao
						FROM quarto
						WHERE estado = ?');
	$ps->execute(array($quartosOcupados));
	}
	else{
		$ps = $pdo->prepare('SELECT numeroQuarto, capacidade_de_pessoas, numeroCamas, precoPadrao
						FROM quarto
						WHERE 1');
		$ps->execute(array($quartosOcupados));
	}
	
	
?>

<table>
	<tbody>
		<tr>
			
			<th>Numero do Quarto</th>
			<th>Capacidade de Pessoas</th>
			<th>Numero da Camas</th>
			<th> Preço </th>
		</tr>	
		<?php 
			while($linha = mysqli_fetch_assoc($ps)){
		?>
		<tr>
			<td><?=$linha['numeroQuarto']?> </td>
			<td><?=$linha['capacidade_de_pessoas']?> </td>
			<td><?=$linha['numeroDeCamas']?> </td>
			<td> <?=$linha['precoPadrao']?></td>
		</tr>	
		<?php } ?>
	</tbody>
</table>
