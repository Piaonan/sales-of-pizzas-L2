Êtes-vous sûr(e) ?
<form method="post" class="mTop">
	<input type="hidden" name="table" value="<?php if(isset($_POST['table'])) echo $_POST['table']; ?>"/>
	<input type="hidden" name="identity" value="<?php if(isset($_POST['identity'])) echo $_POST['identity']; ?>"/>
	<input type="submit" name="supprimer" value="Supprimer"/>
	<input type="submit" name="annuler" value="Annuler"/>
</form>