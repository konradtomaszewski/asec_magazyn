<?php
require('../../../config/db.class.php');

echo "<label>Grupa automatów</label><select class='automat_type_select'>";
echo "<option selected disabled value=''>Wybierz z listy</option>";
foreach($mennica_magazyn->getAutomat_type() as $row)
{
	echo "<option value='".$row['name']."'>".$row['name']."</option>";
}
echo "</select>";

echo "<br /><br /><label>Nazwa produktu</label><input type='text' name='product_name' min='3' placeholder='Nazwa produtku'/>";
echo "<br /><br /><input type='button' id='manage_products_btn' value='Zapisz' />";

?>