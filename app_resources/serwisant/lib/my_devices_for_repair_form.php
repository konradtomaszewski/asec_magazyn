<style>
th,td{
	font-size:0.9em !important;
}
input,select{
	width:auto !important;
}
.side_bus_number{
	width:60px !important
}

</style>
<?php
require('../../../config/db.class.php');

if($serviceman->my_devices_for_repair($_SESSION['mennica_magazyn_storage_id']))
{	
	echo "<h3>Moje otwarte naprawy</h3><br />";
	echo "<table id='sortTable'>";
	echo "<thead>";
	echo "<th>Lp.</th>";
	echo "<th>Serwisant</th>";
	echo "<th>Nazwa urządzenia</th>";
	echo "<th>Numer seryjny</th>";
	echo "<th>Nr pojazdu</th>";
	echo "<th>Nr automatu</th>";
	echo "<th>Data operacji</th>";
	echo "<th>Działania</th>";
	echo "</thead>";
	echo "<tbody>";

	$x=0;
	foreach($serviceman->my_devices_for_repair($_SESSION['mennica_magazyn_storage_id']) as $row)
	{
		$x++;

		echo "<tr>";
		echo "<td>".$x."</td>";
		echo "<td>".$row['service_user_name']."</td>";
		echo "<td>".$row['repair_devices_name']."</td>";
		echo "<td>".$row['sn']."</td>";
		echo "<td>".$row['bus_number']."</td>";
		echo "<td>".$row['automat_number']."</td>";
		echo "<td>".$row['datetime']."</td>";
		echo "<td><form action='index.php?action=open_repair' method='POST'>
					<input type='hidden' name='repair_id' value='".$row['id']."'/>
					<input type='hidden' name='damaged_devices_id' value='".$row['damaged_devices_id']."'/>
					<input type='submit' value='Otwórz' /></form></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

	echo "<div style='clear:both'></div>";
}
else echo "<h4>Brak danych</h4>";
?>