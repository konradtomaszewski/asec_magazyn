<?php
require('../../../config/db.class.php');

	echo "<div id='storagelist_select'>";	
		echo '<label>Wybierz z listy magazyn</label>';
			echo '<select name="storageList" id="storageList">
						<option selected disabled="disabled">Rozwiń listę</option>';
						foreach($mennica_magazyn->getStorageList() as $row)
						{
							echo "<option value='".$row['id']."'>".$row['name']."</option>";
						}
			echo '</select>';
	echo "</div>";

	?>
