<script>
function repair_damaged_devices(damaged_devices_id, service_request_id){
	var r = confirm("Potwierdź podjęcie naprawy");

	if (r == true) {
		var http = new XMLHttpRequest();
		var url = "app_resources/serwisant/get_repair.php";
		var params = "damaged_devices="+damaged_devices_id+"&service_request="+service_request_id;
		http.open("POST", url, true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.onreadystatechange = function() {//Call a function when the state changes.
			if(http.readyState == 4 && http.status == 200) {
				alert('Potwierdzono naprawę');
				location.reload();
			}
		}
		http.send(params);
	} else {
		alert('Anulowano naprawę');
	}
}; 
</script>
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
#repair{
	height:45px;
	border:1px solid #ccc;
}
</style>
<?php
require('../../../config/db.class.php');

if($serviceman->devices_for_repair($_SESSION['mennica_magazyn_storage_id']))
{	
	echo "<h3>Lista urządzeń pobranych przez serwisantów</h3><br />";
	echo "<table id='sortTable'>";
	echo "<thead>";
	echo "<th>Lp.</th>";
	echo "<th>Serwisant</th>";
	echo "<th>Nazwa urządzenia</th>";
	echo "<th>Numer seryjny</th>";
	echo "<th>Ilość</th>";
	echo "<th>Nr pojazdu</th>";
	echo "<th>Nr automatu</th>";
	echo "<th>Data operacji</th>";
	echo "<th>Działania</th>";
	echo "</thead>";
	echo "<tbody>";

	$x=0;
	foreach($serviceman->devices_for_repair($_SESSION['mennica_magazyn_storage_id']) as $row)
	{
		$x++;
		echo "<input type='hidden' name='damaged_devices_id_".$x."' value='".$row['damaged_devices_id']."'/>";
		echo "<input type='hidden' name='service_request_id_".$x."' value='".$row['service_request_id']."'/>";
		echo "<input type='hidden' name='product_id[]' value='".$row['product_id']."'/>";
		echo "<input type='hidden' name='storage_id' value='".$row['storage_id']."'/>";
		echo "<input type='hidden' name='service_user_id[]' value='".$row['service_user_id']."'/>";
		echo "<tr>";
		echo "<td>".$x."</td>";
		echo "<td>".$row['service_user_name']."</td>";
		echo "<td>".$row['product_name']."</td>";
		echo "<td>".$row['sn']."</td>";
		echo "<td>".$row['quantity']."</td>";
		echo "<td>".$row['bus_number']."</td>";
		echo "<td>".$row['automat_number']."</td>";
		echo "<td>".$row['datetime']."</td>";
		echo " <td><input type='button' value='Wybierz' onclick=\"repair_damaged_devices( $('input[name=damaged_devices_id_".$x."]').val(),$('input[name=service_request_id_".$x."]').val() )\" /></td>";
		//echo "<td><input type='button' value='Napraw' id='repair' onclick=\"repair_damaged_devices( $('input[name=damaged_devices_id_".$x."]').val(),$('input[name=service_request_id_".$x."]').val() )\" /></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

	echo "<div style='clear:both'></div>";
}
else echo "<h4>Brak danych</h4>";
?>