<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
	<link href="./css/StyleBurger.css" rel="stylesheet" media="all" type="text/css">
	<link href="./css/baniere.css" rel="stylesheet" media="all" type="text/css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
<!--*********************************************************** -->
<!--		ajout des variable de session -->
<!-- ************************************************************ -->
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
			<div id=boutonDH onclick="self.location.href='deconnexion.php'">
				déconnexion	
			</div>
	</div>
</div>


<?php
$connection->closeCursor();
/********************************************************
si commande deja passe
********************************************************/
$menu1 = $bdd->query("select count(*) as com from commande where id ='".$login."'");
$donnees1 = $menu1->fetch();
if ($donnees1['com']!=0) {
	?>	
	<div id=page>
			<div id=text>
				vous avez deja passe une commande
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
Si pas de commande
*********************************************************/
?>
<div id=page>
<form action="verifBurger.php" method="post">
	<div id=burger>
		<div class=ligne1>
<!--			<div class=titre>

        	                <b> BURGER : </b> (<b>formule 1 = </b>burger + Frite = boisson)
                	</div>
-->		</div>

                <div id=ligne1>
                        <div id=titre1>
                                <b> BURGER :</b> 
                        </div>
                        <div id=col2>
                               <b>  SEUL </b>
                        </div>
                        <div id=col3>
                               <b>  Formule 1 </b>
                        </div>
                </div>
                <div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Bacon/cheese killer" />
                        </div>
                        <div id=col1>
                              <b>  Bacon/cheese killer :</b> double steak (125g), double bacon, oigons rouges, double cheddar, cornichons, ketchup
                        </div>
                        <div id=col2>
                                10 €
                        </div>
                        <div id=col3>
                                13 €
                        </div>
                </div>

                <div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Papa Jonny" />
                        </div>
                        <div id=col1>
                              <b>  Papa Jonny :</b> steak (165g) charolais, bacon, rosti, oigons rouges, double-cheddar, cornichons, sauce burger 
                        </div>
                        <div id=col2>
                                10 €
                        </div>
                        <div id=col3>
                                13 €
                        </div>
                </div>

		<div id=ligne1>
			<div class=CocheP1>
                                <input type="radio" name="burger" value="Tony Montagnard" />
                        </div>
			<div id=col1>
				<b>Tony Montagnard : </b>Pain maïs, steak 165g charolais, bacon, salade,oignons fris, reblochon
			</div>
			<div id=col2>
				9 €
                        </div>
			<div id=col3>
				12 €
                        </div>
		</div>

		<div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Everest" />
                        </div>

                        <div id=col1>
                               <b>Everest :</b> Pain brioché, steak 185g charolais, rosti, oignons rouges, salade, reblochon
                        </div>
                        <div id=col2>
                                9 €
                        </div>
                        <div id=col3>
                                12 €
                        </div>
                </div>
		<div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Repenti" />
                        </div>
                        <div id=col1>
                                <b>Repenti : </b>Pain brioché, steak 165g, charolais, rosti, oignons rouges, bacon, cheddar fumé, kétchup, moutarde
                        </div>
                        <div id=col2>
                                9 €
                        </div>
                        <div id=col3>
                                12 €
                        </div>
                </div>
		<div id=ligne1>
			<div class=CocheP1>
                                <input type="radio" name="burger" value="Parrain" />
                        </div>
                        <div id=col1>
                               <b>Parrain : </b> Pain brioché, steak 165g charolais, bacon, tomates, oignons rouges, salade, fromage de chevre, moutarde au miel
                        </div>
                        <div id=col2>
                                9 €
                        </div>
                        <div id=col3>
                                12 €
                        </div>
                </div>
		<div id=ligne1>
			<div class=CocheP1>
                                <input type="radio" name="burger" value="Big Veggie" />
                        </div>
                        <div id=col1>
                              <b>  Big Veggie :</b> Pain brioché, burger végétarien, salade, tomate, oignons rouges, cheddar, ketchup, moutarde 
                        </div>
                        <div id=col2>
                                8 €
                        </div>
                        <div id=col3>
                                11 €
                        </div>
                </div>
		<div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Blues Brother"/>
                        </div>
                        <div id=col1>
                              <b>  Blues Brother :</b> Pain maïs, steak 165g angus, sauce roquefort, salade, tomate
                        </div>
                        <div id=col2>
                                8 €
                        </div>
                        <div id=col3>
                                11 €
                        </div>
                </div>
		<div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Tommy gun"/>
                        </div>
                        <div id=col1>
                              <b> Tommy gun :</b> Pain brioché, steak 165g charolais,  salade, tomate, oignons rouges, sauce burger, cheddar, cornichons
                        </div>
                        <div id=col2>
                                8 €
                        </div>
                        <div id=col3>
                                11 €
                        </div>
                </div>
		<div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Marshall" />
                        </div>
                        <div id=col1>
                              <b>  Marshall :</b> Pain maïs, steak 165g angus,  salade, tomate, oignons rouges, sauce BBQ, cheddar
                        </div>
                        <div id=col2>
                                8 €
                        </div>
                        <div id=col3>
                                11 €
                        </div>
                </div>
                <div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Smokey Joe" />
                        </div>
                        <div id=col1>
                              <b>  Smokey Joe :</b> pain brioché, steak 165g angus,  oignons rouges, bacon, sauce BBQ, cheddar fumé
                        </div>
                        <div id=col2>
                                8 €
                        </div>
                        <div id=col3>
                                11 €
                        </div>
                </div>

		<div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Chickito" />
                        </div>
                        <div id=col1>
                              <b>  Chickito :</b> Petit pain brioché, burger de poulet pané au céréales 125g,tomate, salade, oignons rouges, sauce BBQ, cheddar
                        </div>
                        <div id=col2>
                                6 €
                        </div>
                        <div id=col3>
                                9 €
                        </div>
                </div>
	
                <div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Le Gandhi" />
                        </div>
                        <div id=col1>
                              <b>  Le Gandhi :</b> Petit pain brioché, aiguilettes de poulet tikka,salade, oignons frits, sauce curry, cheddar
                        </div>
                        <div id=col2>
                                5 €
                        </div>
                        <div id=col3>
                                8 €
                        </div>
                </div>

		<div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Le Billy Boy" />
                        </div>
                        <div id=col1>
                              <b>  Le Billy Boy :</b> Petit pain brioché, steak 125g Charolais, ketchup, cheddar
                        </div>
                        <div id=col2>
                                5 €
                        </div>
                        <div id=col3>
                                8 €
                        </div>
                </div>

                <div id=ligne1>
                        <div class=CocheP1>
                                <input type="radio" name="burger" value="Burger du moment" />
                        </div>
                        <div id=col1>
                              <b>  Burger du moment :</b> Consulter les ingrédients et tarif sur facebook  <a href="https://www.facebook.com/Chicago-Corner-2100568496873456/" target="_blank">Chicago Corner</a>
                        </div>
                        <div id=col2>
                                
                        </div>
                        <div id=col3>
                                
                        </div>
                </div>

	</div>
	<div id=formule>
                <div id=titre2>
                        <b>Choix de la formule (formule 1 : burger + frites + boisson) : </b> 
                        <select name="formule1">
                                <option value="seul"> seul </option>
                                <option value="Cornet de frites"> Cornet de frites </option>
				<option value="formule 1 + Coca"> F1 + coca </option>
				<option value="formule 1 + Orangina"> F1 + Orangina </option>
				<option value="formule 1 + Schweppes agrumes"> F1 + Schweppes agrumes </option>
				<option value="formule 1 + Fanta"> F1 + Fanta </option>
				<option value="formule 1 + Sprite"> F1 + Sprite </option>
				<option value="formule 1 + Ice Tea peche"> F1 + Ice Tea Peche </option>
				<option value="formule 1 + Oasis tropical"> F1 + Oasis tropical </option>

                        </select>
                 </div>
        </div>
	<div id=formule>
		<div id=titre2>
		 <b>Info sup : </b>
	<!--	</div>
		<div id=info1> -->		
			<input type="text" name="info" />
		</div>
	</div>

	<div id=footer>

			<div id=bouton1 onclick="self.location.href='identification.php'">
				ANNULER
			</div>
		        <input type="submit" value="VALIDER" id="boutonV">
	</div>
	</form>
</div>

<?php
}
?>
</div>

<?php
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
			</br>
			<div id=boutonErr onclick="self.location.href='deconnexion.php'">
				CONNEXION	
			</div>
		</div>		
<?php } ?>
</body>
</html>
