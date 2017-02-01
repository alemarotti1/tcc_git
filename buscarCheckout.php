<?php header('Content-Type: text/html: charset=iso-8859-1')?>
<?php
	try{
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=banco','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		throw PDOException;
		die($e->getMessage());
	}

	
	$quartosOcupados = $_POST['quartosOcupados'];
	
	
	
	$ps = $pdo->prepare('SELECT o.nome, h.data_entrada, h.dataSaida, h.valor 
						FROM hospedagem  h INNER JOIN hospede o INNER JOIN h.id_hospede = o.id INNER JOIN quarto q ON h.id_quarto = q.id
						WHERE q.numeroQuarto = ?');
	$ps->execute(array($quartosOcupados));
	
	
?>

<table>
	<tbody>
		<tr>
			
			<th> Nome</th>
			<th> Data de Entrada</th>
			<th> Data de Saida</th>
			<th> Valor</th>
		</tr>	
		<?php 
			while($linha = mysqli_fetch_assoc($ps)){
		?>
		<tr>
			<td><?=$linha['nome ']?> </td>
			<td><?=$linha['data_entrada ']?> </td>
			<td><?=$linha['dataSaida']?> </td>
			<td> <?=$linha['valor']?></td>
		</tr>	
		<?php } ?>
	</tbody>
</table>