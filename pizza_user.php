<?php

require("auth/EtreAuthentifie.php");

$title = 'Les pizzas et les suppléments';
include("header.php");
include("nav_bar.php");
require("connection.php");
require("view/user_view.php");
?>

<section class="center">
	<article>
	
		<?php if(!($idm->getRole()==="user")) echo("Erreur 403..."); else {?>


		<h1 class="descrip">Liste des pizzas et des suppléments</h1>
		
			<?php 
				$res = connection('SELECT nom,ROUND(prix,2) AS prixU FROM recettes');
				$res->execute();
				if ($res->rowCount()==0) echo("Malheureusement,
				il semblerait que l'établissement connaisse actuellement une pénurie d'ingrédients, 
				repassez plus tard s'il vous plaît.");
				else {
			?>
					<span id="cote-a-cote">
					
					<?php print_table($res,"Nom de la pizza","Prix de la pizza");
		
					$res = connection('SELECT nom,ROUND(prix,2) AS prixU FROM supplements');
					$res->execute();
					if ($res->rowCount()!=0) {
						print_table($res,"Nom du supplément","Prix du supplément");
					}
					?>
			
					
					</span>
					
		
		<?php	}
		
		} ?>
			

			
	</article>
</section>

<?php
include("footer.php");
