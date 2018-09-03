<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
	<link href="./css/StyleEnregSub.css" rel="stylesheet" media="all" type="text/css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
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

/**********************************************************
Verification du login mdp
***********************************************************/

$connection = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$login."' AND mdp='".$mdp."'");
$donnees1 = $connection->fetch();

/***********************************************************
Si login OK
***********************************************************/

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
/********************************************************
si commande deja passe
********************************************************/
$menu1 = $bdd->query("select count(*) as com from subway where nom='".$login."'");
$donnees1 = $menu1->fetch();
if ($donnees1['com']!=0) {
	?>	
	<div id=page>
			<div id=text>
				vous avez déjà passé une commande
			</div>
			</br>
			<div id=boutonErr onclick="self.location.href='identification.php'">
				ACCUEIL	
			</div>
		</div>		
<?php
}else
{
$menu1->closecursor();
/********************************************************
Si pas de commande Affichage de la page
*********************************************************/
?>
<div id=page>
<?php
if ($_GET['pizza']=='' || $_GET['taille']=='' || $_GET['patte']=='' || $_GET['prix']=='' ) {
    echo "<div class=text>";
	echo "Vous avez une erreur dans votre commande ";
	echo "<div id=footer>";
	?>
		<a href="javascript:history.back()"><input type="button" value="retour" id=bouton1></a>
	<?php
	echo "</div>";
	echo "</div>";
} 
else {

echo $_GET['pizza'];
echo $_GET['patte'];
echo $_GET['taille'];
echo $_GET['prix'];


$date = date("Y-m-d");

$bdd->exec("INSERT INTO pizza (nom, pizza, taille, patte, date, prix) VALUES ('".$login."','".$_GET['pizza']."','".$_GET['taille']."','".$_GET['patte']."','".$date."','".$_GET['prix']."');");
/*$bdd->exec("INSERT INTO pizza (nom, pizza, taille, patte, prix) VALUES ('".$login."','".$_GET['pizza']."','".$_GET['taille']."','".$_GET['patte']."','11');");*/
$bdd->exec("insert into commande (id, type, jour) values ('".$login."','pizza','".$date."');");

?>

	<div id=text>
		Votre commande est enregistrée 
	</div>	


			<div id=boutonD onclick="self.location.href='identification.php'">
					ACCUEIL
			</div>

<?php
}
?>

</div>
<?php

}

}
else {
?>
<!--***************************************************
Si erreur de login
****************************************************--!>
		<div id=header>
			<div id=banniere>
			<img src="images/banniere.jpg" />
			</div>
 		</div>
		<div id=page>
			<div id=text>
			Erreur sur le mdp ou le login
			</div>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				deconnexion	
			</div>
		</div>		
<?php } ?>
</body>