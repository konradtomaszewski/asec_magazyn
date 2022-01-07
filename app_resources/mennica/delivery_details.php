<script>
$(document).ready(function(){
	$('#delivery_details_form').load("app_resources/"+$.cookie('module')+"/lib/delivery_details_form.php",function(){
		$('#storageList').change(function(){
			var storage_id = $(this).val();
			$.cookie('storage_id', storage_id);
			$.ajax({
					success: function() {
						$().arrivalDeliveryList(storage_id);
						//$.cookie('storage_id', storage_id);
					}
			});
		});
	});

	$.fn.arrivalDeliveryList = function(storage_id) {
		$('#delivery_details_arrival_list').load("app_resources/"+$.cookie('module')+"/lib/delivery_details_arrival_list.php", function(){
			$('#arrivalDeliveryList').change(function(){
				var document_name = $(this).val();
				
				$.ajax({
						url: "app_resources/"+$.cookie('module')+"/lib/delivery_details_process.php",
						type: "POST",
						data: "document_name="+document_name+"&storage_id="+storage_id,
						success: function(data) {
							$("#delivery_details_results").html(data);
						},
						error: function(data){
							$.notify('Błąd ładowania listy dokumentów', 'error');
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
			<div class="title"><h3>Szczegóły dostawy towaru</h3></div>
		</header>
		
		<section>
		<table class="table_list">
			<td><div id="delivery_details_form"></div></td><td><div id="delivery_details_arrival_list"></div></td>
		</table>
			<div id="delivery_details_results"></div>
			
		</section>
	</article>
</div>