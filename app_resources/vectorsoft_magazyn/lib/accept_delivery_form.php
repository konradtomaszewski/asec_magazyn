<?php
require('../../../config/db.class.php');
?>

<form id="accept_delivery_form">
	
	<?php
	if($vectorsoft_magazyn->getDeliveryToAcceptList($_SESSION['mennica_magazyn_storage_id']) != NULL)
	{
		echo '<label>Wybierz z listy dostawę do zatwierdzenia</label>';
		echo '<select name="arrivalDeliveryList" id="arrivalDeliveryList">
		<option selected disabled="disabled">Rozwiń listę</option>';
			foreach($vectorsoft_magazyn->getDeliveryToAcceptList($_SESSION['mennica_magazyn_storage_id']) as $row)
			{
				echo "<option value='".$row['document_name']."'>".$row['document_name']."</option>";
			}
		echo '</select>';
	}
	else echo "<h4>Brak dostaw do zatwierdzenia</h4>";
	?>
	
</form>
<div id="arrivalDelivery_results"></div>