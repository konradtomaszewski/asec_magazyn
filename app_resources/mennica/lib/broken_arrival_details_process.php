<?php
require("../../../config/db.class.php");
?>
<script>
$(document).ready(function(){
	$("#back_btn").click(function(){
		$("#broken_arrival_details").hide(),
		$("#select_date").show("slow"),
		$("#broken_arrival_list").show("slow");
	});
});
</script>
<a id="back_btn">Powrót</a><br />
<?php
echo "<h3>Szczegóły dokumentu ".$_POST['document_name']."</h3><br /><br />";
?>
<table>
<thead>
<th>Lp.</th>
<th>Magazyn</th>
<th>Nazwa urządzenia</th>
<th>Nr seryjny</th>
<th>Ilość</th>
<th>Serwis</th>
</thead>
</tbody>
<?php
$x=1;
foreach($mennica_magazyn->getDamagedDevices_items($_POST['broken_arrival_id']) as $row)
{
	echo "<tr><td>".$x++."</td><td>".$row['storage_name']."</td><td>".$row['product_name']."</td><td>".$row['broken_product_sn']."</td><td>".$row['quantity']."</td><td>".$row['mennica_service_name']."</td></tr>";
}
?>
</tbody>
</table>