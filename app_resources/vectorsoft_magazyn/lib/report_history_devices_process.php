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
		link.download = "Raport historii";
		link.href = uri + base64(format(template, ctx));
		link.click();
  }
})()
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table').DataTable();
		$(window).load(function() {
			$('#status').fadeOut();
			$('#preloader').delay(50).fadeOut('slow');
			$('body').delay(10).css({'overflow':'visible'});
		});
	});
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
$product_id = $_POST['product_id'];

$vectorsoft_magazyn->report_history_devices($product_id);

?>
