<?php
require('../../../config/db.class.php');

echo "<br /><br /><h4>Typy automatów:</h4>";
foreach($mennica_magazyn->getAutomat_type() as $row)
{
	echo "<div class='remove_row'>".$row['name']."<a href='#' id='".$row['name']."' class='remove'>Usuń</a></div>";
}