<?php 

function print_table($res, $title1, $title2, $title3, $title4, $title5, $title6, $title7){
	
	echo '<table class="tab">
				<thead><tr><th>'.$title1.'</th><th>'.$title2.'</th>
				<th>'.$title3.'</th><th>'.$title4.'</th>
				<th>'.$title5.'</th><th>'.$title6.'</th>
				<th>'.$title7.'</th></tr></thead>
				<tbody>';
				
				while($row = $res->fetch()) {
						echo "	<tr>
						<td>".htmlspecialchars($row["login"])."</td>
						<td>".htmlspecialchars($row["ref"])."</td>
						<td>".htmlspecialchars($row["pizzaN"])."</td>
						<td>".nl2br(htmlspecialchars($row["suppN"]))."</td>
						<td>".htmlspecialchars($row["date"])."</td>
						<td>".htmlspecialchars($row["prixTT"])." €</td>
						<td>".htmlspecialchars($row["stat"])."</td>
					</tr>";
				}
					
				echo "
				</tbody>
			</table> ";
	
	
}