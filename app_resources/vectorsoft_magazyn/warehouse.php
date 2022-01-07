<?php
require('config/db.class.php');
?>
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
		link.download = "Stan magazynowy <?php echo date("Ymd")?>";
		link.href = uri + base64(format(template, ctx));
		link.click();
  }
})()
</script>
<style>
#export_btn{
	float:right;
	width:200px;
	margin-bottom:50px;
}
</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Stan magazynu</h3></div>
		</header>
		
		<section>
			<input type="button" id="export_btn" onclick="tableToExcel('exportTable')" value="Export to Excel">
			<?php
			echo "<div id='exportTable'>";
				echo "<table id='table'>";
				echo "<thead>";
				echo "<th>Grupa automatów</th>";
				echo "<th>Nazwa Produktu</th>";
				echo "<th>Ilosc (szt.)</th>";
				echo "</thead>";
				echo "<tbody>";
				foreach($vectorsoft_magazyn->warehouse($_SESSION['mennica_magazyn_storage_id']) as $row) {
					echo "<tr>
							<td>".$row['automat_type']."</td>
							<td>".$row['product_name']."</td>
							<td>".$row['product_quantity']."</td>
						</tr>";
						
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
				
			?>
		<span></span>
		</section>
	</article>

</div>