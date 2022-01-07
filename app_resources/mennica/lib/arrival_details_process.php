<?php
require("../../../config/db.class.php");
?>
<script>
$(document).ready(function(){
	
	$("#back_btn").click(function(){
		$("#arrival_details").hide(),
		$("#select_date").show("slow"),
		$("#arrival_list").show("slow");
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
<th>Ilość</th>
</thead>
</tbody>
<?php
$x=1;
foreach($mennica_magazyn->getDevices_items($_POST['arrival_id']) as $row)
{
	echo "<tr><td>".$x++."</td><td>".$row['storage_name']."</td><td>".$row['product_name']."</td><td>".$row['quantity2']."</td></tr>";
}
?>
</tbody>
</table>