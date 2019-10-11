<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
	<link href="./css/StyleVerifBur.css" rel="stylesheet" media="all" type="text/css">
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
        <div id=typecom>
                <?php
	/*
                        $connection->closeCursor();
                        $connection3 = $bdd->query("SELECT * FROM choix;");
                        $donnee3 = $connection3->fetch();
                        echo "Commande :";
                        echo "</br>";
                        echo "<div id=resultat>";
                        echo $donnee3['choix'];
                        echo "</div>";
                        echo "</br>";
                        echo "Selectionné le ";
                        echo "</br>";
                        echo "<div id=resultat>";
                        echo $donnee3['jour'];
                        echo "</div>";
	*/
                ?>
        </div>

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
if ($_POST['burger']=='' || $_POST['formule1']=='') {
    echo "<div class=text>";
	echo "Vous avez une erreur dans votre commande, vous avez oublié un ingrédient";
	echo "<div id=footer>";
	?>
		<a href="javascript:history.back()">RETOUR</a>
	<?php
	echo "</div>";
	echo "</div>";
} 
else {
/*----------------------------------------------------
		Calcul du prix
----------------------------------------------------*/
        if ($_POST['burger']== "Bacon/cheese killer" || $_POST['burger']== "Papa Jonny" ) {
                $prix='10';
        }

	if ($_POST['burger']== "Tony Montagnard" || $_POST['burger']== "Everest" || $_POST['burger']== "Repenti" || $_POST['burger']== "Parrain") {
		$prix='9';
	}

        if ($_POST['burger']== "Big Veggie" || $_POST['burger']== "Blues Brother" || $_POST['burger']== "Tommy gun" || $_POST['burger']== "Marshall" || $_POST['burger']== "Smokey Joe") {
                $prix='8';
        }

        if ($_POST['burger']== "Colorado") {
                $prix='7';
        }
	if ($_POST['burger']== "Chickito") {
                $prix='6';
        }
	if ($_POST['burger']== "Le Gandhi" || $_POST['burger']== "Le Billy Boy") {
                $prix='5';
        }
	if ($_POST['formule1']== "seul") {
                $prix=$prix;
        }
	else{
		if ($_POST['formule1']== "Cornet de frites") {
                $prix=$prix + 2.5;
        	}
		else {
		$prix=$prix + 3;
		}	
	}
	if ($_POST['burger']== "Burger du moment") {
		$prix='inc';
	}

?>

	<div id=text>
	Voici le résumé de votre commande
	</div>
	<div class=ligne1>
		<div class=col1> BURGER :</div>
		<div class=col2> <?php echo $_POST['burger']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> formule :</div>
		<div class=col2> <?php echo $_POST['formule1']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> PRIX : </div>
		<div class=col2> <?php echo $prix."€" ; ?></div>
	</div>
        <div class=ligne1>
                <div class=col1> info sup :</div>
                <div class=col2> <?php echo $_POST['info']; ?></div>
        </div>








<?php
echo "<div id=footer>";
$burger=$_POST['burger'];
$formule1=$_POST['formule1'];
$info=$_POST['info'];
?>
<a href="javascript:history.back()">RETOUR</a>
<?php
echo "<a href='enregBurger.php?burger=".$burger."&formule1=".$formule1."&prix=".$prix."&info=".$info."'> ENREGISTER </a>";
$_SESSION['info1']=$info;

?>

</div>
</div>
</div>
<?php
}
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
