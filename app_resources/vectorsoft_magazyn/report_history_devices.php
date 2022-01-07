<?php
require('config/db.class.php');
?>
<script>
 $(document).ready(function(){
	$("#report_history_devices_btn").click(function(){
		var product_id = $('#product_id').find(":selected").val();
		
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/report_history_devices_process.php",
				type: "POST",
				data: "product_id="+product_id,
				success: function(data) {
						$("#report_history_devices_result").hide().fadeIn("slow").html(data);
						$("#sortTable").tablesorter();
				},
				error: function(data){
					$.notify('Błąd pobierania danych', 'error');
				}
		});
	})	
 });
</script>

<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Raport z historii urządzeń</h3></div>
		</header>
		<section>
			<div id="select_product">
				<select id="product_id" style="height:40px">
				<option disabled selected="selected">Wybierz urządzenie</option>
				<?php
					foreach($vectorsoft_magazyn->getProductsList($_SESSION['mennica_magazyn_storage_id']) as $row){
						echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
					}
				?>
				</select>
						
				<input type="button" id="report_history_devices_btn" value="Generuj" style="width:auto" />
				<br /><br />
			</div>
			<div id="report_history_devices_result"></div>
		</section>
	</article>
</div>
 