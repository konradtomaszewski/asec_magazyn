<?php
require("../../../config/db.class.php");
?>
<table id="sortTable">
				<thead>
				<th>Lp.</th>
				<th>Użytkownik</th>
				<th>Grupa</th>
				<th>Magazyn</th>
				<th>Ustawienia</th>
				</thead>
				<?php
					$x=1;
					foreach($user->getUsersList() as $row)
					{
						if($row['storage_name'] == null)
						{
							$storage_name = 'Wszystkie';
						}
						else 
						{
							$storage_name=$row['storage_name'];
						}
						
						echo "<tr>
							<td>".$x++.". </td>
							<td>".$row['user_name']."</td>
							<td>".$row['user_group_name']."</td>
							<td>".$storage_name."</td>
							<td><a class='user_manage' name='".$row['user_id']."'>Zarządzaj</a></td>
							</tr>";
					}
				?>
				</table>