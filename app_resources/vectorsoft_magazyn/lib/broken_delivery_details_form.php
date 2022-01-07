<?php
require('../../../config/db.class.php');
?>

<form id="accept_delivery_form">
	
	<?php

		echo '<label>Wybierz z listy dokument</label>';
		echo '<select name="arrivalDeliveryList" id="arrivalDeliveryList">
		<option selected disabled="disabled">Rozwiń listę</option>';
			foreach($vectorsoft_magazyn->getBrokenDeliveryList($_SESSION['mennica_magazyn_storage_id']) as $row)
			{
				echo "<option value='".$row['document_name']."'>".$row['document_name']."</option>";
			}
		echo '</select>';

	?>
	
</form>
<div id="delivery_details_results"></div>