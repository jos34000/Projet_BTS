<!-- Début de sesssion personnel + connection base de données -->
<?php
session_start();
if(isset($_SESSION['login']) and isset($_SESSION['mdp']))
{
  include("connexion.php");
?>

<html>
<head>
	<title>Forum</title>
  <meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/styles_forum.css">
  <script src="assets/js/app.js"></script>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Fil d'actualité</h1>
      <div class="logout-container">
        <a class="logout-button" href="logout.php">Déconnexion</a>
      </div>
    </div>
    <div class="nav-bar">
      <div class="search-input">
        <input type="text" id="search-input" placeholder="Rechercher" oninput="filterArticles()"/>
        <button><img src="search-icon.png" alt="Search" /></button>
      </div>
      <div class="mode-toggle-container">
        <span class="mode-indicator" id="mode-indicator">Mode clair</span>
        <div class="mode-toggle" id="mode-toggle" onclick="toggleDarkMode()">
          <span class="toggle-button"></span>
        </div>
      </div>
    </div>
    <?php
   // Flux de messages

    $res=mysqli_query($cn,"select * from utilisateur,message where utilisateur.id_user=message.id_user order by id_message DESC"); 
    while($data=mysqli_fetch_assoc($res))
    {
      echo '<div class="message"><img src="assets/images/'.$data['id_user'].'.png" class="photo" width="30px" height="30px">';
      echo $data['pseudo_user'].' a posté le : '.$data['date_message'];
      echo '<br>'.$data['texte_message'].'</div>';
    }
  ?>


  <!--Envoie des messages -->
  <div class="submit-form">
  <h2>Écrire un nouvel article :</h2>
  <form action="#" method="post">
    <label for="article-title">Titre :</label>
    <textarea name="titre"  placeholder="Votre titre" id="titre"></textarea>
    <label for="article-content">Contenu :</label>
    <textarea name="message"  placeholder="Votre message" id="message"></textarea>
    <input type="submit" name="envoyer" value="Envoyer" class="btn2">
    <?php
    if(isset($_POST['envoyer']))
    {
      $id=$_SESSION['id_user'];
      $titre=$_POST['titre'];
      $msg=$_POST['message'];
      $req1=mysqli_query($cn,"insert into message values (NULL,'$titre','$msg',NOW(),'$id')"); 
    header("location:forum.php");
    }
    ?>
  </form>
  </div>
  </div>
</body>
</html>

<?php
//Retour à la page de connection
}
else
header("location:index.php");
?>
