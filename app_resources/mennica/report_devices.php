<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#storage_list').change(function(){
		var storage_id = $('#storage_list option:selected').val();
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/report_devices_process.php",
			type: "POST",
			data: "storage_id="+storage_id,
			success: function(data){
				$('#report_devices_result').html(data);
			}
		});
	});
});
</script>
<style>
select{
	width:15em;
	padding-left:10px;
}
</style>

<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Raport ilościowy urządzeń</h3></div>
		</header>
		<section>
			<?php
			echo "<h4>Wybierz z listy magazyn:</h4>";
			echo "<select id='storage_list'>";
			echo "<option value='' selected disabled>Wybierz z listy</option>";
			foreach($mennica_magazyn->getStorageList() as $row)
			{
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			echo "</select>";
			?>
			<br /><br />
			<div id="report_devices_result"></div>
		</section>
	</article>
</div>