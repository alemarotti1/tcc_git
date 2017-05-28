<?php
	require_once'classes/gerarRelatorio.php';
	class RelatorioDeOcupacao implements GerarRelatorio{	
		
	
	
	public function gerarRelatorio($dataInicio , $dataFim){
		try{
			$pdo = new PDO('mysql:host=127.0.0.1;dbname=admhotel','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			throw PDOException;
			die($e->getMessage());
		}
		
		$ps = $pdo->prepare('SELECT id 	FROM quarto WHERE 1');
		$ps->execute();
		
		$totalQuartos = count($ps);
		$estado = 'ocupado';
		
		
		
		$ps1 = $pdo->prepare('SELECT h.id
						FROM hospedagem h 
						LEFT JOIN quarto q 
						ON q.id = h.id_quarto 
						WHERE q.estado = ?, h.data_entrada >= ? AND h.data_saida <= ? ');
		$ps1->execute(array($estado,$dataInicio, $dataFim));
		
		$quartosOcupados = count($ps1) ;
		
		$ocupacao = ($quartosOcupados * 100) / $totalQuartos;
		
		


		echo" <table border=2>";
		
		echo"<tr>
				<th>Periodo</th>
				<th>Porcentagem</th>
			</tr>";
		
		
		echo'<tr>',
		'<td>',$dataInicio, 'á', $dataFim,'</td>',
		'<td>',$ocupacao,'%','</td>',
		'</tr>'	;
		
			
		echo"</table>";
		
	}
	}

?>