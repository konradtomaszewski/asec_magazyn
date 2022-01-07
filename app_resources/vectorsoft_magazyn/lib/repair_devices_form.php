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

if($vectorsoft_magazyn->getRepairDevices($_SESSION['mennica_magazyn_storage_id']))
{
	
	echo "<h3>Lista urządzeń w naprawie</h3><br />";
	echo "<table id='sortTable'>";
	echo "<thead>";
	echo "<th>Interwencja</th>";
	echo "<th>Nazwa urządzenia</th>";
	echo "<th>Numer seryjny</th>";
	echo "<th>Nr aut.</th>";
	echo "<th>Data interwencji</th>";
	echo "<th>Naprawa</th>";
	echo "<th>Data rozpoczęcia naprawy</th>";
	echo "<th>Data zakończenia naprawy</th>";
	echo "<th>Realny czas naprawy</th>";
	echo "<th>Status</th>";
	echo "</thead>";
	echo "<tbody>";

	$x=1;
	foreach($vectorsoft_magazyn->getRepairDevices($_SESSION['mennica_magazyn_storage_id']) as $row)
	{
		echo "<tr>";
		echo "<td>".$row['service_user_name']."</td>";
		echo "<td>".$row['product_name']."</td>";
		echo "<td>".$row['sn']."</td>";
		echo "<td>".$row['automat_number']."</td>";
		echo "<td>".$row['datetime']."</td>";
		echo "<td>".$row['repair_user_name']."</td>";
		echo "<td>".$row['start_repair_datetime']."</td>";
		echo "<td>".$row['end_repair_datetime']."</td>";
		echo "<td>".$row['real_time_repair']."</td>";
		echo "<td>".$row['repair_status_description']."</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "<div style='clear:both'></div>";
}
else echo "<h4>Brak aktywnych napraw</h4>";
?>