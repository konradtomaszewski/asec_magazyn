<?php
require('../../../config/db.class.php');

			echo '<h3>Wybierz z listy serwisanta</h3>';
			echo '<select id="serviceman_select">
						<option selected disabled="disabled">Rozwiń listę</option>';
						foreach($vectorsoft_magazyn->getSerwisantList($_SESSION['mennica_magazyn_storage_id']) as $row)
						{
							echo "<option value='".$row['id']."'>".$row['user_name']."</option>";
						}
			echo '</select>';

?>