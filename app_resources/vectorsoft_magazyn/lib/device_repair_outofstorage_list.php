<?php
require('../../../config/db.class.php');
?>
<script   src="./assets/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="./assets/css/jquery.dataTables.css" />
<script>
$(document).ready(function(){
	$('tr:odd').css('background-color', '#f9f9f9'); 
	
	$('.naprawa_id').each(function(){
		var device_repair_id = $(this).attr('numer');
		console.log(device_repair_id);
		$('#show_repair_'+device_repair_id).html('Wyświetl');
	}).click(function(){
		var device_repair_id = $(this).attr('numer');
		console.log(device_repair_id);
		$('#device_repair').load("app_resources/"+$.cookie('module')+"/lib/device_repair_outofstorage_details.php?id="+device_repair_id);
		$('#repair_list').hide();
		$('#add_repair').hide();
	});
	
	var table = $('#table').DataTable({
		  stateSave: true,
		  "autoWidth": true,
	});
	
	$('a.toggle-vis').on( 'click', function (e) {
		$(this).toggleClass('hide_column');
        e.preventDefault();
		
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
        // Toggle the visibility
        column.visible( ! column.visible() );
		
	 });
});
</script>
<style>
.hide_column{
	text-decoration: line-through;
}
/*Realizowana*/
.status_1{
	background-color:#66FF66 !important;
}
/*Zakończona*/
.status_2{
	background-color:#deb4cb !important;
}
/*Utworzono naprawę*/
.status_3{
	background-color:#edf91e !important;
}
/*Serwis zewnętrzny*/
.status_4{
	background-color:#62f5ff !important;
}
</style>
<div id="repair_list">
<h3>Lista urządzeń w naprawie</h3>
<div>
					<b>Ukryj kolumny:</b>
					<a class="toggle-vis" data-column="0">Data przyjęcia</a> | 
					<a class="toggle-vis" data-column="1">Miasto</a> | 
					<a class="toggle-vis" data-column="2">Numer taboru</a> | 
					<a class="toggle-vis" data-column="3">Numer SN</a> | 
					<a class="toggle-vis" data-column="4">Nazwa urządzenia</a> | 
					<a class="toggle-vis" data-column="5">Opis awarii</a> | 
					<a class="toggle-vis" data-column="6">Diagnoza</a> | 
					<a class="toggle-vis" data-column="7">Podjęte działania naprawcze</a> | 
					<a class="toggle-vis" data-column="8">Status</a> | 
					<a class="toggle-vis" data-column="9">Serwis zewn.</a> | 
					<a class="toggle-vis" data-column="10">Data zakończenia naprawy</a> | 
					<a class="toggle-vis" data-column="11">Typ usługi</a> | 
					<a class="toggle-vis" data-column="12">Czas naprawy</a> | 
					<a class="toggle-vis" data-column="13">Serwisant</a>
				</div>
	<br /><br /><br />
	<?php
		echo '<table id="table">';
		echo '<thead>';
		echo '<th>Data przyjęcia</th>';
		echo '<th>Miasto</th>';
		echo '<th>Numer taboru</th>';
		echo '<th>Numer SN</th>';
		echo '<th>Nazwa urządzenia</th>';
		echo '<th>Opis awarii</th>';
		echo '<th>Diagnoza</th>';
		echo '<th>Podjęte działania naprawcze</th>';
		echo '<th>Status</th>';
		echo '<th>Serwis zewn.</th>';
		echo '<th>Data zakończenia naprawy</th>';
		echo '<th>Typ usługi</th>';
		echo '<th>Czas naprawy</th>';
		echo '<th>Serwisant</th>';
		echo '<th>Szczegóły naprawy</th>';
		echo '</thead><tbody>';
			foreach($vectorsoft_magazyn->device_repair_outofstorage() as $row){
				echo "<tr class='status_".$row['repair_status_id']."'>";
				echo "<td>".$row['start_repair_datetime']."</td>";
				echo "<td>".$row['city']."</td>";
				echo "<td>".$row['nr_tabor']."</td>";
				echo "<td>".$row['sn']."</td>";
				echo "<td>".$row['device_repair_name']."</td>";
				echo "<td>".$row['opis_awarii']."</td>";
				echo "<td>".$row['diagnoza']."</td>";
				echo "<td>".$row['repair_description']."</td>";
				echo "<td>".$row['repair_status']."</td>";
				echo "<td>".$row['serwis_zew']."</td>";
				if($row['end_repair_datetime']== null){	
					echo "<td>---</td>";
				}
				else{
					echo "<td>".date("Y-m-d",strtotime($row['end_repair_datetime']))."</td>";	
				}
				echo "<td>".$row['typ_naprawy']."</td>";
				echo "<td>".$row['real_time_repair']."</td>";
				echo "<td>".$row['repair_username']."</td>";
				echo "<td><div class='naprawa_id' id='show_repair_".$row['repair_id']."' numer='".$row['repair_id']."' style='cursor:pointer'></div></td>";
				echo "</tr>";
			}
		echo '</tbody></table>';
	?>
</div>
	<div id="device_repair"></div>