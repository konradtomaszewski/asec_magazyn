<?php
require('../../../config/db.class.php');

			echo '<h4>Wybierz urządzenie z listy</h4>';
			echo '<select id="productSelect">
						<option selected disabled="disabled">Rozwiń listę</option>';
						foreach($serviceman->getService_request() as $row)
						{
							if($row['quantity'] > 0)
							{
								echo "<option value='".$row['service_request_id']."$".$row['product_name']."$".$row['product_id']."$".$row['arrival_id']."$".$row['quantity']."$".$row['sn']."'>".$row['product_name']."</option>";
							}
						}
			echo '</select>';
			echo "<div style='clear:both'>&nbsp;</div>";

?>