<?php
require('../../../config/db.class.php');
?>

<form id="accept_delivery_form">
	
	<?php
	if($vectorsoft_magazyn->getDeliveryToAcceptList($_COOKIE['storage_id']) != NULL)
	{
		echo '<br /><h4>Wybierz z listy dostawę do korekty</h4>';
		echo '<select name="arrivalDeliveryList" id="arrivalDeliveryList">
		<option selected disabled="disabled">Rozwiń listę</option>';
			foreach($vectorsoft_magazyn->getDeliveryToAcceptList($_COOKIE['storage_id']) as $row)
			{
				echo "<option value='".$row['document_name']."'>".$row['document_name']."</option>";
			}
		echo '</select>';
	}
	else echo "<h4><br /><br />Brak niezatwierdzonych dostaw</h4>";
	?>
	
</form>
<div id="arrivalDelivery_results"></div>