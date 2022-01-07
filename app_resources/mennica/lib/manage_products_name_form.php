<?php
require('../../../config/db.class.php');

echo "<label>Lista urządzeń</label><select name='products_name_select'>";
echo "<option selected disabled value=''>Wybierz z listy</option>";
foreach($mennica_magazyn->getProductsList() as $row)
{
	echo "<option value='".$row['id']."'>".$row['name']."</option>";
}
echo "</select>";


?>