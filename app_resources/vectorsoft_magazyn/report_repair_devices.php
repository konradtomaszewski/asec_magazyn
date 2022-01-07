<script>
 $(document).ready(function(){
	$("#report_repair_devices_btn").click(function(){
		var month = $('#month').find(":selected").val();
		
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/report_repair_devices_process.php",
				type: "POST",
				data: "month="+month,
				success: function(data) {
						$("#report_repair_devices_result").hide().fadeIn("slow").html(data);
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
			<div class="title"><h3>Raport z napraw urządzeń</h3></div>
		</header>
		<section>
			<div id="select_month">
				<select id="month" style="height:40px">
				<option disabled selected="selected">Wybierz miesiąc</option>
				<option value="1">Styczeń</option>
				<option value="2">Luty</option>
				<option value="3">Marzec</option>
				<option value="4">Kwiecień</option>
				<option value="5">Maj</option>
				<option value="6">Czerwiec</option>
				<option value="7">Lipiec</option>
				<option value="8">Sierpień</option>
				<option value="9">Wrzesień</option>
				<option value="10">Październik</option>
				<option value="11">Listopad</option>
				<option value="12">Grudzień</option>
				</select>
						
				<input type="button" id="report_repair_devices_btn" value="Generuj" style="width:auto" />
				<br /><br />
			</div>
			<div id="report_repair_devices_result"></div>
		</section>
	</article>
</div>
 