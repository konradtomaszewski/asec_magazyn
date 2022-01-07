<script> 
$(document).ready(function(){
	$("#sortTable").tablesorter();
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
		link.download = "Dokument magazynowy <?php echo $_POST['document_name']."_".date("Ymd")?>";
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
<?php
require('../../../config/db.class.php');
$storage_id = $_SESSION['mennica_magazyn_storage_id'];

echo "<div id='exportTable'>";
$delivary_details = $vectorsoft_magazyn->getDelivery_details($_POST['document_name'], $storage_id);

echo "<br /><h2>Informacje o dokumencie: ".$delivary_details[0]['document_name']."</h2>";
//echo "<h3>Typ dokumentu: ".$delivary_details[0]['arrival_type']."</h3><br />";

echo "<div style='background:#f8f8f8; border:1px solid #ccc; height:90px; padding:20px 40px 20px 40px;'>";
	
	switch($_COOKIE['arrival_type_id']){
		case 1:
			echo "<div style='float:left'><h4><i>Dostawa utworzona przez ".$delivary_details[0]['create_user']."<br />w dniu ".$delivary_details[0]['create_date']."</i></h4></div>";
			echo "<div style='float:right'><h4><i>Dostawa przyjęta przez ".$delivary_details[0]['accept_user']."<br />w dniu ".$delivary_details[0]['accept_date']."</i></h4></div>";
			break;
		case 2:
			echo "<div style='float:left'><h4><i>Urządzenia wydane przez ".$delivary_details[0]['create_user']."<br /> w dniu ".$delivary_details[0]['create_date']."</i></h4></div>";
			echo "<div style='float:right'><h4><i>Urządzenia odebrane przez ".$delivary_details[0]['release_user']."<br />w dniu ".$delivary_details[0]['release_date']."</i></h4></div>";
			break;
		case 3:
			echo "<div style='float:left'><h4><i>Zwrot urządzeń serwisanta ".$delivary_details[0]['release_user']."<br /> w dniu ".$delivary_details[0]['create_date']."</i></h4></div>";
			echo "<div style='float:right'><h4><i>Urządzenia przyjete przez ".$delivary_details[0]['create_user']."<br />w dniu ".$delivary_details[0]['create_date']."</i></h4></div>";
			break;	
		case 4:
			echo "<div style='float:left'><h4><i>Dostawa utworzona przez ".$delivary_details[0]['create_user']."<br />w dniu ".$delivary_details[0]['create_date']."</i></h4></div>";
			echo "<div style='float:right'><h4><i>Dostawa przyjęta przez ".$delivary_details[0]['accept_user']."<br />w dniu ".$delivary_details[0]['accept_date']."</i></h4></div>";
			break;
		case 8:
			echo "<div style='float:left'><h4><i>Urządzenia przekazane przez ".$delivary_details[0]['create_user']."<br />w dniu ".$delivary_details[0]['create_date']."</i></h4></div>";
			echo "<div style='float:right'><h4><i>Urządzenia przekazane do ".$delivary_details[0]['release_user']."<br />w dniu ".$delivary_details[0]['accept_date']."</i></h4></div>";
			break;	
			
		default:
			echo "<div style='float:left'><h4><i>Dostawa utworzona przez ".$delivary_details[0]['create_user']."<br />w dniu ".$delivary_details[0]['create_date']."</i></h4></div>";
			echo "<div style='float:right'><h4><i>Dostawa przyjęta przez ".$delivary_details[0]['accept_user']."<br />w dniu ".$delivary_details[0]['accept_date']."</i></h4></div>";
			break;
	}
	
	
	/*if($delivary_details[0]['accept_user'] == null)
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
	echo "</div>";*/
echo "</div>";


echo "<br /><br /><br /><h3>Lista pozycji:</h3>";
echo "<table id='sortTable'>";
echo "<thead>";
echo "<th>Grupa urządzeń</th>";
echo "<th>Nazwa urządzenia</th>";
echo "<th>Numer seryjny</th>";
echo "<th>Ilość</th>";
echo "</thead>";
foreach($vectorsoft_magazyn->getDelivery_details($_POST['document_name'], $storage_id) as $row)
{
	echo "<tr><td>".$row['automat_type']."</td><td>".$row['product_name']."</td><td>".$row['product_sn'].".</td><td>".$row['product_quantity']."</td></tr>";
}
echo "</table>";
echo "<div>";
?>
<input type="button" id="export_btn" onclick="tableToExcel('exportTable', 'W3C Example Table')" value="Export to Excel">
<div style="clear:both"></div>