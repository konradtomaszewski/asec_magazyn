<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$('#section_success').hide();
	$('#correctDeliveryTemp').hide();
	$('#acceptDeliveryTemp').hide();
	
	$('#storage_select').change(function(){
		$('#correctDeliveryTemp').hide();
		$('#acceptDeliveryTemp').hide();
		
		var storage_id = $(this).val();
		$.cookie('storage_id', storage_id);
		
		$('#acceptDelivery_form').load("app_resources/"+$.cookie('module')+"/lib/correct_delivery_form.php",function(){
			$('#arrivalDeliveryList').change(function(){
				var document_number = $(this).val();
				var storage_id = $.cookie('storage_id');
				$.ajax({
						url: "app_resources/"+$.cookie('module')+"/lib/getTempDeliveryDetails.php",
						type: "POST",
						data: "document_number="+document_number+"&storage_id="+storage_id,
						success: function(data) {
								$("#arrivalDelivery_results").hide().html(data).fadeIn("slow");
								$('#correctDeliveryTemp').show("slow");		
								$('#acceptDeliveryTemp').show("slow");
						},
						error: function(data){
							$.notify('Błąd', 'error');
						}
				});
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
		var item_id = $('input[name="item_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
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
		var document_name = $('input[name="document_name"]').val();
		var storage_id = $('input[name="storage_id"]').val();
		var create_user_id = $('input[name="create_user_id"]').val();
		var create_date = $('input[name="create_date"]').val();
		
			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/correct_delivery_temp_process.php",
					type: "POST",
					data: {
						"item_id[]": item_id,
						"item_sn[]": item_sn,
						"item_product_id[]": item_product_id,
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
	width:12em;
	padding-left:10px;
}

input[type="button"]{
	width:12em;
	margin-right:10px;
}

</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Korekta dostawy</h3></div>
		</header>
		
		<section id="section_form">
			<h4>Wybierz magazyn</h4>
			<select id="storage_select">
			<option selected disabled="disabled" >Wybierz z listy</option>
			<?php
				foreach($mennica_magazyn->getStorageList() as $row)
				{
					echo "<option value='".$row['id']."'>".$row['name']."</option>";
				}
			?>
			</select>
			
			<div id="acceptDelivery_form"></div>
			<div id="arrivalDelivery_results"></div>
			<input type="button" id="correctDeliveryTemp" value="Popraw dane">
			<input type="button" id="acceptDeliveryTemp" value="Zapisz korektę">
			
		</section>
		<section id="section_success">
			<div style="text-align:center;"><h3>Dane są zapisywane...<br /><br /></h3></div>
		</section>
	</article>
</div>