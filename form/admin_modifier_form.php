<form method="post" class="mTop">
	<input type="hidden" name="table" 
		value="<?php if(isset($table)) echo $table; ?>"/>
	<input type="hidden" name="identity" 
		value="<?php if(isset($identity)) echo $identity; ?>"/>
	<input type="text" maxlength="30" name="nom" 
		value="<?php if(isset($mod)) echo htmlspecialchars($mod['nom']); ?>" required/>
	<input type="number" name="prix" min="0.00" max="150" step="0.01" 
		value="<?php if(isset($mod)) echo htmlspecialchars($mod['prixM']); ?>" required/>
	<input type="submit" value="Modifier"/> 
</form>