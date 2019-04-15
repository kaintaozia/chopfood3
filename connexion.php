<!-- connexion bdd -->
	<?php
	function connexion()
		{
			try
			{
				$bdd = new PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_880ea39488893f3', 'b9cfd46243c65b', '8480309c');
				return $bdd;
			}
				catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		}
	?>
