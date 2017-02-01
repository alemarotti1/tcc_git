<?php
	require_once'classes/produto.php';
	require_once 'colecaoProduto.php';
	class colecaoProdutoEmBD implements colecaoProduto {
		public $pdo;
		
		function __construct(){
			try{
				$this->pdo = new PDO('mysql:host=127.0.0.1;dbname= admhotel', 'root', "");
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		
		public function adicionarProduto(produto $produto){
				$ps = $this->pdo->prepare('INSERT INTO produto (nome,preco) VALUES (?,?)');
				$ps->execute(array($produto->getNome(), $produto->getPreco()));
				$produto->setId( $this->pdo->lastInsertId() );
		}
		
		public function remover($id){
			$ps = $this->pdo->prepare('DELETE FROM produto WHERE id=?');
			$ps->execute(array($id));
		}
		
		public function editar(produto $produto){
			$ps = $this->pdo->prepare('UPDATE produto SET nome = ?, preco=? WHERE id=? ');
			$ps->execute(array($produto->getNome(),$produto->getPreco(),$produto->getID()));
		}
		
		public function selecionar($id){
			$ps = $this->pdo->prepare('SELECT * FROM produto WHERE  id=?');
			$ps->execute(array($parametro));
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Produto($linha[ 'id' ], $linha[ 'nome' ], $linha[ 'preco' ]);
				$objetos []= $obj;
			
			}
			return $objetos;
		}
		
		public function selecionar($nome){
			$ps = $this->pdo->prepare('SELECT * FROM produto WHERE  nome = LIKE ?');
			$ps->execute(array('%'.$nome.'%'));
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Produto(	$linha[ 'id' ], $linha[ 'nome' ], $linha[ 'preco' ]);
				$objetos []= $obj;
					
			}
			return $objetos;
		}
		
		public function selecionarTudo(){
			$ps = $this->pdo->prepare('SELECT * FROM produto WHERE 1');
			$ps->execute();
			$objetos = array();
			foreach ( $ps as $linha ) {
				$obj = new Produto($linha[ 'id' ], $linha[ 'nome' ], $linha[ 'preco' ] );
				$objetos []= $obj;
			}
			return $objetos;
		}
	}		
?>
