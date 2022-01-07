<?php 
	require('../../../config/db.class.php');
	$repair_id = $_GET['repair_id'];
	$damaged_devices_id = $_GET['damaged_devices_id'];
?>
<script>
$(document).ready(function(){
	$('#save_changes').click(function(){
		var repair_id = $('input[name="repair_id"]').val();
		var damaged_devices_id = $('input[name="damaged_devices_id"]').val();
		var service_request_id = $('input[name="service_request_id"]').val();
		var sn = $('input[name="sn"]').val();
		var repair_time = $('input[name="amountInput"]').val();
		var description = $('textarea[name="description"]').val();
		if(sn.length <=0){
			alert("Podanie s/n jest wymagane");
			return false;
		}
		$.ajax({	
			url: "app_resources/"+$.cookie('module')+"/lib/custom_repair_devices_save_changes_process.php",
			type: "POST",
			data: {
				"repair_id": repair_id,
				"damaged_devices_id": damaged_devices_id,
				"service_request_id": service_request_id,
				"sn": sn,
				"repair_time": repair_time,
				"description": description,
				},
			success: function(data) {
				$.notify("Dane zostały zapisane", "success");
				setTimeout(function(){
						location.reload();
				},2500);
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});	
	});
});

function finish_repair(repair_id,damaged_devices_id){
	var sn = $('input[name="sn"]').val();
	if(sn.length <=0){
			alert("Podanie s/n jest wymagane");
			return false;
	}
	var r = confirm("Potwierdzasz zakończenie naprawy");
	if (r == true) {
		var http = new XMLHttpRequest();
		var url = "app_resources/"+$.cookie('module')+"/lib/custom_repair_devices_finish_repair_process.php";
		var params = "repair_id="+repair_id+"&damaged_devices_id="+damaged_devices_id;
		http.open("POST", url, true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.onreadystatechange = function() {//Call a function when the state changes.
			if(http.readyState == 4 && http.status == 200) {
				alert('Urządzenie zostało oznaczone jako sprawne, do przekazania na magazyn');
				window.open("index.php?action=my_devices_for_repair", "_self");
			}
		}
		http.send(params);
	} else {
		alert('Anulowano zakończenie naprawy');
		return false;
	}
}; 

function unfinish_repair(repair_id,damaged_devices_id){
	var sn = $('input[name="sn"]').val();
	if(sn.length <=0){
			alert("Podanie s/n jest wymagane");
			return false;
		}
	var r = confirm("Potwierdzasz zakończenie naprawy");
	if (r == true) {
		var http = new XMLHttpRequest();
		var url = "app_resources/"+$.cookie('module')+"/lib/custom_repair_devices_unfinish_repair_process.php";
		var params = "repair_id="+repair_id+"&damaged_devices_id="+damaged_devices_id;
		http.open("POST", url, true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.onreadystatechange = function() {//Call a function when the state changes.
			if(http.readyState == 4 && http.status == 200) {
				alert('Urządzenie zostało oznaczone jako niesprawne, do przekazania na serwis');
				window.open("index.php?action=my_devices_for_repair", "_self");
			}
		}
		http.send(params);
	} else {
		alert('Anulowano zakończenie naprawy');
		return false;
	}
}; 
</script>
<style>
	input{
		padding-left:10px;
		width:400px;
	}
	textarea{
		width:400px;
		height:250px;
		resize: none;
	}
	
</style>
<?php
foreach($serviceman->custom_repair($repair_id) as $row)
{	
	echo "<input type='hidden' name='repair_id' value='".$repair_id."'/>";
	echo "<input type='hidden' name='damaged_devices_id' value='".$row['damaged_devices_id']."'/>";
	echo "<input type='hidden' name='service_request_id' value='".$row['service_request_id']."'/>";
	echo "<table>";
	echo "<tr><td><label>Data rozpoczęcia naprawy</label></td><td><input type='text' disabled value='".$row['start_repair_datetime']."'/></td></tr>";
	echo "<tr><td><label>Nazwa urządzenia</label></td><td><input type='text' disabled value='".$row['repair_devices_name']."'/></td></tr>";
	echo "<tr><td><label>Interwencja wykonana przez</label></td><td><input type='text' disabled value='".$row['service_user_name']."'/></td></tr>";
	echo "<tr><td><label>Nr automatu</label></td><td><input type='text' disabled value='".$row['automat_number']."'/></td></tr>";
	echo "<tr><td><label>Nr seryjny (wymagane)</label></td><td><input type='text' name='sn' value='".$row['sn']."' placeholder='Gdy urządzenie nie posiada numeru sn wpisz brak'/></td></tr>";
	echo "<tr><td><label>Rzeczywisty czas naprawy</label></td><td><form><input type='range' name='amountRange' min='0' max='500' value='".$row['real_time_repair']."' oninput='this.form.amountInput.value=this.value' />&nbsp;&nbsp;&nbsp;<input type='number' disabled  name='amountInput' min='0' max='500' value='".$row['real_time_repair']."' oninput='this.form.amountRange.value=this.value' style='width:50px !important'/>&nbsp;&nbsp;minut</form></td></tr>";
	echo "<tr><td><label>Wykonane czynności</label></td><td><textarea name='description'>".$row['repair_description']."</textarea></td></tr>";
	echo "</table>";
}
?>
	<h3 style="color:red">Przed zakończeniem naprawy, zapisz zmiany!</h3>
	<button style="background-color:#FFFF99;" id='save_changes'>Zapisz zmiany</button>	
	<hr>	
	<button style="background-color:#66FF66;" onClick='finish_repair(<?php echo $repair_id.",".$damaged_devices_id;?>)'>Zakończ naprawę (Urządzenie sprawne)</button>									   
	<button style="float:right; background-color:#FFB4BF" onClick='unfinish_repair(<?php echo $repair_id.",".$damaged_devices_id;?>)'>Zakończ naprawę (Urządzenie niesprawne)</button>
	<br /><br />