
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
				$("#arrival_document_number").html('<h3><br />Dokument zwrotu towaru na magazyn: </h3><input type="text" disabled="disabled" name="document_name"  value="'+data+'">');
			},
			error: function(data) {
				//$.notify("Dane nie zostały zapisane", "error");
			}
		});
	});
	
		$('#devices_for_return_btn').click(function(){
			$('#devices_for_return_btn').attr("disabled", "disabled");
			$('#devices_for_return_btn').css("width", "200px");
			$('#devices_for_return_btn').attr("value", "Przetwarzanie...");
			setTimeout(function(){ 
						$('#devices_for_return_btn').removeAttr("disabled");
						$('#devices_for_return_btn').css("width", "100px");						
						$('#devices_for_return_btn').attr("value", "Zwróć");
						}, 2500
				);
			var document_name = $('input[name="document_name"]').val();
			var serviceman_user_id = $('input[name="serviceman_user_id"]').val();
			var product_id = $('input[name="product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
				
			var product_name = $('input[name="product_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
				
			var sn = $('input[name="sn[]"]').map(function(){ 
                    return this.value; 
                }).get();	
				
			var quantity = $('input[name="quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();
			if(product_id.length == 0)
			{
				$.notify("Brak urządzeń do zwrotu", "error");
				return false;
			}
			
			//sprawdzanie przed wysłaniem czy pola required są wypełniona		
			var unfilled = $('[required]').filter(function() {
				return $(this).val().length === 0;
			});
			if (unfilled.length > 0) {
				unfilled.css('border', '2px solid #F08080');
				$.notify("Uzupełnij wszystkie pola", "error");
				setTimeout(function(){ 
						unfilled.removeAttr( 'style' ); 
						}, 2500
				);
				return false;
			}
			//---/			
			$.ajax({	
				url: "app_resources/"+$.cookie('module')+"/lib/devices_for_return_process.php",
				type: "POST",
				data: {
					"document_name": document_name,
					"serviceman_user_id": serviceman_user_id,
					"product_name[]": product_name,
					"sn[]": sn,
					"quantity[]": quantity,
					"product_id[]": product_id,
					},
				success: function(data) {
					$.notify("Dane zostały zapisane", "success");
					setTimeout(function(){
							location.reload();
					},2500);
				},
				error: function(data) {
					$.notify("Dane nie zostały zapisane", "error");
				}
			});	

		});
});
</script>
<?php
require('../../../config/db.class.php');
$serviceman_user_id = $_POST['serviceman_user_id'];

	echo "<div id='arrival_document_number'></div><br />";
	
	echo "<h3>Lista pozycji do zwrotu</h3>";
	$x=1;
	foreach($vectorsoft_magazyn->devices_for_return($_SESSION['mennica_magazyn_storage_id'], $serviceman_user_id) as $row)
	{
		
		if($row['quantity']>0)
		{	
			//$x=1;
			echo $x++.". 
			<input type='hidden' name='product_id[]' value='".$row['product_id']."'/>
			<input type='hidden' name='serviceman_user_id' value='".$serviceman_user_id."'/>
			<input type='text' disabled='disabled' name='product_name[]' value='".$row['product_name']."'/>
			<input type='text' disabled='disabled' name='sn[]' value='".$row['sn']."'/>
			<input type='number' disabled='disabled' name='quantity[]' value='".$row['quantity']."' /><br />";
		}
	}
	//if($x >= 1)
	//{
		echo "<br /><input type='button' id='devices_for_return_btn' value='Zwróć' />";
	//}
	//else echo "<h4>Brak urządzeń do zwrotu</h4>";
	


?>