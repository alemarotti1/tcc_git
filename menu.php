<div class="row">
	<nav id="menuPrincipal" class="navbar nav-light bg-faded" >
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				
					<li class="nav-item active menuItem"><a class="nav-link" href="index.php" >Página Inicial</a></li>
					<!-- botão estilo dropdown para entrada e saida de hospedes -->
					<li class="dropdown">
				        <a class="dropdown-toggle menuItem" data-toggle="dropdown" href="#">Entrada e saida de hospedes <span class="caret"></span></a>
				        <ul class="dropdown-menu">
					        <li class="nav-item menuItem"><a class="nav-link" href="checkin.php">Check-in</a></li>
					        <li class="nav-item menuItem"><a class="nav-link" href="checkout.php">Check-Out</a></li>
					        <li class="nav-item menuItem"><a class="nav-link" href="reservas.php">Realizar Reservas</a></li>
					        <li class="nav-item menuItem"><a class="nav-link" href="listar_reservas.php">Listar Reservas</a></li>
				        </ul>
	      			</li>
					
					<!-- botão estilo dropdown para entrada e saida de hospedes -->
					<li class="dropdown ">
				        <a class="dropdown-toggle menuItem" data-toggle="dropdown" href="#">Controle de hospedes <span class="caret"></span></a>
				        <ul class="dropdown-menu">
					        <li class="nav-item menuItem"><a class="nav-link" href="listarhospede.php">Listar Hospedes</a></li>
					        <li class="nav-item menuItem"><a class="nav-link" href="consumo.php">Adicionar Consumo</a></li>
				        </ul>
	      			</li>
	      			<li class="dropdown">
				        <a class="dropdown-toggle menuItem" data-toggle="dropdown" href="#">Controle de Quartos <span class="caret"></span></a>
				        <ul class="dropdown-menu">
					        <li class="nav-item menuItem"><a class="nav-link" href="listarquarto.php">Listar Quartos</a></li> 
				        </ul>
	      			</li>
					
					<?php if($_SESSION['usuario']->getAdministrador()){?>
					<li class="nav-item active menuItem "><a class="nav-link" href="administracao.php">Administração</a></li>
					<?php }?>
					
					<li class="nav-item active menuItem "><a class="nav-link" href="logout.php">Logout</a></li>
					
			</ul>				
			
		</div>
	</nav>
</div>