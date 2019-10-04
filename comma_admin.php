<?php

require("auth/EtreAuthentifie.php");

$title = 'Les commandes passées';
include("header.php");
include("nav_bar.php");

?>

<section class="center">
	<article>
		<?php if(!($idm->getRole()==="admin")) echo("Erreur 403..."); else {?>


		<h1 class="descrip">Tableau des commandes passées</h1>
			<?php require("connection.php");
				$res = connection('SELECT ref,DATE_FORMAT(date,"%d-%m-%Y %T") AS date,
									CASE WHEN statut = 1 THEN "En préparation" 
														WHEN statut = 2 THEN "En livraison"
														ELSE "Terminée" END AS stat,
									login,r.nom AS pizzaN,
									CASE WHEN e.cid THEN GROUP_CONCAT(s.nom SEPARATOR "\n") 
													ELSE "Aucun supplément" 
													END AS suppN,
									ROUND(CASE WHEN e.cid THEN sum(s.prix) ELSE 0 END+r.prix,2) AS prixTT
									FROM commandes c
									INNER JOIN users u ON c.uid=u.uid
									INNER JOIN recettes r ON c.rid=r.rid
									LEFT JOIN extras e ON c.cid=e.cid
									LEFT JOIN supplements s ON e.sid=s.sid
									GROUP BY c.cid ORDER BY login, date, statut');
				$res->execute();
				if ($res->rowCount()==0) echo("Malheureusement, aucun client n'a encore commandé quoi que ce soit...");
				else {
					require("view/commande_view.php");
			
				
					print_table($res,"Login du client","Référence",
										"Pizza","Suppléments",
										"Date de la commande passée","Prix total",
										"Statut");
					
				}
		}?>
			
		
	</article>
</section>

<?php
include("footer.php");
