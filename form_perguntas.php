<br>
<div class="panel panel-default">
	
<form method="POST" >
	<div class="form-group">
		<h4>Ultima procedência</h4>
		<label class="control-label col-sm-2" for="pais">Pais:</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="pais" >
		</div>
		<label class="control-label col-sm-2" for="estado">Estado:</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="estado" >
		</div>
		<label class="control-label col-sm-2" for="cidade">Cidade:</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="cidade" >
		</div>
	</div>
	
		<div class="form-group">		
				<h4>Próximo Destino</h4>
				
				<label class="control-label col-sm-2" for="pais">Pais:</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="pais" >
				</div>
				<label class="control-label col-sm-2" for="estado">Estado:</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="estado" >
				</div>
				<label class="control-label col-sm-2" for="cidade">Cidade:</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="cidade" >
				</div>
		</div>
		<div class="form-group">
			<h4>Motivo da Viagem</h4>
			<input type="checkbox" name="lazer_ferias" value="lazer_ferias"> Lazer-Ferias
			<input type="checkbox" name="negocios" value="negocios"> Negócios
			<input type="checkbox" name="congreco_feira" value="congreco_feira"> Congreço-Feira
			<input type="checkbox" name="parentes_amigos" value="parentes_amigos"> Parentes-Amigos
			<input type="checkbox" name="estudos_curso" value="estudos_curso"> Estudos-Curso
			<input type="checkbox" name="religiao" value="religiao"> Religião
			<input type="checkbox" name="saude" value="saude"> Saúde
			<input type="checkbox" name="compras" value="compras"> Compras
			<input type="checkbox" name="outros" value="outros"> Outros 
		</div>
		<div class="form-group">
			<h4>Meio de Transporte</h4>
			<input type="checkbox" name="aviao" value="aviao"> Avião
			<input type="checkbox" name="automovel" value="automovel"> Automovel
			<input type="checkbox" name="onibus" value="onibus"> Ônibus
			<input type="checkbox" name="moto" value="moto"> Moto
			<input type="checkbox" name="navio_barco" value="navio_barco"> Navio-Barco
			<input type="checkbox" name="trem" value="trem"> Trem
			<input type="checkbox" name="outro" value="outros"> Outro 
		</div>	
		
		<div class="form-group">
			<label class="control-label col-sm-2" for="numero_hospedes">Número de Hóspedes:</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="numero_hospedes" >
			</div>					
		</div>
			<br>
		
			<div class="row">
						<div class="col-md-5 col-s-5 col-xs-5">
							<span class="help-block text-muted small-font">Data de Chegada</span>
							<input type="date" class="form-control telefone">
						</div>
						
						<div class="col-md-5 col-sm-5 col-xs-5">
							<span class="help-block text-muted small-font">Data Prevista: Saida</span>
							<input type="date" class="form-control telefone">
						</div>
							
					</div>
	
		<div class="row btn-submit">
					<div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
						<input type="submit" class="btn btn-danger" value="CANCELAR">
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
						<input type="submit" class="btn btn-success btn-block" value="Confirmar">
					</div>
		</div>
</form>
</div>

<script type="text/javascript" src="js/formulario.js" ></script>
