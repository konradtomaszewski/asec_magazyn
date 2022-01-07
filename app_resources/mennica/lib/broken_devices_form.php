<?php
require('../../../config/db.class.php');
$broken_devices_arrival_id = $_POST['broken_devices_arrival_id'];
?>
<script>
$(document).ready(function(){
	$('#btn').click(function(){
		var product_id = $('input[name="product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var arrival_id = $('input[name="arrival_id"]').val();
		var storage_id = $('input[name="storage_id"]').val();
		var quantity = $('input[name="quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var broken_product_sn = $('input[name="broken_product_sn[]"]').map(function(){ 
                    return this.value; 
                }).get();		
		
		console.log(product_id);
		console.log(arrival_id);
		console.log(quantity);
		
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/broken_devices_process.php",
			type: "POST",
			data: {
				"product_id": product_id,
				"storage_id": storage_id,
				"arrival_id": arrival_id,
				"quantity": quantity,
				"broken_product_sn": broken_product_sn,
				},
			success: function(data) {
				//$('#broken_devices_list').html(data);
				location.reload();
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});
	});
});
</script>
<?php
echo "<br /><br />";
echo "<h3>Lista pozycji</h3><br />";
echo "<table>";
echo "<thead>";
echo "<th>Nazwa magazynu</th>";
echo "<th>Typ automatów</th>";
echo "<th>Nazwa urządzenia</th>";
echo "<th>Numer seryjny</th>";
echo "<th>Ilość</th>";
echo "</thead>";
echo "<tbody>";
foreach($mennica_magazyn->getDamagedDevices_items($broken_devices_arrival_id) as $row)
{
	if($row['quantity'] > 0)
	{
		echo "<tr><td>".$row['storage_name']."</td><td>".$row['automat_type']."</td><td>".$row['product_name']."</td><td>".$row['broken_product_sn']."</td><td>".$row['quantity']."</td><tr>";
		echo "<input type='hidden' name='product_id[]' value='".$row['product_id']."' />";
		echo "<input type='hidden' name='arrival_id' value='".$row['arrival_id']."' />";
		echo "<input type='hidden' name='broken_product_sn[]' value='".$row['broken_product_sn']."' />";
		echo "<input type='hidden' name='quantity[]' value='".$row['quantity']."' />";
		echo "<input type='hidden' name='storage_id' value='".$row['storage_id']."' />";
	}

}
echo "<tbody>";
echo "</table>";
echo "<input type='button' id='btn' value='Zatwierdź' />";
echo "<div style='clear:both'></div>";
?>