<?php
require("../../../config/db.class.php");
echo "<h4>Wybierz nazwę dokumentu</h4>";
echo "<select id='arrival_select_List'>";
echo "<option disabled selected>Wybierz z listy</option>";
foreach($vectorsoft_magazyn->get_arrival_details_by_type($_GET['arrival_type_id'], $_SESSION['mennica_magazyn_storage_id']) as $row)
{
	echo "<option value='".$row['id']."'>".$row['document_name']."</option>";
}
echo "</select>";
?>