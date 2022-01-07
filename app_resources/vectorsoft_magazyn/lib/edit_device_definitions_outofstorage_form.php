<?php
require('../../../config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#edit_new_device').click(function(){
		var device_name = $('input[name="device_name"]').val();
		var device_id = $('input[name="device_id"]').val();
		var device_type = $('#device_type option:selected').val();
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/edit_device_definitions_outofstorage_process.php",
			type: "POST",
			data: "device_name="+device_name+"&device_type="+device_type+'&device_id='+device_id,
			success: function(data) {
				 location.reload();
			}
		});
	});
	
	$('#back').click(function(){
		$('#edit_device_definitions').hide();
		$('#add_device').show();
	})
		
});
</script>
<div id="edit_device_definitions" style="margin-bottom:50px;">
<?php
$device_id = $_GET['device_id'];
foreach($vectorsoft_magazyn->get_device_definitions_outofstorage($device_id) as $row)
{
?>
	<h3>Edytuj urządzenie</h3>
	<table>
		<tr>
			<input type="hidden" name="device_id" value="<?php echo $device_id ?>"/>
			<td>Nazwa urządzenia</td><td><input type="text" name="device_name" value="<?php echo $row['name']?>"/></td>
			<td>Typ urządzenia</td><td><select id="device_type">
			<?php echo '<option value="'.$row['type'].'">Aktualnie wybrano: '.$row['type'].'</option>'?>
			<option value="Mobilne">Mobilne</option>
			<option value="Stacjonarne">Stacjonarne</option>
			<option value="Drukarka kioskowa">Drukarka kioskowa</option>
			<option value="Terminal kioskowy">Terminal kioskowy</option>
			</select></td>
		</tr>
	
		<tr>
			<td colspan="2"><button id="back" style="background-color:#FFFF99; border:1px solid #000; float:left; width:250px">Anuluj</button></td>
			<td colspan="2"><button id="edit_new_device" style="background-color:#66FF66; border:1px solid #000; float:right;width:250px">Zapisz</button></td>
		</tr>
	</table>	
<?php }?>
</div>