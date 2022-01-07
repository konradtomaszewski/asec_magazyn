<script>
$(document).ready(function(){
	//ukrycie klawiatury ekranowej
	$('input').on('focus', function() { $(this).blur(); });
	
	$.datetimepicker.setLocale('pl');

	$('#date').datetimepicker({
		timepicker:false,
		format:'Y-m-d'
	}).change(function(){
		var date = $(this).val();
		$.cookie('date', date);
	});
	
	$("#btn").click(function(){
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/history_process.php",
				type: "POST",
				data: "date="+$.cookie('date'),
				success: function(data) {
						$("#result").hide().fadeIn("slow").html(data);
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
	height:5em;
	width:8em !important;
}
#btn{
	margin-left:30px;
	height:2.8em;
	width:8em !important;
}
</style>

<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Historia działań</h3></div>
		</header>
		<section>
			<input type="text" id="date" value="<?php echo @$_COOKIE['date']?>"><input type="button" value="POKAŻ" id="btn"/>
			<div style="clear:both">&nbsp;</div>
			<div style="clear:both">&nbsp;</div>
			<div id="result"></div>
		</section>
	</article>
</div>
