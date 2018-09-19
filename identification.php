<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="./css/StyleIdenti.css" rel="stylesheet" media="all" type="text/css">
<link href="./css/baniere.css" rel="stylesheet" media="all" type="text/css">
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
$connection = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$login."' AND mdp='".$mdp."'");
$donnees1 = $connection->fetch();
if ($donnees1['nb1']==1) {
	?>
<div id=header>
	<div id=typecom>
	<?php /*
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
		echo "</div>"; */
	?>
	
		<div id=nbsub>
		<?php	/*
			$connection->closeCursor();
		        $connection3 = $bdd->query("SELECT count(*) as com FROM subway;");
                	$donnee3 = $connection3->fetch();
			echo "nombre de commande :";
			echo "</br>";
			echo "subway : ".$donnee3['com'];
			$connection->closeCursor();
		?>
		</div>
		<div id=nbpizza>
		<?php   $connection->closeCursor();
                	$connection4 = $bdd->query("SELECT count(*) as com FROM pizza;");
	                $donnee4 = $connection4->fetch();
        	        echo "</br>";
                	echo "Pizza : ".$donnee4['com'];
	        ?>
		</div>
		<div id=nbburger>
		<?php   $connection->closeCursor();
                	$connection5 = $bdd->query("SELECT count(*) as com FROM burger;");
	                $donnee5 = $connection5->fetch();
        	        echo "</br>";
                	echo "Burger : ".$donnee5['com']; */
	        ?>
		</div>

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
			<div id=boutonDH onclick="self.location.href='deconnexion.php'">
				déconnexion	
			</div>
	</div>
</div>



<!--***********************************************************
                Affichage du menu si admin
************************************************************ -->

<?php
/*	$connection->closeCursor();
        $connection2 = $bdd->query("SELECT admin FROM identi where login='".$login."' AND mdp='".$mdp."'");
        $donnee2 = $connection2->fetch();
        if ($donnee2['admin']==1) { */ 
        	?>
		<div id=menuTitre>
			Nombre de commandes : 
		</div>
	        <div id=menu>
			<div id=type1>
			<?php   
                	        $connection->closeCursor();
        	                $connection3 = $bdd->query("SELECT count(*) as com FROM subway;");
	                        $donnee3 = $connection3->fetch();
                	        echo "subway : ".$donnee3['com'];
        	                $connection->closeCursor();
	                ?>				 
			</div>	

			<div id=type2>
			<?php   
				$connection->closeCursor();
	                        $connection4 = $bdd->query("SELECT count(*) as com FROM pizza;");
        	                $donnee4 = $connection4->fetch();
                                echo "Pizza : ".$donnee4['com'];
	                ?>
                        </div>


			<div id=type3>
			<?php   
				$connection->closeCursor();
	                        $connection5 = $bdd->query("SELECT count(*) as com FROM burger;");
        	                $donnee5 = $connection5->fetch();
                                echo "Burger : ".$donnee5['com']; 
                	?>

                        </div>
	        </div>
		<?php
//			}  
		?>


<!-- ***************************************************************
		Affichage des boutons de commandes
****************************************************************** -->


<div id=page>
	<div id=MenuP>


		<div id=Option1>
			<div id=bouton1 onclick="self.location.href='subway.php'">
				Subway
			</div>
		</div>

                <div id=Option1>
                        <div id=bouton1 onclick="self.location.href='pizza.php'">
                                Pizza
                        </div>
		</div>
        </div>
	<div id=MenuP> 
		<div id=Option1>
                        <div id=bouton1 onclick="self.location.href='burger.php'">
                                Burger
                        </div>
                </div>
                <div id=Option1>
                        <div id=bouton2b onclick="self.location.href='affichComm.php'">
                                Visualiser ma commande
                        </div>
                </div>
        </div>

	<?php
		/*-----------------------------------------------------------------
				Affichage des options Administrateur
		------------------------------------------------------------------*/
	$connection->closeCursor();
	$connection2 = $bdd->query("SELECT admin FROM identi where login='".$login."' AND mdp='".$mdp."'");
	$donnee2 = $connection2->fetch();
	if ($donnee2['admin']==1) {
	?>
        <div id=MenuA>
                <div id=Option3>
                        <div id=bouton1 onclick="javascript:window.open('pdfSub.php')">

                                Impression SUB
                        </div>
                </div>
                <div id=Option4>
			<div id=bouton1 onclick="javascript:window.open('pdfPiz.php')">
                               Impression Pizza
                        </div>
                </div>
        </div>

	<div id=MenuP>
		<div id=Option3>
			<div id=bouton1 onclick="javascript:window.open('pdfBur.php')">

				Impression Burger
			</div> 
		</div>
		<div id=Option4>
			<div id=bouton1 onclick="self.location.href='newCpt.php'">
				Créer un compte	
			</div>
		</div>
	</div>
	<div id=MenuA2>
		<div id=Option5>
			<div id=bouton1 onclick="self.location.href='confPurge.php'">

				purger les commandes
			</div> 
		</div>
	</div>
	<?php
		}
	?>
</div>

		<?php
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
