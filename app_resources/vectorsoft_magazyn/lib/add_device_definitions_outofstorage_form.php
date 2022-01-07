
<script>
$(document).ready(function(){
	$('#add_new_device').click(function(){
		var new_device = $('input[name="new_device"]').val();
		var new_device_type = $('#new_device_type option:selected').val();
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/add_device_definitions_outofstorage_process.php",
			type: "POST",
			data: "new_device="+new_device+"&new_device_type="+new_device_type,
			success: function(data) {
				 location.reload();
			}
		});
	});
	
	$('#back').click(function(){
		$('#new_device_definitions').hide();
		$('#add_device').show();
	})
		
});
</script>

<div id="new_device_definitions" style="margin-bottom:50px;">
	<h3>Nowe urządzenie</h3>
	<table>
		<tr>
			<td>Nazwa urządzenia</td><td><input type="text" name="new_device" /></td>
			<td>Typ urządzenia</td><td><select id="new_device_type">
			<option value="Mobilne">Mobilne</option>
			<option value="Stacjonarne">Stacjonarne</option>
			<option value="Drukarka kioskowa">Drukarka kioskowa</option>
			<option value="Terminal kioskowy">Terminal kioskowy</option>
			</select></td>
		</tr>
	
		<tr>
			<td colspan="2"><button id="back" style="background-color:#FFFF99; border:1px solid #000; float:left; width:250px">Anuluj</button></td>
			<td colspan="2"><button id="add_new_device" style="background-color:#66FF66; border:1px solid #000; float:right;width:250px">Zapisz</button></td>
		</tr>
	</table>	
</div>