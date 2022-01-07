<script>
$(document).ready(function(){
	
	$('#delivery_details_form').load("app_resources/"+$.cookie('module')+"/lib/broken_delivery_details_form.php",function(){
		$('#arrivalDeliveryList').change(function(){
			var document_name = $(this).val();
			$.ajax({
						url: "app_resources/"+$.cookie('module')+"/lib/broken_delivery_details_process.php",
						type: "POST",
						data: "document_name="+document_name,
						success: function(data) {
								$("#delivery_details_results").html(data);
		
						},
						error: function(data){
							$.notify('Błąd', 'error');
						}
			});
		});
	});
	
	
	
});
</script>	
<style>
select{
	width:10em;
	padding-left:10px;
}
</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Szczegóły dostawy/wydania towaru</h3></div>
		</header>
		
		<section>
			<div id="delivery_details_form"></div>
			<div id="delivery_details_results"></div>
		</section>
	</article>
</div>