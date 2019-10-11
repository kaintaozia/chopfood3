<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="./css/StyleListeCpt.css" rel="stylesheet" media="all" type="text/css">
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
        <?php
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
<div id=page>
<div id=tablo>
	<form action="modificationCpt.php" method="post">
	<table>
	<tr>
		<td> Modif </td>
		<td> login </td>
		<td> Modif </td>
		<td> login </td>
		<td> Modif </td>
                <td> login </td>
	</tr>
	<?php
		$connection2 = $bdd->query("SELECT login FROM identi");
$ligne=0;
$transit=array();
$tableau=array();
$transit[]="inconnu";
		while ($donnees2 = $connection2->fetch()){
		$transit[]=$donnees2[login];
		$tableau=array_merge($tableau, $transit);
		$transit=array();
		$ligne=$ligne+1;
		}		
for ($i=1; $i<=ceil($ligne/3); $i++){
echo '<tr>';
	echo "<td><input type='radio' name='sup' value=".$tableau[3*$i-2]."></td>";
	echo '<td>'.$tableau[3*$i-2].'</td>';
		if (isset($tableau[3*$i-1])){
			echo "<td><input type='radio' name='sup' value=".$tableau[3*$i-1]."></td>";
		}
	echo '<td>'.$tableau[3*$i-1].'</td>';
		if (isset($tableau[3*$i])){
                        echo "<td><input type='radio' name='sup' value=".$tableau[3*$i]."></td>";
                }
	echo '<td>'.$tableau[3*$i].'</td>';
echo '</tr>';


}



?>
	</table>
</div>
        <div id=footer> 
		<div id=bouton1 onclick="self.location.href='gestionCpt.php'"> 
                	RETOUR
                </div>
                        <input type="submit" value="VALIDER" id="boutonV">
	</form>
        </div>              
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


