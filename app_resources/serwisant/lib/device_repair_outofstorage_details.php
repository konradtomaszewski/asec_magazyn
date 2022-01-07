<script>
$(document).ready(function(){
	$.datetimepicker.setLocale('pl');

	$('#start_repair_datetime').datetimepicker({
		timepicker:true,
		format:'Y-m-d h:i'
	});
	
	
	$('#back').click(function(){
		 location.reload();
	});

	$('#save_repair').click(function(){
		var start_repair_datetime = $('#start_repair_datetime').val();
		var nr_tabor = $('#nr_tabor').val();
		var sn = $('#sn').val();
		var naprawa_id = $('#naprawa_id').val();
		var typ_naprawy = $('#typ_naprawy option:selected').val();
		var serwis_zew = $('#serwis_zew option:selected').val();
		var repair_status = $('#repair_status option:selected').val();
		var diagnoza = $('#diagnoza').val();
		var repair_description = $('#repair_description').val();
		var real_time = $('#real_time').val();
		
		if(typ_naprawy == 0){	alert("Nie wybrano typu naprawy");	return false;}
		if(diagnoza.length  <= 0){	alert("Uzupełnij pole diagnoza");	return false;}
		if(repair_status == 3){	alert("Zmień status naprawy");	return false;}		
		if(repair_status == 4 && serwis_zew == 'Nie'){	alert('Wybrałeś status: "Serwis zewnętrzny", ale go nie wybrałeś!');	return false;}
		
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/device_repair_outofstorage_details_process.php",
				type: "POST",
				data: {
					"start_repair_datetime": start_repair_datetime,
					"nr_tabor": nr_tabor,
					"sn": sn,
					"naprawa_id": naprawa_id,
					"typ_naprawy": typ_naprawy,
					"serwis_zew": serwis_zew,
					"repair_status": repair_status,
					"diagnoza": diagnoza,
					"repair_description": repair_description,
					"real_time": real_time,
				},
				success: function(data) {
					 location.reload();
				}
			});
	});
	
	$('#serwis_zew').change(function(){
		var serwis = $('#serwis_zew option:selected').val();
		if(serwis != 'Nie'){
			$('#repair_status').val('4');
			$('#repair_status').attr('disabled',true);
		}
		else{
			$('#repair_status').val('1');
			$('#repair_status').attr('disabled',false);
		}
	});
	
	
});
</script>
<style>
input,select{
	width:400px;
}
textarea{
	height:200px;
	width:400px;
}
</style>
<?php
require('../../../config/db.class.php');
$naprawa_id = $_GET['id'];

		foreach($vectorsoft_magazyn->device_repair_outofstorage_details($naprawa_id) as $row)
		{
			echo '<input type="hidden" id="naprawa_id" value="'.$naprawa_id.'" />';
			echo '<table>';
				echo '<tr>';
				echo '<td>Data utworzenia naprawy:</td><td><input type="text" id="start_repair_datetime" value="'.$row['start_repair_datetime'].'"  /></td>';
				echo '<td>Użytkownik:</td><td><input type="text" value="'.$row['repair_username'].'" disabled /></td>';
				echo '</tr>';
				
				echo '<tr>';
				echo '<td>Miasto:</td><td><input type="text" value="'.$row['city'].'" disabled/></td>';
				echo '<td>Typ naprawy:</td><td><select id="typ_naprawy">';
				if($row['typ_naprawy'] != NULL){
					echo '<option value="'.$row['typ_naprawy'].'">Aktualny wybór: Naprawa '.$row['typ_naprawy'].'</option>';
				}
				else echo '<option value="0">Wybierz z listy</option>';
				echo '<option value="Lokalna">Lokalna</option><option value="Zdalna">Zdalna</option></select></td>';
				echo '</tr>';
				
				echo '<tr>';
				echo '<td>Nazwa urządzenia:</td><td><input type="text" value="'.$row['device_repair_name'].'" disabled/></td>';
				echo '<td>Numer seryjny:</td><td><input type="text" id="sn" value="'.$row['sn'].'"  /></td>';
				echo '</tr>';
				
				echo '<tr>';
				echo '<td>Nr taboru</td><td><input type="text" id="nr_tabor" value="'.$row['nr_tabor'].'" /></td>';
				echo '<td></td><td></td>';
				echo '</tr>';
				
				echo '<tr>';
				echo '<td>Diagnoza:</td><td><input type="text" id="diagnoza" value="'.$row['diagnoza'].'" /></td>';
				echo '<td>Serwis zewnętrzny (domyślnie: Nie):</td>';
				echo '<td><select id="serwis_zew">';
				echo '<option value="'.$row['serwis_zew'].'">Aktualny wybór:  '.$row['serwis_zew'].'</option>';
					
				echo '<option value="Nie">Nie</option><option value="EmTest">EmTest</option><option value="Mennica">Mennica</option></select></td>';
				echo '</tr>';

							
				echo '<tr>';
				echo '<td>Czasochłonność (min.):</td><td><input type="number" id="real_time" value="'.$row['real_time_repair'].'" /></td>';
				echo '<td>Status:</td><td><select id="repair_status">';
				echo '<option value="'.$row['repair_status_id'].'"selected disabled>Aktualny status: '.$row['repair_status'].'</option>';
				foreach($vectorsoft_magazyn->get_repair_status_list_without($row['repair_status_id']) as $status)
				{
					echo '<option value="'.$status['id'].'">'.$status['description'].'</option>';
				}
				echo '</select></td>';
				echo '</tr>';

				echo '<tr>';
				echo '<td style="display:table-cell; vertical-align:middle;">Zgłoszenie awarii:</td><td><textarea name="opis_awarii" disabled>'.$row['opis_awarii'].'</textarea></td>';
				echo '<td style="display:table-cell; vertical-align:middle;">Działania naprawcze:</td><td><textarea id="repair_description" >'.$row['repair_description'].'</textarea></td>';
				echo '</tr>';
				
				echo '<tr>';
				echo '<td colspan="2"><button id="back" style="background-color:#FFFF99; border:1px solid #000; float:left; width:250px">Anuluj</button></td>';
				echo '<td colspan="2"><button id="save_repair" style="background-color:#66FF66; border:1px solid #000; float:right;width:250px">Zapisz zmiany</button></td>';
				echo '</tr>';
			echo "</table>";
		}
		
		/*HISTORIA*/
		echo "<br /><br />";
		echo "<h3>historia naprawy</h3>";
		echo "<table>";
		echo "<thead><tr><th>Wykonane czynności</th><th>Status naprawy</th><th>Użytkownik</th><th>Data zmiany statusu</th></tr></thead>";
		echo "<tbody>";
		foreach($vectorsoft_magazyn->device_repair_outofstorage_history($naprawa_id) as $row)
		{
			echo "<tr><td>".$row['description']."</td><td>".$row['repair_status']."</td><td>".$row['repair_user']."</td><td>".$row['date']."</td></tr>";
		}
		echo "<tbody></table>";
?>
