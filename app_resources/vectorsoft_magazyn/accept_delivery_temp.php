<script>
$(document).ready(function(){
	$('#section_success').hide();
	$('#correctDeliveryTemp').hide();
	$('#acceptDeliveryTemp').hide();
	
	$('#acceptDelivery_form').load("app_resources/"+$.cookie('module')+"/lib/accept_delivery_form.php",function(){
		$('#arrivalDeliveryList').change(function(){
			var document_number = $(this).val();
			$.ajax({
						url: "app_resources/"+$.cookie('module')+"/lib/getTempDeliveryDetails.php",
						type: "POST",
						data: "document_number="+document_number,
						success: function(data) {
								$("#arrivalDelivery_results").html(data);
								$('#correctDeliveryTemp').show();		
								$('#acceptDeliveryTemp').show();		
						},
						error: function(data){
							$.notify('Błąd', 'error');
						}
			});
		});
	});
	
	$('#correctDeliveryTemp').click(function(){
		if($('input[type=number]').prop('disabled')){	
			
			$('#correctDeliveryTemp').prop('value','Zakończ edycję');
			$('.item_quantity').removeProp('disabled');
			$('.item_sn').removeProp('disabled');
		}
		else{
			$('#correctDeliveryTemp').prop('value','Popraw dane');
			$('.item_quantity').prop('disabled','disabled');
			$('.item_sn').prop('disabled','disabled');
		}
	});
	
	$('#acceptDeliveryTemp').click(function(){
		$('#acceptDeliveryTemp').hide(); //ukrycie przycisku podczas zapisywania
		var item_name = $('input[name="item_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_sn = $('input[name="item_sn[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_product_id = $('input[name="item_product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_quantity = $('input[name="item_quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var arrival_type_id = $('input[name="arrival_type_id"]').val();
		var document_name = $('input[name="document_name"]').val();
		var storage_id = $('input[name="storage_id"]').val();
		var create_user_id = $('input[name="create_user_id"]').val();
		var create_date = $('input[name="create_date"]').val();
		
			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/accept_delivery_temp_process.php",
					type: "POST",
					data: {
						"item_sn[]": item_sn,
						"item_product_id[]": item_product_id,
						"arrival_type_id": arrival_type_id,
						"document_name": document_name,
						"item_name[]": item_name,
						"item_quantity[]": item_quantity,
						"storage_id": storage_id,
						"create_user_id": create_user_id,
						"create_date": create_date
						},
					success: function() {
						$.notify("Dane zostały zapisane", "success");
						$("#section_form").hide();
						$("#section_success").show("slow");
						setTimeout(function(){
							$("#accept_delivery_form")[0].reset();
							$("#section_success").hide("slow");
							location.reload();
						},4000);
					},
					error: function(data){
						$.notify('Błąd', 'error');
					}
			});
	});
});
</script>	
<style>
.item_quantity,
.item_sn,
.item_quantity:disabled, 
.item_sn:disabled{ 
	border:1px solid #aaa;
	color:#888;
	padding-left:10px;
	height:2em !important;
}

select{
	width:10em;
	padding-left:10px;
}

input[type="button"]{
	width:12em;
}

</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Zatwierdzanie dostwy tymczasowej</h3></div>
		</header>
		
		<section id="section_form">
			<div id="acceptDelivery_form"></div>
			<div id="arrivalDelivery_results"></div>
			<!--<input type="button" id="correctDeliveryTemp" value="Popraw dane">-->
			<input type="button" id="acceptDeliveryTemp" value="Zatwierdź dostawę">
			
		</section>
		<section id="section_success">
			<div style="text-align:center;"><h3>Dane są zapisywane...<br /><br /></h3></div>
		</section>
	</article>
</div>