<!-- Début de session -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Forum BTS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/logo2BTS.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post" id="flogin">
					<span class="login100-form-title">Connexion</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" class="ch>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required" >
						<input class="input100" type="password" name="mdp" placeholder="Mot de passe" class="ch>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="valider" value="Valider" class="ch">
					</div>

					<div class="text-center p-t-12">
						<a class="txt2" href="#">
							Email / Mot de passe perdu ?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="inscription.php">
							Créer votre compte
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					<?php
					include("connexion.php");

					if(isset($_POST['valider']))
					{
						$email=$_POST['email'];
						$mp=$_POST['mdp'];
						$res=mysqli_query($cn,"select * from utilisateur where email_user='$email' and mdp_user='$mp'");	
						$nbr=mysqli_num_rows($res);
						if($nbr==0)
						{
							echo '<br><br>Login ou mot de passe incorrects ';
						}
						else
						{
							$data=mysqli_fetch_assoc($res);
							$_SESSION['id_user']=$data['id_user'];
							$_SESSION['pseudo']=$data['pseudo_user'];
							$_SESSION['login']=$data['email_user'];
							$_SESSION['mdp']=$data['mdp_user'];
							header("location:forum.php");
						} 
					}
					?>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>
</html>
