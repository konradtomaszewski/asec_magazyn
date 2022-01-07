<?php
require('../../../config/db.class.php');
$date = $_POST['date'];

echo "<table id='table'>";
echo "<thead>";
echo "<th>Rodzaj działania</th>";
echo "<th>Urządzenie</th>";
echo "<th>Numer seryjny</th>";
echo "<th>Nr automatu</th>";
echo "<th>Ilość</th>";
echo "<th>Data</th>";
//echo "<th>Od użytkownika</th>";
//echo "<th>Do użytkownika</th>";
echo "</thead>";
echo "<tbody>";
foreach($serviceman->history($date) as $row)
{
	echo "<tr>";
	echo "<td>";
	echo $row['service_status'];
	if($row['service_status_id'] == '1'){
		echo "<br />od ".$row['od'];
	}
	else if($row['service_status_id'] == '5'){
		echo "<br />do ".$row['do'];
	}
	
	echo "</td>";
	
	echo "<td>".$row['product_name']."</td>";
	echo "<td>".$row['product_sn']."</td>";
	echo "<td>".$row['automat_number']."</td>";
	echo "<td>".$row['quantity']."</td>";
	echo "<td>".$row['change_status_datetime']."</td>";
	//echo "<td>".$row['od']."</td>";
	//echo "<td>".$row['do']."</td>";
	echo "</tr>";
}
echo "</tbody>";
?>