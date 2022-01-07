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
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
	, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    //window.location.href = uri + base64(format(template, ctx))
	var link = document.createElement("a");
		link.download = "Raport uszkodzonych urządzeń <?php echo $_POST['document_name']?>";
		link.href = uri + base64(format(template, ctx));
		link.click();
  }
})()
</script>
<style>
#export_btn{
	float:right;
	width:200px;
}
</style>
<a id="back_btn">Powrót</a><br />
<input type="button" id="export_btn" onclick="tableToExcel('exportTable')" value="Export to Excel">
<?php
echo "<h3>Szczegóły dokumentu ".$_POST['document_name']."</h3><br />";
?>
<div id='exportTable'>
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
</div>