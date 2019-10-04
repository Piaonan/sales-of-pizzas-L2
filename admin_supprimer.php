<?php

require("auth/EtreAuthentifie.php");

$title = 'Suppression';
include("header.php");
include("nav_bar.php");
?>

<section class="center">
	<article>
		<?php if(!($idm->getRole()==="admin")||
			!isset($_GET["id"])||!is_numeric($_GET["id"])||
			!isset($_POST["table"])||!strlen($_POST["table"])||
			!isset($_POST["identity"])||!strlen($_POST["identity"])||
			(strcmp($_POST["table"],"recettes")&&strcmp($_POST["identity"],"sid"))||
			(strcmp($_POST["table"],"supplements")&&strcmp($_POST["identity"],"rid"))) echo("Erreur 403..."); 


			else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"])){
				require("form/admin_supprimer_form.php");
			}
			else if (isset($_POST["annuler"])){
				echo "Opération annulée";
			}
			else{
				require('connection.php');
				$identity = $_POST["identity"];
				$table = $_POST["table"];
				$id = $_GET['id'];
				$response = connection("DELETE FROM $table WHERE $identity=?");
				$response->execute([$id]);
			
				if ($response->rowCount() ==0) echo "Erreur de suppression";
				else echo "La suppression a été effectuée !";

			}
		?>
	</article>
</section>


<?php
include("footer.php");