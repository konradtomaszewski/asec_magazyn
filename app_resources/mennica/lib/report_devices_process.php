<?php
require('../../../config/db.class.php');
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#table").tablesorter();
});

var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
	, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

	var a = document.createElement('a');
	var myFileName = "Raport ilościowy urządzeń_"+new Date().toJSON().slice(0,10);
	a.download = myFileName;
	a.setAttribute('href', uri + base64(format(template, ctx)));
	//a.appendChild(document.createTextNode(myFileName));
	document.getElementById('exportTable').appendChild(a);
	a.click();
  }
})()
</script>
<style>
#export_btn{
	float:right;
	width:200px;
}
</style>
<?php
echo "<div id='exportTable'>";
echo "<h3>Raport ilościowy urządzeń<br />Data wygenerowania: ".date("Y-m-d H:i:s")."</h3><br />";
$lista = array();
$mennica_magazyn->report_warehouses($_POST['storage_id'], $lista);
$mennica_magazyn->report_serviceman_devices($_POST['storage_id'], $lista);
$mennica_magazyn->report_getDamagedDevices($_POST['storage_id'], $lista);
foreach($mennica_magazyn->waiting_for_accept_devices_service($_POST['storage_id']) as $row)
{
	$mennica_magazyn->report_DamagedDevices_items($row['id'], $lista);
}

echo "<table id='table'>";
echo "<thead>";
echo "<th>Nazwa urządzenia</th>";
echo "<th>Ilość</th>";
echo "</thead>";
echo "<tbody>";
foreach(array_keys($lista) as $index)
{
	echo "<tr><td>".$index.'</td><td>'.$lista[$index]."</td></tr>";
}
echo "</tbody>";
echo "<table>";
	
	

echo "</div>";


?>
<input type="button" id="export_btn" onclick="tableToExcel('exportTable', 'W3C Example Table')" value="Export to Excel">
<div style="clear:both"></div>