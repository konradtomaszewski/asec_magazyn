<?php
require('../../../config/db.class.php');
$storage_id = $_COOKIE['storage_id'];

echo "<div id='arrivalDeliveryList_select'>";	
		echo '<label>Wybierz z listy dokument</label>';
			echo '<select name="arrivalDeliveryList" id="arrivalDeliveryList">
						<option selected disabled="disabled">Rozwiń listę</option>';
						foreach($mennica_magazyn->getAllDeliveryList($storage_id) as $row)
						{
							echo "<option value='".$row['document_name']."'>".$row['document_name']."</option>";
						}
			echo '</select>';
echo "</div>";