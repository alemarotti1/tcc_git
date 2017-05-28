<?php
	require_once'classes/gerarRelatorio.php';
	require_once 'classes/itemProduto.php';
	require_once 'classes/itemConsumo.php';
	class RelatorioProduto implements GerarRelatorio{	
	public function gerarRelatorio($dataInicio, $dataFim){
		try{
			$pdo = new PDO('mysql:host=127.0.0.1;dbname=admhotel','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		 
		
			$ps = $pdo->prepare('SELECT p.id, p.nome, SUM(ic.quantidade) AS quantidade
							FROM item_de_consumo  ic
							LEFT JOIN produto p 
							ON p.id = ic.id_produto
							WHERE ic.data_compra >= ? AND ic.data_compra <= ? 
							GROUP BY p.nome');
			$ps->execute(array($dataInicio, $dataFim));
			
		
		}catch(PDOException $e){
			die($e->getMessage());
		}		
		
		$objetos = array();
		foreach ( $ps as $linha ) {
			
			
			$obj = new ItemProduto(
					$linha['id'], $linha[ 'nome' ], $linha[ 'quantidade' ] );
			
			$objetos []= $obj;
			
			
		}	
		
		$totalProdutos = 0;
		
		foreach($objetos as $produto){
			$valor = $produto->getQuantidade();
			$totalProdutos = $valor + $totalProdutos;
		}
		
		
		
		
		
		
		
		echo' <table border=2>';
		
		echo"<tr>	
				<th>Nome do Produto</th>
				<th>Quantidade</th>
				<th>Porcentagem</th>
			</tr>";
		foreach($objetos as $produtos){
			echo'<tr>',
					'<td>',$produtos->getNome(),'</td>',
					'<td>',$produtos->getQuantidade(),'</td>';
					$porcentagem = (100 * $produtos->getQuantidade())/$totalProdutos;
				echo	'<td>',$porcentagem, ' %','</td>',
				'</tr>'	;
		} 
			
		echo"</div></table>";
		
	}
}
?>