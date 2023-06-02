<?php
session_start();
?>
<html>
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

				<form action="" method="post" id="inscription" enctype="multipart/form-data">
					<span class="login100-form-title">Inscription</span>
          <!--email-->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" required="required">
						<input class="input100" type="text" name="email" placeholder="Email" class="ch">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
          <!--pseudo-->
					<div class="wrap-input100 validate-input" data-validate = "" required="required">
						<input class="input100" type="text" name="pseudo" placeholder="Pseudo" class="ch">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
          <!--mdp-->
					<div class="wrap-input100 validate-input" data-validate ="Password is required" required="required">
						<input class="input100" type="password" name="mp1" placeholder="Mot de passe" class="ch">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
          <!--confirm mdp-->
					<div class="wrap-input100 validate-input" data-validate ="Password is required" required="required" >
						<input class="input100" type="password" name="mp2" placeholder="Confirmer le mot de passe" class="ch">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
          <!--Avatar-->
					<div class="wrap-input100 validate-input" data-validate ="Password is required" required="required" >
						<input class="input100" type="file" name="photo" class="ch">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <!--validation-->
					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="valider" value="Valider" class="ch">
					</div>
					
					<?php
          include("connexion.php");

          if(isset($_POST['valider']))
          {
            $pseudo=$_POST['pseudo'];
            $email=$_POST['email'];
            $mp1=$_POST['mp1'];
            $mp2=$_POST['mp2'];

          if($mp1==$mp2)
          {
            $mp=sha1($mp1);
            $res=mysqli_query($cn,"insert into utilisateur values (NULL,'$pseudo','$mp1','$email')");  

          $id=mysqli_insert_id($cn);
          $photo="$id.jpg";

          move_uploaded_file($_FILES['photo']['tmp_name'], "assets/images/$photo");
          echo 'Inscription réussie !!!';
          header("location:index.php");
          }
          else
            echo 'les mots de passe ne sont pas identiques ';

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

