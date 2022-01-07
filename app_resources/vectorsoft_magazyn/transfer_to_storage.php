<?php
require('config/db.class.php');
?>
<style>
#btn{
	width:15em;
	float:right;
}
input::placeholder {
	text-align: left;
	padding-left:10px;
}
input[type="text"],input[type="number"]{
	width:15em;
	margin-right:1.5em;
	margin-bottom:0.5em;
	height:2em;
	padding-left:10px;
}
</style>
<script>
$(document).ready(function(){
	$('#arrival_document_number').each(function(){
		var arrival_type_id = '4';
		var arrival_type_prefix = 'WEW';
		
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
	
	$('#btn').click(function(){
		$('#btn').attr("disabled", "disabled");
		$('#btn').attr("value", "Przetawarzanie...");
		setTimeout(function(){ 
				$('#btn').removeAttr("disabled");
				$('#btn').attr("value", "Zatwierdź na magazyn");
			}, 2500
		);
		
		var document_name = $('input[name="document_name"]').val();
		var damaged_devices_id = $('input[name="damaged_devices_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var product_name = $('input[name="product_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var product_id = $('input[name="product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var sn = $('input[name="sn[]"]').map(function(){ 
                    return this.value; 
                }).get();
		console.log(sn);
		var quantity = $('input[name="quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();
				
		if(product_name.length < 1)
		{
			$.notify("Dane nie zostały zapisane.", "error");
			$.notify("Brak urządzeń.", "error");
			return false;
		}
		//sprawdzanie przed wysłaniem czy pola required są wypełniona		
		var unfilled = $('[required]').filter(function() {
			return $(this).val().length === 0;
		});
		if (unfilled.length > 0) {
			unfilled.css('border', '2px solid #F08080');
			$.notify("Wprowadź nazwę dokumentu", "error");
			setTimeout(function(){ 
					unfilled.removeAttr( 'style' ); 
					}, 2500
			);
			return false;
		}
		//---/		
				
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/transfer_to_storage_process.php",
				type: "POST",
				data: {
					"damaged_devices_id[]": damaged_devices_id,
					"sn[]": sn,
					"product_name[]": product_name,
					"product_id[]": product_id,
					"document_name": document_name,
					"quantity[]": quantity,
					},
				success: function() {
					location.reload();
				},
				error: function(data){
					$.notify('Błąd', 'error');
				}
		});
	});
});
</script>
<div id="main">

		<article class="post">
			<header>
				<div class="title"><h3>Przekaż urządzenia na magazyn</h3></div>
			</header>
			<section>
			<div id="arrival_document_number"></div>
			<br />
			<h3>Lista pozycji</h3>
				<table>
				<thead>
				<th>Typ automatu</th>
				<th>Nazwa urządzenia</th>
				<th>Numer seryjny</th>
				<th>Ilość</th>
				<th>Działania</th>
				</thead>
				<tbody>
				<?php
				foreach($vectorsoft_magazyn->getDamagedDevicesWorks($_SESSION['mennica_magazyn_storage_id']) as $row)
				{
						echo "<tr><td>".$row['automat_type']."</td><td>".$row['product_name']."</td><td>".$row['sn']."</td><td>".$row['quantity']."</td><td>Cofnij do uszkodzone serwis zew.</td></tr>";
						echo "<input type='hidden' name='damaged_devices_id[]' value='".$row['damaged_devices_id']."' />";
						echo "<input type='hidden' name='product_name[]' value='".$row['product_name']."' />";
						echo "<input type='hidden' name='product_id[]' value='".$row['product_id']."' />";
						echo "<input type='hidden' name='sn[]' value='".$row['sn']."' />";
						echo "<input type='hidden' name='quantity[]' value='".$row['quantity']."' />";
				}
				?>
				</tbody>
				</table>
				<input type="button" id="btn" value="Zatwierdź na magazyn"/>
				<div style="clear:both"></div>
				
			</section>
		</article>

</div>