<script>
$(document).ready(function(){
	$.cookie('arrival_type_id','');
	var arrival_type_id='';
	
	$('#arrival_type').load("app_resources/"+$.cookie('module')+"/lib/arrival_type_form.php",function(){
		$('#arrival_type_select_list').change(function(){
			var arrival_type_id = $(this).val();
			$.ajax({
					success: function() {
						$().arrival_list(arrival_type_id);
						$.cookie('arrival_type_id', arrival_type_id);
					}
			});
		});
	});

	$.fn.arrival_list = function(arrival_type_id) {
		$('#arrival_list').load("app_resources/"+$.cookie('module')+"/lib/arrival_list_form.php?arrival_type_id="+arrival_type_id, function(){
			$('#arrival_select_List').change(function(){
				var document_name = $('#arrival_select_List option:selected').text();
				console.log(document_name);
				$.ajax({
						url: "app_resources/"+$.cookie('module')+"/lib/delivery_details_process.php",
						type: "POST",
						data: "document_name="+document_name,
						success: function(data) {
								$("#arrival_details_results").hide().fadeIn("slow").html(data);
						},
						error: function(data){
							$.notify('Błąd pobierania danych', 'error');
						}
				});
			});
		});
	};
});
</script>	
<style>
select{
	width:15em;
	padding-left:10px;
}
.table_list td{
	text-align:center;
}
</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Informacje o dokumentach magazynowych</h3></div>
		</header>
		
		<section>
		<table class="table_list">
			<td><div id="arrival_type"></div></td><td><div id="arrival_list"></div></td>
		</table>
			<div id="arrival_details_results"></div>
			
		</section>
	</article>
</div>