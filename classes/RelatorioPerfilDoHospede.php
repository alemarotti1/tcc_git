<?php
	require_once'classes/gerarRelatorio.php';
	require_once 'classes/perfilQuarto.php';
	class RelatorioPerfilDoHospede implements GerarRelatorio{			
	public function gerarRelatorio($dataInicio, $dataFim){
		try{
			$pdo = new PDO('mysql:host=127.0.0.1;dbname=banco','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			throw PDOException;
			die($e->getMessage());
		}
		
		$perfil = new PerfilQuarto();		
		$solteiro = $perfil->perfilSolteiro();
		$casal = $perfil->perfilCasal();
		$hostel = $perfil->perfilHostel();
		$duplo = $perfil->perfilDuplo();
		$triplo = $perfil->perfilTriplo();
		$quintuplo = $perfil->perfilQuintuplo();		
		$casal_solteiro = $perfil->perfilCasalSolteiro();
		
		$ps = $pdo->prepare('SELECT 
						FROM 
						WHERE ');
		$ps->execute(array());
		
		echo" <table border=2>";
		
		echo"
			<tr>
				<th> Tipo De Quarto</th>
				<th>Motivo da Viagem</th>
				
			</tr>";
		
		
		echo'<tr>',
				'<td>','Hostel','</td>',
				'<td>',$hostel,'</td>',				
			'</tr>',
			'<tr>',
				'<td>','Casal','</td>',
				'<td>',$casal,'</td>',
			'</tr>',
			'<tr>',
				'<td>','Solteiro','</td>',
				'<td>',$solteiro,'</td>',
			'</tr>',
			'<tr>',
				'<td>','Duplo','</td>',
				'<td>',$duplo,'</td>',
			'</tr>',
			'<tr>',
				'<td>','Triplo','</td>',
				'<td>',$triplo,'</td>',
			'</tr>',
			'<tr>',
				'<td>','Quintuplo','</td>',
				'<td>',$quintuplo,'</td>',
			'</tr>',
			'<tr>',
				'<td>','Casal+Solteiro','</td>',
				'<td>',$casal_solteiro,'</td>',
		'</tr>'	;
		
			
		echo"</table>";
		
	}
}
?>

