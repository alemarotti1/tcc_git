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
		
		$totalQuartos = $ps->rowCount();
		
		$estado = 'ocupado';
		
		
		
		$ps1 = $pdo->prepare('SELECT h.id
							FROM hospedagem h 
							LEFT JOIN quarto q 
							ON h.id_quarto = q.id   
							WHERE q.estado LIKE ? AND h.data_entrada >= ? AND h.data_saida <= ? ');
		$ps1->execute(array($estado,$dataInicio, $dataFim));
		
		$quartosOcupados = $ps1->rowCount() ;
	
		
		$ocupacao = ($quartosOcupados * 100) / $totalQuartos;
		
		
		$dataI =  ( new DateTime( $dataInicio ) )->format( 'd/m/Y H:i:s' );
		$dataF = ( new DateTime( $dataFim ) )->format( 'd/m/Y H:i:s' );

		echo" <table border=2>";
		
		echo"<tr>
				<th>Periodo</th>
				<th>Porcentagem</th>
			</tr>";
		
		
		echo'<tr>',
		'<td>',$dataI , ' á ', $dataF,'</td>',
		'<td>',$ocupacao,'%','</td>',
		'</tr>'	;
		
			
		echo"</table>";
		
	}
	}

?>