<script>
$(document).ready(function(){
		$('#change_product_name').click(function(){
				var product_id = $('input[name=product_id]').val();
				var product_name = $('input[name=product_name]').val();
				var automat_type = $('select[name=automat_type] option:selected').val();
				console.log(product_id);
				console.log(product_name);
				console.log(automat_type);
				
				$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/manage_products_name_process.php",
					type: "POST",
					data: "product_name="+product_name+"&product_id="+product_id+"&automat_type="+automat_type,
					success: function(data) {
						location.reload();
						$.notify('Nazwa urządzenia została zmieniona', 'success');
					},
					error: function(data){
						$.notify('Błąd', 'error');
					}
				});
			});
});
</script>
<?php
require('../../../config/db.class.php');
$product_name= $_POST['product_name'];
$product_id= $_POST['product_id'];


echo "<br />";
foreach($mennica_magazyn->getProductDetails($product_id) as $row)
{
	echo "<label>Zmień nazwę urządzenia</label>";
	//echo "<input type='text' disabled='disabled' value='".$row['automat_type']."' /><br /><br />";
	echo "<input type='text' name='product_name' value='".$row['name']."' /><br /><br />";
	echo "<input type='hidden' name='product_id' value='".$row['id']."' />";
}
$product_details = $mennica_magazyn->getProductDetails($product_id);
$actually_automat_type = $product_details[0]['automat_type'];

echo "<label>Przypisz do nowej grupy<label>";
echo "<select name='automat_type'>";
echo "<option selected disabled value='".$actually_automat_type."'>Aktualnie: ".$actually_automat_type."</option>";
foreach($mennica_magazyn->getAutomat_type() as $row)
{
	echo "<option value='".$row['name']."'>".$row['name']."</option>";
}
echo "</select><br /><br />";
echo "<input type='button' value='Zmień' id='change_product_name'/>";
?>