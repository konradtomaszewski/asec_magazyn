<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#brokenArrivals').change(function(){
		var broken_devices_arrival_id = $('#brokenArrivals').val();
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/broken_devices_form.php",
			type: "POST",
			data: "broken_devices_arrival_id="+broken_devices_arrival_id,
			success: function(data) {
				$('#broken_devices_list').html(data);
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});
	});
});
</script>
<style>
input,select{
	width:15em;
	padding-left:10px;
}

input[type=button]{
	width:10em;
	float:right;
}
</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Zatwierdź uszkodzone urządzenia na serwis Mennicy</h3></div>
		</header>
		<section>
			<?php
			if($mennica_magazyn->getBrokenDevices_arrivalList())
			{
				echo "<label>Wybierz dokument z listy:</label>";
				echo "<select id='brokenArrivals'>";
					echo "<option selected disabled>Wybierz z listy</option>";
					foreach($mennica_magazyn->getBrokenDevices_arrivalList() as $row)
					{
						echo "<option value='".$row['id']."'>".$row['document_name']."</option>";
					}
				echo "</select>";
			}
			else echo "<h4>Brak dokumentów do zatwierdzenia</h4>";
			?>
			
			<div id="broken_devices_list"></div>
		</section>
	</article>
</div>