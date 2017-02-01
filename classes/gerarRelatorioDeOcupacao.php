<?php
	require_once'classes/gerarRelatorio.php';
	class GerarRelatorioDeOcupacao implements GerarRelatorio{	
	public function gerarRelatorio(){
		
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
	
	public function gerarRelatorioOcupacao($dataInicio , $dataFim){
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
		
		
		
		$ps1 = $pdo->prepare('SELECT h.id,
						FROM hospedagem h INNER JOIN quarto q ON h.id_quarto = q.id
						WHERE h.data_entrada = ? , h.data_saida = ? AND q.estado = ?');
		$ps1->execute(array($dataInicio, $dataFim,$estado));
		
		$quartosOcupados = count($ps1) ;
		
		$ocupacao = ($quartosOcupados * 100) / $totalQuartos;
		
		$this->gerarRelatorio();
		
		
	}
	}

?>