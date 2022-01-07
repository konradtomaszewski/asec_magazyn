<script> 
$(document).ready(function(){
	$("#sortTable").tablesorter();
});
</script>
<?php
require('../../../config/db.class.php');
$storage_id = $_SESSION['mennica_magazyn_storage_id'];

$delivary_details = $vectorsoft_magazyn->getBrokenDelivery_details($_POST['document_name'], $storage_id);

echo "<br /><h2>Informacje o dokumencie: ".$delivary_details[0]['document_name']."</h2>";
echo "<h3>Typ dokumentu: ".$delivary_details[0]['arrival_type']."</h3><br />";

echo "<div style='background:#f8f8f8; border:1px solid #ccc; height:90px; padding:20px 40px 20px 40px;'>";
	echo "<div style='float:left'>";
	if($delivary_details[0]['accept_user'] == null)
	{
		echo "<h4><i>Towar wydany przez ".$delivary_details[0]['create_user']."<br /> w dniu ".$delivary_details[0]['create_date']."</i></h4>";
	}
	else
	{	
	echo "<h4><i>Dostawa utworzona przez ".$delivary_details[0]['create_user']."<br />w dniu ".$delivary_details[0]['create_date']."</i></h4>";
	}
	echo "</div>";

	echo "<div style='float:right'>";
	
	if($delivary_details[0]['accept_user'] == null)
	{
		echo "<h4><i>Towar wydany serwisantowi ".$delivary_details[0]['release_user']."<br /> w dniu ".$delivary_details[0]['release_date']."</i></h4>";
	}
	else
	{	
		echo "<h4><i>Dostawa przyjęta przez ".$delivary_details[0]['accept_user']."<br />w dniu ".$delivary_details[0]['accept_date']."</i></h4>";
	}
	echo "</div>";
echo "</div>";


echo "<br /><br /><br /><h3>Lista pozycji:</h3>";
echo "<table id='sortTable'>";
echo "<thead>";
echo "<th>Grupa urządzeń</th>";
echo "<th>Nazwa urządzenia</th>";
echo "<th>Ilość</th>";
echo "</thead>";
foreach($vectorsoft_magazyn->getBrokenDelivery_details($_POST['document_name'], $storage_id) as $row)
{
	echo "<tr><td>".$row['automat_type']."</td><td>".$row['product_name']."</td><td>".$row['product_quantity']."</td></tr>";
}
echo "</table>";
?>