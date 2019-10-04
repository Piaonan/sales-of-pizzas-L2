<?php 

function print_form($res,$type,$i,$sid){
	
	echo '<form method="post"> 
				<table style="text-align: left;">
						';
	
	while($row = $res->fetch()) {
		echo '<tr><td>
					<input type="'.$type.'" name="option'.$i.'" value="'.$row["id"].'">'.htmlspecialchars($row["nom"]).'<br/>
						</td></tr>';
		if($i) $i++;
	}
	echo $i==0?
		'			
				<tr><td><input class="mTop" type="submit" value="Continuer"></td>
		'
		:
		'		
				<tr><td><input type="hidden" name="option0" value="'.$sid.'"></td></tr>
				<tr><td><input class="mTop" type="submit" name="StepTwo" value="Continuer"></td>
				<td><input class="mTop" type="submit" name="GetBack" value="Revenir"></td></tr>
		'
		;	
		
	echo "		</table>
			</form>";
	
	
}