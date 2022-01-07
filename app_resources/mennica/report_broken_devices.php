<?php
require('config/db.class.php');
?>
<script>
 $(document).ready(function(){
	$.datetimepicker.setLocale('pl');

	$('#time_of').datetimepicker({
		timepicker:false,
		format:'Y-m-d'
	}).change(function(){
		var date_of = $(this).val();
		$.cookie('date_of', date_of);
	});
	$('#time_to').datetimepicker({
		 timepicker:false,
		format:'Y-m-d'
	}).change(function(){
		var date_to = $(this).val();
		$.cookie('date_to', date_to);
	});

	
	$('#delivery_report_btn').click(function(){
		var date_of = $.cookie('date_of');
		var date_to = $.cookie('date_to');
		
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/report_broken_devices_process.php",
				type: "POST",
				data: "date_of="+date_of+"&date_to="+date_to,
				success: function(data) {
						$("#delivery_report_result").hide().fadeIn("slow").html(data);
						$("#sortTable").tablesorter();
				},
				error: function(data){
					$.notify('Błąd pobierania danych', 'error');
				}
		});
		
	});
});
</script>

<style>
input{
	padding-left:10px;
	height:30px;
	width:10em !important;
}
#delivery_report_btn{
	float:right;
	margin-bottom:20px;
}
</style>
  <div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Raport przesłanego uszkodzonego sprzętu do serwisu Mennicy</h3></div>
			
		</header>
		<section>
		<div id="select_date">
			<h4>Wybierz zakres dat</h4>
			<table style="text-align:center;">
				<tr>
					<td><label>Data od</label><input type="text" id="time_of" value="<?php echo @$_COOKIE['date_of']?>"></td>
					<td><label>Data do</label><input type="text" id="time_to" value="<?php echo @$_COOKIE['date_to']?>"></td>
				</tr>
			</table>
			<input type="button" id="delivery_report_btn" value="Generuj" />
			<div style="clear: both;"></div>
		</div>
		<div id="delivery_report_result"></div>
	</section>
	</article>
</div>
 
