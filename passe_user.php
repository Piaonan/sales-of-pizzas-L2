<?php

require("auth/EtreAuthentifie.php");

$title = 'Passer une commande';
include("header.php");
include("nav_bar.php");
require("connection.php");
require("form/user_passer_form.php");
?>

<section class="center">
	<article>
	
		<?php if(!($idm->getRole()==="user")) echo("Erreur 403..."); else {?>


		<h1 class="descrip" id="choix">Passer une commande</h1>
		
			<?php 
				
				$res = connection('SELECT rid AS id, nom FROM recettes');
				$res->execute();
				if ($res->rowCount()==0) echo("Malheureusement,
				il semblerait que l'établissement connaisse actuellement une pénurie d'ingrédients, 
				repassez plus tard s'il vous plaît.");
				else {
					$check = $res->rowCount();
					
					if(isset($_POST["option0"])&&is_numeric($_POST["option0"])&&!isset($_POST["GetBack"])){
						
						$res = connection('SELECT sid AS id, nom FROM supplements');
						$res->execute();
						if ($res->rowCount()==0) echo("Malheureusement,
						il semblerait que l'établissement connaisse actuellement une pénurie d'ingrédients, 
						repassez plus tard s'il vous plaît.");
						
						
						else if(isset($_POST["StepTwo"])){
							$pizzaId = $_POST["option0"];
							$checkPizza = connection('SELECT * FROM recettes WHERE rid=?');
							$checkPizza->execute([$pizzaId]);
							if ($checkPizza->rowCount()==0) redirect("passe_user.php");
							
							$check = $res->rowCount();
							
							$checkSupple = connection('SELECT * FROM supplements WHERE sid=?');
							for($i=1; $i<=$check; $i++){
								if(isset($_POST["option".$i])){
									if(is_numeric($_POST["option".$i])){
										$SuppleId = $_POST["option".$i];
										$checkSupple->execute([$SuppleId]);
										if ($checkSupple->rowCount()==0) redirect("passe_user.php");
									}
									else redirect("passe_user.php");
								}
							}
							
							
							
							$randomletter = substr(str_shuffle("A1Z2E3R4T5Y6U7I8O9P0QSDFGHJKLMWXCVBN"), 0, rand(5,7));
							$thisId = $idm->getUid();
							$rid = $_POST["option0"];
							$today = date("Y-m-d H:i:s");
							
							if(($cid = lastCid($randomletter,$thisId,$rid,$today))==0)
								echo "Erreur d'ajout";
							
							else{
									
								for($i=1; $i<=$res->rowCount(); $i++){
									if(isset($_POST["option".$i])){
										$sid = $_POST["option".$i];
										$insert = connection('INSERT INTO extras VALUES (?,?)');
										$insert->execute(array($cid, $sid));
										if (!$insert) echo "Erreur d'ajout";
									}
								}
								echo "Votre commande a été prise en compte !";
							}
						}
						
						else{
							print_form($res,"checkbox",1,$_POST["option0"]);
						}
						
					}
					else{
						print_form($res,"radio",0,null);
					}
					
			
					
		
				}
		
		}?>
			

			
	</article>
</section>

<?php
include("footer.php");
