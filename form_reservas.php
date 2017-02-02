<div class="col-md-8 col-md-offset-2">
	<div class="reservas">
		<div class="panel panel-default">
			<div class="panel-heading">
				<form action="reservas.php" method="POST">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span class="help-block text-muted small-font">Telefone</span>
							<input type="text" class="form-control telefone" id="telefone" name="telefone">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span class="help-block text-muted small-font">Tipo de Quarto</span>
							<select class="form-control" id="tipoDeQuarto" name="tipoDeQuarto">
								<?php //adiciona os tipos de quarto baseado no banco de dados
									require_once 'classes/ColecaoTipoQuartoEmBD.php';
									
									$colecaoTipoQuarto = new ColecaoTipoQuartoEmBD();
									$arrayTipo = $colecaoTipoQuarto->getAll();
									foreach ($arrayTipo as $tipo){
										echo '<option value="'.$tipo->getId().'">'.$tipo->getNome().'</option>';
									}
								?>
							</select>
						</div>
							
					</div>
					<br>
					
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span class="help-block text-muted small-font">Data de Chegada</span>
							<input type="text" class="form-control calendario" id="dataChegada" name="dataChegada">
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span class="help-block text-muted small-font calendario">Data Prevista: Saida</span>
							<input type="text" class="form-control calendario" id="dataSaida" name="dataSaida">
						</div>
						<br>
						<br>	
					</div>
					<div class="row">
						<div class="col-md-12 pad-adjust">
							<span class="help-block text-muted small-font" style="float: left;">Nome:</span>
							<input type="text" class="form-control" id ="nome" name ="nome">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 pad-adjust">
							<span class="help-block text-muted small-font" style="float: left;">Observações:</span>
							<textarea rows="5" cols="52" class="form-control" id="observacoes" name ="observacoes"></textarea>
						</div>
					</div>
					<br>
					<div class="row" >
						<div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
							<input type="reset" class="btn btn-danger" value="CANCELAR">
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
							<input id='enviar' name='enviar' type="submit" class="btn btn-success btn-block" value="Confirmar">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

