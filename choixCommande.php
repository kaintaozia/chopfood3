<?php 
header ("Refresh:3 ;URL=identification.php");
// Redirection vers page_suivante.php après un délai de 5 secondes
// durant lesquelles la page actuelle (page_premiere.php, par exemple) est affichée
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<html>
<?php
include "connexion.php";
$bdd = connexion();
error_reporting(E_ALL);
$date = date("Y-m-j");
?>
<head>
<link href="./css/StyleAffichComm.css" rel="stylesheet" media="all" type="text/css">
</head>

<body>
<!--***********************************************************
		ajout des variable de session
************************************************************--!>
<?php
session_start();
if(isset($_SESSION['login']))
{
	$login=$_SESSION['login'];
	$mdp=$_SESSION['mdp'];
}
$connection = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$login."' AND mdp='".$mdp."'");
$donnees1 = $connection->fetch();
if ($donnees1['nb1']==1) {
	?>
<div id=header>
	<div id=banniere>
		<img src="images/banniere.jpg" />
	</div>
	<div id=connexion>
		<?php
		session_start();
	if(isset($_SESSION['login']))
	{
		$login=$_SESSION['login'];
	}
	echo 'login : '.$login.'';	
	?>
	</div>
	<div id=deco>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				déconnexion	
			</div>
	</div>
</div>
	<?php
	$connection->closeCursor();
	?>




<div id=page>

<div id=text>
	Vous avez selectionné 
	<?php echo $_POST['commande']; 
//	$menu1 = $bdd->query("delete FROM subway where nom='".$login."'");
//	$menu2 = $bdd->query("delete from commande where id='".$login."'");
	$menu = $bdd->query("insert choix(choix, jour) values('".$_POST['commande']."','".$date."');");
	?>
	
</div>


<?php
echo "</div>";
}
else {
	?>
		<div id=header>
			<div id=banniere>
			<img src="images/banniere.jpg" />
			</div>
 		</div>
		<div id=page>
			<div id=text>
			Erreur sur le mdp ou le login
			</div>
			</br>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				RETOUR	
			</div>
		</div>		

	<?php
}	
$connection2->closeCursor();
?>





</body>
</html>
