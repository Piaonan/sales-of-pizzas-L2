<?php

require("auth/EtreAuthentifie.php");

$title = 'Nos suppléments';
include("header.php");
include("nav_bar.php");
require("view/admin_view.php");
?>

<section class="center">
	<article>
		<?php if(!($idm->getRole()==="admin")) echo("Erreur 403..."); else {?>
	

		<h1 class="descrip">Tableau des suppléments</h1>
			<?php require("connection.php");
				$res = connection('SELECT sid AS id,nom,ROUND(prix,2) AS prixA FROM supplements');
				$res->execute();
				if ($res->rowCount()==0) echo("La table est vide, soyez la première personne à ajouter un supplément !");
				else {
			?>
					<form name="envoie">
						<input type="hidden" name="table" value="supplements"/>
						<input type="hidden" name="identity" value="sid"/>
					</form>
			
					<?php 
					print_table($res,"Nom du supplément","Prix du supplément");

				}?>
			
		<h1 class="descrip">Ajouter un supplément</h1>
			<?php if (isset($_POST['nom'])&&strlen($_POST['nom'])&&
			isset($_POST['prix'])&&is_numeric($_POST['prix'])&&
			strlen($_POST['nom'])<30&&$_POST['prix']>=0&&$_POST['prix']<=150){
				$nom = $_POST['nom'];
				$prix= $_POST['prix'];
	
				$res = connection('INSERT INTO supplements VALUES (DEFAULT,?,?)');
				$res->execute(array($nom,$prix));
	
	
				if (!$res) echo "Erreur d'ajout";
				else redirect("suppl_admin.php");
			}
			else if(isset($_POST['nom'])||isset($_POST['prix'])) echo "Soyez sérieux s'il vous plaît...";
			
			require("form/admin_ajouter_form.php");
		}?>
	</article>
</section>

<?php
include("footer.php");
