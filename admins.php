<?php
// Conectar ao banco de dados e verificar se está autenticado
	require('includes/db.php');
	include("includes/auth.php");
// Importa o menu
	require 'menu.php'
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Administradores</title>
<!-- Importa os estilos de CSS -->
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/login.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
<!-- Importar os ícones do Font Awesome -->
		<script src="https://kit.fontawesome.com/3b3d3b4e96.js" crossorigin="anonymous"></script>
<!-- Importa as funções .js do bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>	
	</head>

	<body>
<?php
	require('includes/db.php');
// Se o formulário for enviado, insira os valores no banco de dados.
		if (isset($_REQUEST['username'])){
			$username = stripslashes($_REQUEST['username']);
// Escapa caracteres especiais em uma string.
			$username = mysqli_real_escape_string($con,$username); 
			$email = stripslashes($_REQUEST['email']);
			$email = mysqli_real_escape_string($con,$email);
			$nome = stripslashes($_REQUEST['nome']);
			$nome = mysqli_real_escape_string($con,$nome);
			$password = stripslashes($_REQUEST['password']);
			$password = mysqli_real_escape_string($con,$password);
			$trn_date = date("Y-m-d H:i:s");
// Faz o insert das informções preenchidas na tabela.
				$query = "INSERT into `admins` (username, password, email, trn_date, nome)
				VALUES ('$username', '".md5($password)."', '$email', '$trn_date', '$nome')";
			$result = mysqli_query($con,$query);
// Se o resultado
				if($result){
					echo "<div class='container'> <div class='boxsucess'>
					<h3> Administrador cadastrado com sucesso. </h3>
					<br> Clique aqui para <a href='admins.php'>voltar</a></div></div>";
				}
				}else{
?>

		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Criar novo administrador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="registration" action="" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" name="nome" placeholder="digite aqui..." required />
          </div>
          <div class="mb-3">
		  	<label for="recipient-name" class="col-form-label">Usuário:</label>
            <input type="text" name="username" placeholder="digite aqui..." required />
          </div>
		  <div class="mb-3">
		  	<label for="recipient-name" class="col-form-label">E-mail:</label>
            <input type="email" name="email" placeholder="digite aqui..." required />
          </div>
		  <div class="mb-3">
		  	<label for="recipient-name" class="col-form-label">Senha:</label>
            <input type="password" name="password" placeholder="digite aqui..." required />
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="submit" value="Criar conta" class="btn btn-primary">Criar</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
	<div class="form2">
	<br>
	<!-- Botão que abre o modal para criar administrador -->
	<button type="button" class="btn btn-primary btnesp" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Criar novo administrador</button> 

<?php

$query = sprintf("SELECT * FROM admins");
// executa a query
$result = mysqli_query($con,$query) or die();

// transforma os dados em um array
$linha = mysqli_fetch_assoc($result);
// calcula quantos dados retornaram
$total = mysqli_num_rows($result);

//var_dump($linha);
?>

		<table class="table table-sm">
		<thead>
			<tr>
				<th scope="col"> ID </th>
				<th scope="col"> Usuário </th>
				<th scope="col"> E-mail </th>
				<th scope="col"> Criado em</th>
				<th scope="col"> Nome</th>
			</tr>
		</thead>
		<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
?>

		<tbody>
		<tr>
			<td> <?=$linha['id']?> </td> 
			<td> <?=$linha['username']?> </td> 
			<td> <?=$linha['email']?> </td> 
			<td> <?=$linha['trn_date']?> </td> 
			<td> <?=$linha['nome']?></td>
		</tr>
		</tbody>
		
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($result));
	// fim do if
	}
?>
</table>
</div>
</body>
</html>