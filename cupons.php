<?php
// Connect to the database and check authentication
require('includes/db.php');
include("includes/auth.php");
// Import the menu
require 'menu.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Administradores</title>
	<!-- Import CSS styles -->
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/login.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/footer.css" />
	<!-- Import Font Awesome icons -->
	<script src="https://kit.fontawesome.com/3b3d3b4e96.js" crossorigin="anonymous"></script>
	<!-- Import Bootstrap JS functions -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>	
</head>

<body>
<?php
require('includes/db.php');
// If the form is submitted, insert the values into the database
if (isset($_REQUEST['username'])) {
	$username = stripslashes($_REQUEST['username']);
	// Escape special characters in a string
	$username = mysqli_real_escape_string($con, $username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con, $email);
	$nome = stripslashes($_REQUEST['nome']);
	$nome = mysqli_real_escape_string($con, $nome);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con, $password);
	$trn_date = date("Y-m-d H:i:s");
	// Insert the filled information into the table
	$query = "INSERT into `admins` (username, password, email, trn_date, nome)
	VALUES ('$username', '".md5($password)."', '$email', '$trn_date', '$nome')";
	$result = mysqli_query($con, $query);
	// If the result is successful
	if ($result) {
		echo "<div class='container'> <div class='boxsucess'>
		<h3> Administrador cadastrado com sucesso. </h3>
		<br> Clique aqui para <a href='admins.php'>voltar</a></div></div>";
	}
} else {
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
<!-- Button that opens the modal to create an administrator -->
<button type="button" class="btn btn-primary btnesp" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Criar novo administrador</button> 

<?php

$query = sprintf("SELECT * FROM admins");
// Execute the query
$result = mysqli_query($con, $query) or die();

// Transform the data into an array
$linha = mysqli_fetch_assoc($result);
// Count how many records were returned
$total = mysqli_num_rows($result);

// var_dump($linha);
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
	// If the number of results is greater than zero, show the data
	if ($total > 0) {
		// Start the loop that will show all data
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
		// End the loop that will show the data
		} while ($linha = mysqli_fetch_assoc($result));
		// End of if
	}
	?>
</table>
</div>
</body>
</html>