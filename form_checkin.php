<br>
<?php //adiciona os tipos de quarto baseado no banco de dados
	require_once 'classes/ColecaoTipoQuartoEmBD.php';
	
	$colecaoTipoQuarto = new ColecaoTipoQuartoEmBD();
	$arrayTipo = $colecaoTipoQuarto->getAll();
?>
<script>
	<?php /*echo 'var obj={"tipo:"[';
		foreach ($arrayTipo as $tipo){
			echo '{"id":"'.$tipo->getId	().'", "nome":"'.$tipo->getNome().'", "valor":"'.$tipo->getValor().'"}';
		}echo "]};";*/
	?>
</script>
<div class="panel panel-default">
	<form method="POST" action="checkin.php" id="formularioCheckIn">
		<div class="panel-heading">
			<div class="row" style="margin: auto;">
				<div class="col-md-5">
					<p class="tituloAgenda">Quartos Disponíveis</p>
					<select class="form-control" id="tipoQuarto" name="tipoQuarto">
	        			<option>Tipo de Quarto</option>
	        			<?php //adiciona os tipos de quarto baseado no banco de dados
							foreach ($arrayTipo as $tipo){
								echo '<option value="'.$tipo->getId().'">'.$tipo->getNome().'</option>';
							}
						?>
	      			</select>
					<select class="form-control" id="quartosDisponiveis" name="idQuarto">
	        			<option>Quartos Disponíveis</option>
	      			</select>
				</div>
				<div class="col-md-2">
					
				</div>
				
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span class="help-block text-muted small-font">CPF:</span>
							<input type="text" class="form-control cpf" id="cpf" name="cpf" />
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<span class="help-block text-muted small-font">&nbsp;</span>
							<button class="btn btn-success"
								id="pesquisar"
								>Pesquisar
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	
	
			<div class="form-group">
				<label class="control-label col-sm-2" for="nome">Nome Completo:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="nome" name="nome" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="telefone">Telefone:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="telefone" name="telefone">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="profissao">Profissão:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="profissao" name="profissao">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="nacionalidade">Nacionalidade:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="nacionalidade" name="nacionalidade">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="nascimento">Data de Nascimento:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="nascimento" name="nascimento" placeholder="__/__/____">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="identidade">Identidade:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="identidade" name="identidade" placeholder="RG ou Passaporte">
				</div>
			</div>
			<div class="form-inline">
				<div class="controls-row">
					<label class="control-label col-sm-2">Sexo</label>
					<label class="radio inline">
						<input type="radio" name="sexo" value="M"/> Masculino&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="sexo" value="F"> Feminino&nbsp; &nbsp;
					</label>
				</div>
			</div>
			<div class="form-group">
				<br>
				<label class="control-label col-sm-2" for="cep">CEP:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="cep" name="cep">
				</div>
			</div>	
			<div class="form-group">
				<label class="control-label col-sm-2" for="endereco">Endereço Completo:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="endereco" name="endereco">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="cidade">Cidade:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="cidade" name="cidade" >
				</div>
			</div>	
			<div class="form-group">
				<label class="control-label col-sm-2" for="estado">Estado:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="estado" name="estado">
				</div>
			</div>	
			<div class="form-group">
				<label class="control-label col-sm-2" for="pais">País:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="pais" name="pais">
					<br>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="ultimaProcedencia">Ultima Procedência:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="ultimaProcedencia" name="ultimaProcedencia" placeholder="De onde o hospede veio">
				</div>
			</div>	
			<div class="form-group">
				<label class="control-label col-sm-2" for="proximoDestino">Próximo Destino:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control input-sm" id="proximoDestino" name="proximoDestino" placeholder="Para onde o hóspede vai">
					<br><br>
				</div>
			</div>
			
			<div class="form-inline">
				<div class="controls-row">
					<label class="control-label col-sm-2">Motivo da viagem</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem" value="lazer_ferias"/> Lazer-Ferias&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem" value="negocios"> Negócios&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem" value="congreco_feira"> Congreço-Feira&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem" value="parentes_amigos"> Parentes-Amigos&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem" value="estudos_curso"> Estudos-Curso&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem" value="religiao"> Religião&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem" value="saude"> Saúde&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem"  value="compras"> Compras&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="motivoViagem" value="outros"> Outros	&nbsp; &nbsp;
					</label>
					
				</div>
			</div>
			<br>
			<div class="form-inline">
				<div class="controls-row">
					<label class="control-label col-sm-2">Meio de transporte</label>
					<label class="radio inline">
						<input type="radio" name="transporte" value="aviao"> Avião&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="transporte" value="automovel"> Automovel&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="transporte" value="onibus"> Ônibus&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="transporte" value="moto"> Moto&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="transporte" value="navio_barco"> Navio-Barco&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="transporte" value="trem"> Trem&nbsp; &nbsp;
					</label>
					<label class="radio inline">
						<input type="radio" name="transporte" value="outros"> Outros	&nbsp; &nbsp;
					</label>
					
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<span class="help-block text-muted small-font"><b>Data de Chegada</b></span>
					<input type="text" class="form-control calendario" id="dataChegada" name="dataChegada" autocomplete="off">
				</div>
				
				<div class="col-md-6 col-sm-6 col-xs-6">
					<span class="help-block text-muted small-font calendario"><b>Data Prevista: Saida</b></span>
					<input type="text" class="form-control calendario" id="dataSaida" name="dataSaida" autocomplete="off">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<span class="help-block text-muted small-font"><b>Numero De Hospedes</b></span>
					<input type="number" class="form-control" id="numeroDeHospedes" name="numeroDeHospedes" autocomplete="off">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<span class="help-block text-muted small-font"><b>Valor da diaria</b></span>
					<input type="text" class="form-control" placeholder="___.__" id="valorDaDiaria" name="valorDaDiaria" autocomplete="off">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<span class="help-block text-muted small-font"><b>Valor pago</b></span>
					<input type="text" class="form-control" placeholder="___.__" id="valorPago" name="valorPago" autocomplete="off">
				</div>
			</div>
	
			<br><br>
			<br><br>
			<br><br>
			<div class="row btn-submit">
						<div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
							<input type="submit" class="btn btn-danger" value="CANCELAR">
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
							<input type="submit" class="btn btn-success btn-block" id="confirmar" name="confirmar" value="Confirmar" />
						</div>
			</div>
		</form>
</div>



