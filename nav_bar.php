<?php
if($idm->getRole()==="admin"){ ?>
	<nav>
		<ul class="navbar" style="margin-top:0%;">
			<li><a href="index.php">Accueil</a></li>
			<li><a href="pizza_admin.php">Nos pizzas</a></li>
			<li><a href="suppl_admin.php">Nos suppléments</a></li>
			<li><a href="comma_admin.php">Les commandes passées</a></li>
			<li><a href="<?= $pathFor['logout'] ?>" title="Logout">Se déconnecter</a></li>
		</ul>
	</nav>
	<?php
}
else if($idm->getRole()==="user"){ ?>
	<nav>
		<ul class="navbar" style="margin-top:0%;">
			<li><a href="index.php">Accueil</a></li>
			<li><a href="pizza_user.php">Les pizzas et les suppléments</a></li>
			<li><a href="passe_user.php">Passer une commande</a></li>
			<li><a href="comma_user.php">Mes commandes passées</a></li>
			<li><a href="<?= $pathFor['logout'] ?>" title="Logout">Se déconnecter</a></li>
		</ul>
	</nav>
<?php	
	
}