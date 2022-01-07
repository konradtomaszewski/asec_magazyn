<script>
$(document).ready(function(){
	$('#arrival_document_number').each(function(){
		var arrival_type_id = '3';
		var arrival_type_prefix = 'Z';
		
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/generate_document_name.php",
			type: "POST",
			data: "arrival_type_id="+arrival_type_id+"&arrival_type_prefix="+arrival_type_prefix,
			success: function(data) {
				$("#arrival_document_number").html('<h3><br />Numer dokumentu dostawy: </h3><input type="text" disabled="disabled" name="document_name"  value="'+data+'">');
			},
			error: function(data) {
				//$.notify("Dane nie zostały zapisane", "error");
			}
		});
	});
	
	$('#serviceman_user_id').load("app_resources/"+$.cookie('module')+"/lib/serviceman_user_id_form.php",function(){
		$('#serviceman_select').change(function(){
			var serviceman_user_id = $('#serviceman_select').val();
			//alert(serviceman_user_id);
			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/devices_for_return_from.php",
					type: "POST",
					data: "serviceman_user_id="+serviceman_user_id,
					success: function(data) {
						$("#devices_for_return").html(data); 
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
input, select{
	height:3em;
	width:15em;
	margin-right:15px;
	padding-left:10px;
}
input[type="number"]{
	height:2.8em;
	width:5em;
	margin-bottom:10px;
}
h4{
	text-align: left !important;
}
</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Zwrot urządzeń na magazyn</h3></div>
			
		</header>
		<section>
	
		<div id="serviceman_user_id"></div>
		<div id="devices_for_return"></div>
							
		<span></span>
	</section>
	</article>
</div>