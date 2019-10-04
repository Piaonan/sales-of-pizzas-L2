<?php 

function print_table($res, $title1, $title2){
	
	echo '<table class="tab">
				<thead><tr><th>'.$title1.'</th><th>'.$title2.'</th></tr></thead>
				<tbody>';
				while($row = $res->fetch()) {
						echo "	<tr>
						<td>".htmlspecialchars($row["nom"])."</td>
						<td>".htmlspecialchars($row["prixU"])." €</td>
					</tr>";
				}
				echo "
				</tbody>
			</table> ";
	
	
}