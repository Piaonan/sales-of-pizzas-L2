<?php 

function print_table($res, $title1, $title2){
	
	echo '<table class="tab">
				<thead><tr><th>'.$title1.'</th><th>'.$title2.'</th><th>Action</th></tr></thead>
				<tbody>';
				while($row = $res->fetch()) {
						echo "	<tr>
						<td>".htmlspecialchars($row["nom"])."</td>
						<td>".htmlspecialchars($row["prixA"])." €</td>
						<td><a href=\"javascript:send('admin_supprimer.php?id=$row[id]');\">Supprimer</a> |
						<a href=\"javascript:send('admin_modifier.php?id=$row[id]');\">Modifier</a></td>
					</tr>";
					}
				echo "
				</tbody>
			</table> ";
	
	
}