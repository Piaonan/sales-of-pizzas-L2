<?php

require("auth/EtreAuthentifie.php");

$title = 'Accueil';
include("header.php");
include("nav_bar.php");
//echo "Hello " . $idm->getIdentity().". Your uid is: ". $idm->getUid() .". Your role is: ".$idm->getRole();
//echo "Escaped values: ".$e_($ci->idm->getIdentity());
?>
<section class="center">
	<article>
		<h1 class="descrip">Message de bienvenue</h1>
	
	<?php echo ($idm->getRole()==="admin"?
"Bienvenue à vous, administrateur ".$idm->getIdentity()." !"
:
"Bienvenue à vous, ".$idm->getIdentity()." !");?>	


	</article>
</section>
<?php
include("footer.php");