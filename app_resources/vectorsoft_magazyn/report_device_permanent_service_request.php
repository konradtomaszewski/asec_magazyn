<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function() {
    $('#table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>
<style>
#export_btn{
	float:right;
	width:200px;
}

</style>
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
		link.download = "Raport zutylizowanych urządzeń";
		link.href = uri + base64(format(template, ctx));
		link.click();
  }
})()
</script>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Raport stały montaż urządzeń</h3></div>
		</header>
		<section>
			<div >
			<input type="button" id="export_btn" onclick="tableToExcel('exportTable', 'W3C Example Table')" value="Export to Excel">
				<?php
				echo "<div id='exportTable'>";
					echo "<table id='table'>";
					echo "<thead>";
					echo "<th>Data</th>";
					echo "<th>Nazwa urządzenia</th>";
					echo "<th>Numer seryjny</th>";
					echo "<th>Ilość</th>";
					echo "<th>nr automatu</th>";
					echo "</thead>";
					echo "<tbody>";
					foreach($vectorsoft_magazyn->report_device_permanent_service_request() as $row){
						echo "<tr>";
						echo "<td>".$row['data']."</td>";
						echo "<td>".$row['device_name']."</td>";
						echo "<td>".$row['sn']."</td>";
						echo "<td>".$row['ilosc']."</td>";
						echo "<td>".$row['automat_number']."</td>";
						echo "</tr>";
					}
					echo "</tbody>";
					echo "</table>";
				echo "</div>";
				?>					
			</div>
		</section>
	</article>
</div>
 