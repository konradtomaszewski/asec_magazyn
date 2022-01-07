<?php
require('../../../config/db.class.php');
?>

<script>
$(document).ready(function(){
	var x=1;
		
    $("#btn").click(function () {
		//sprawdzanie czy nazwa sprzętu została wypełniona przed dodaniem nowego pola		
		var unfilled = $('input[name="sn[]"]').filter(function() {
			return $(this).val().length === 0;
		});
		if (unfilled.length > 0) {
			unfilled.css('border', '2px solid #F08080');
			setTimeout(function(){ 
					unfilled.removeAttr( 'style' ); 
					}, 2500
			);
			return false;
		}
		
		//---/
        x++;
		$('#myTabContent').append('<div class="item">'+
		'<input name="sn[]"  type="text"   placeholder="Numer seryjny" required/>'+
		'<a href="#" class="remove_field"><img src="assets/icons/del_icon.png" width="30"/></a>'+
		'</div>');
	
		
		$('#myTabContent').on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
		});	

    });
	
	$('#save_repair').click(function(){
		var datetime = $('input[name="start_repair_datetime"]').val();
		var nr_tabor = $('input[name="nr_tabor"]').val();
		var sn = $('input[name="sn[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var opis_awarii = $('textarea[name="opis_awarii"]').val();
		var repair_devices_definitions_outofstorage = $('#repair_devices_definitions_outofstorage option:selected').val();
		var city = $('#city option:selected').val();
		
		if(repair_devices_definitions_outofstorage == 0){
			alert('Nie wybrano urządzenia!');
			return false;
		}
		else if(city == 0){
			alert('Nie wybrano miasta!');
			return false;
		}
		else{
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/add_device_repair_outofstorage_process.php",
				type: "POST",
				data: {
					"datetime": datetime,
					"nr_tabor": nr_tabor,
					"sn[]": sn,
					"repair_devices_definitions_outofstorage": repair_devices_definitions_outofstorage,
					"city": city,
					"opis_awarii": opis_awarii,
				},
				success: function(data) {
					 location.reload();
				}
			});
		}
	});
	
	$('#back').click(function(){
		location.reload();
	})
	
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
<!--<div id="back">Powrót</div>-->
<h3>Utwórz naprawę</h3><br />

	
	<?php
		echo '<table>';
		echo '<tr>';
		echo '<td>Data utworzenia naprawy</td><td><input type="text" name="start_repair_datetime" value="'.date("Y-m-d H:i:s").'" disabled /></td>';
		echo '<td>Użytkownik</td><td><input type="text" value="'.$_SESSION['mennica_magazyn_user_name'].'" disabled /></td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>Miasto</td><td><select id="city">
				<option value="0">Wybierz z listy</option>
				<option value="Bydgoszcz">Bydgoszcz</option>
				<option value="Gdańsk">Gdańsk</option>
				<option value="Jaworzno">Jaworzno</option>
				<option value="Katowice">Katowice</option>
				<option value="Lódź">Lódź</option>
				<option value="Warszawa">Warszawa</option>
				<option value="Wrocław">Wrocław</option>
			</select></td>
			<td>Wybierz urządzenie z listy</td><td><select name="repair_devices_definitions_outofstorage" id="repair_devices_definitions_outofstorage">
				<option selected disabled="disabled" value="0">Rozwiń listę</option>';
					foreach($vectorsoft_magazyn->repair_devices_definitions_outofstorage() as $row)
					{
						echo "<option value='".$row['id']."'>".$row['name']."</option>";
					}
		echo '</select></td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>Nr taboru</td><td><input type="text" name="nr_tabor"  /></td>';
		echo '<td></td><td></td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td style="display:table-cell; vertical-align:middle;">Numer seryjny (Pole wymagazne) <br /><p style="font-size:12pt;">Naciśnij <img src="assets/icons/file_add.png" width="20"/>aby dodać kolejną pozycję</p></td><td style="display:table-cell; vertical-align:middle;"><input type="text" name="sn[]" placeholder="Numer seryjny"/><div id="myTabContent"></div><br /><img src="assets/icons/file_add.png" id="btn" width="30" alt="Dodaj następny"></td>';
		echo '<td style="display:table-cell; vertical-align:middle;">Zgłoszenie awarii</td><td><textarea name="opis_awarii"></textarea></td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td colspan="2"><button id="back" style="background-color:#FFFF99; border:1px solid #000; float:left; width:250px">Anuluj</button></td>';
		echo '<td colspan="2"><button id="save_repair" style="background-color:#66FF66; border:1px solid #000; float:right;width:250px">Utwórz naprawę</button></td>';
		echo '</tr>';
		echo "</table>";
	?>
