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
		link.download = "Raport z napraw";
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
<input type="button" id="export_btn" onclick="tableToExcel('exportTable', 'W3C Example Table')" value="Export to Excel"><br /><br />
<div clear="both" /></div>
<?php
require('../../../config/db.class.php');
$month = $_POST['month'];

echo "<div id='exportTable'>";
echo "<table id='sortTable'>";
echo "<thead>";
echo "<tr>";
echo "<th>Lp.</th>";
echo "<th>Nr seryjny</th>";
echo "<th>Nazwa urządzenia</th>";
echo "<th>Data naprawy</th>";
echo "<th>Podjęte czynności</th>";
echo "<th>Czas naprawy</th>";
echo "<th>Status</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$i=1;
foreach($vectorsoft_magazyn->report_repair_devices($month) as $row)
{
	echo "<tr>";
	echo "<td>".$i++."</td>";
	echo "<td>".$row['sn']."</td>";
	echo "<td>".$row['repair_devices_name']."</td>";
	echo "<td>".$row['end_repair_datetime']."</td>";
	echo "<td>".$row['repair_description']."</td>";
	echo "<td>".$row['real_time_repair']."</td>";
	echo "<td>".$row['repair_status']."</td>";
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
?>
