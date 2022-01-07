<script>
$(document).ready(function(){
	$('#automat_number').hide();
	$('#btn').click(function(){
		$("#btn").attr("disabled", "disabled"); 
		$("#btn").attr("value", "Przetwarzanie...");
		
		var arrival_id = $('input[name="arrival_id"]').val();
		var product_name = $('input[name="product_name"]').val();
		var product_id = $('input[name="product_id"]').val();
		var service_request_id = $('input[name="service_request_id"]').val();
		var sn = $('input[name="sn"]').val();
		//var sn = '';
		var quantity = $('input[name="quantity"]').val();
		var max_quantity = $('input[name="max_quantity"]').val();
		var bus_number = $('input[name="bus_number"]').val();
		var automat_number = $('input[name="automat_number"]').val();
		var service_status = $('#service_status').val();
		
		//sprawdzanie przed wysłaniem czy pola required są wypełniona		
		var unfilled = $('[required]').filter(function() {
			return $(this).val().length === 0;
		});
		if (unfilled.length > 0) {
			unfilled.css('border', '2px solid #F08080');
			$.notify("Wypełnij wymagane pola", "error");
			setTimeout(function(){ 
				unfilled.removeAttr( 'style' ); 
				}, 2500
			);
			return false;
		}
		//---/
		if(Number(quantity) == 0){
			alert("Wprowadź wartość większą niż 0");
			return false;
		}
		if(Number(quantity)>Number(max_quantity)){
			alert("Maksymalnie możesz wpisać "+max_quantity+" szt.");
			return false;
		}
		if(service_status === null){
			alert("Wybierz status");
			return false;
		}
		
		var r = confirm("Czy napewno chcesz zapisać?");
		if (r == true) {
			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/service_request_realize.php",
					type: "POST",
					data: "service_request_id="+service_request_id+"&product_name="+product_name+"&product_id="+product_id+"&arrival_id="+arrival_id+"&quantity="+quantity+"&sn="+sn+"&service_status="+service_status+"&bus_number="+bus_number+"&automat_number="+automat_number,
					success: function(data) {
							$.notify("Pomyślnie zapisano","success");
							setTimeout(function(){
							  location.reload();
							}, 2500);
							
					},
					error: function(data){
						$.notify('występił błąd', 'error');
					}
			});
		}
		else return false;
	});
	
	$('#service_status').change(function(){
		var id = $(this).val();
		//alert(id);
		if(id == 2 || id == 7)
		{
			$('#automat_number').show("slow");
			$('input[name="automat_number"]').prop('required', true);
		}
	});
});
</script>
<style>
#btn{
	width:auto;
}
input, select{
	height:3em;
	width:15em;
	margin-right:15px;
	padding-left:10px;
}
h4{
	text-align:left !important;
}
</style>
<?php
require('../../../config/db.class.php');

echo "<input type='hidden' name='service_request_id' value='".$_POST['service_request_id']."'>";
echo "<input type='hidden' name='product_id' value='".$_POST['product_id']."'>";
echo "<input type='hidden' name='arrival_id' value='".$_POST['arrival_id']."'>";
echo "<input type='hidden' name='max_quantity' value='".$_POST['quantity']."'>";
echo "<h4>Wybrane urządzenie</h4><input type='text' disabled='disabled' name='product_name' value='".$_POST['product_name']."'>";
echo "<br /><br /><h4>Numer seryjny</h4><input type='text' name='sn' value='".$_POST['sn']."'>";
echo "<br /><br /><h4>Ilość</h4><input type='number' name='quantity' max='".$_POST['quantity']."' min='1' value='1'><b>MAX: ".$_POST['quantity']."</b>";

echo "<br /><br /><h4>Wykonana czynność</h4><select id='service_status'>";
echo "<option disabled selected>Wybierz z listy</option>";
foreach($serviceman->getService_status() as $row)
{
	echo "<option value='".$row['id']."'>".$row['name']."</option>";
}
echo "</select>";

echo "<div id='automat_number'><br /><br /><h4>Inormacja o automacie</h4>
		<input type='hidden' name='bus_number'  placeholder='Wprowadź numer pojazdu'/>
		<input type='text' name='automat_number'  placeholder='Wprowadź numer automatu'/>
	</div>";
echo "<br /><br /><input id='btn' type='button' value='Zapisz' />";
?>
<div style="clear:both">&nbsp;</div>