<?php

require("auth/EtreAuthentifie.php");

$title = 'Modification';
include("header.php");
include("nav_bar.php");
require('connection.php');
?>

<section class="center">
	<article>
		
		<?php if(!($idm->getRole()==="admin")||
			!isset($_GET["id"])||!is_numeric($_GET["id"])||
			!isset($_POST["table"])||!strlen($_POST["table"])||
			!isset($_POST["identity"])||!strlen($_POST["identity"])||
			(strcmp($_POST["table"],"recettes")&&strcmp($_POST["identity"],"sid"))||
			(strcmp($_POST["table"],"supplements")&&strcmp($_POST["identity"],"rid"))) echo("Erreur 403..."); 
			
			
		else if(!isset($_POST['nom'])||!isset($_POST['prix'])||
		!strlen($_POST['nom'])||!is_numeric($_POST['prix'])||
		strlen($_POST['nom'])>30||$_POST['prix']<=0||$_POST['prix']>=150){
			
			$identity = $_POST["identity"];
			$table = $_POST["table"];
			$id = $_GET["id"];
			$mod = connection("SELECT nom,ROUND(prix,2) AS prixM FROM $table WHERE $identity=? ");
			$mod->execute([$id]); 
			if ($mod->rowCount() ==0) echo "Élément introuvable...";
			
			else{
				if(isset($_POST['nom'])||isset($_POST['prix'])) echo "Soyez sérieux s'il vous plaît...";
				$mod = $mod->fetch();
				require("form/admin_modifier_form.php");
			}
		}
		else{
			$identity = $_POST["identity"];
			$table = $_POST["table"];
			$id = $_GET["id"];
			$nom = $_POST["nom"];
			$prix = $_POST["prix"];
	
			
			$mod = connection("UPDATE $table SET nom=?, prix=? WHERE $identity=? ");
			$mod->execute(array($nom, $prix, $id));
			if ($mod->rowCount() ==0) echo "Erreur de modification";					
			else echo "La modification a été effectuée !";
		
		}
		?>
	</article>
</section>


<?php
include("footer.php");