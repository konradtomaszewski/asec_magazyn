<?php
require('../../../config/db.class.php');
echo "<h4>Wybierz typ dokumentu</h4>";
echo "<select id='arrival_type_select_list'>";
echo "<option disabled selected>Wybierz z listy</option>";
foreach($vectorsoft_magazyn->get_arrival_types() as $row)
{
	echo "<option value='".$row['id']."'>".$row['name']."</option>";
}
echo "</select>";
?>