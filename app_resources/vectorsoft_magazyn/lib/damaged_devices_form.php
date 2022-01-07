<?php
session_start();
?>
<script> 
$(document).ready(function(){
	
	var x=0;
	$.datetimepicker.setLocale('pl');
	
	$("#export2excel").click(function(){
		$(".table2excel").table2excel({
			exclude: ".noExl",
			name: "Worksheet Name",
			filename: "Lista urządzeń pobranych przez serwisantów <?php echo date('Y-m-d')?>",
			fileext: ".xls"
		}); 
	});
	
	$("#sortTable").each(function(){
			x++;
			$('#datetime_'+x).datetimepicker({
				 format:'Y-m-d H:i:s',
			});
	}).click(function(){
			x++;
			$('#datetime_'+x).datetimepicker({
				 format:'Y-m-d H:i:s',
			});
	});
	
	$('#utilize_paper').click(function(){
		var r = confirm("Czy napewno oznaczyć papier do utylizacji?");
		if (r == true) {
			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/utilize_paper.php",
					success: function(data) {
						location.reload();
					}
			})
		}
	});
	
	$('#btn').click(function(){
		$('#btn').attr("disabled", "disabled"); 
		$('#btn').attr("value", "Przetwarzanie..."); 
		var storage_id = $('input[name="storage_id"]').val();
		var damaged_devices_id = $('input[name="damaged_devices_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var service_request_id = $('input[name="service_request_id[]"]').map(function(){ 
                    return this.value; 
                }).get();		
		var service_user_id = $('input[name="service_user_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var product_id = $('input[name="product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var sn = $('input[name="sn[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var bus_number = $('input[name="bus_number[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var automat_number = $('input[name="automat_number[]"]').map(function(){ 
                    return this.value; 
                }).get();		
		var datetime = $('input[name="datetime[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var damaged_devices_status = $('select[name="damaged_devices_status[]"]').map(function(){ 
                    return this.value; 
                }).get();	
		
		var result = $.grep( damaged_devices_status, function( n, i ) {
					  return n > 0;
					});
					
		if(result == ''){
			$.notify("Wybierz status przynajmniej dla jednego urządzenia", "error");
			setTimeout(function(){ 
				$('#btn').removeAttr("disabled");
				$('#btn').attr("value", "Zapisz"); 
			},2500);	
			return false;
		}
				
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/update_damaged_devices_process.php",
				type: "POST",
				data: {
					"damaged_devices_id": damaged_devices_id,
					"service_request_id": service_request_id,
					"storage_id": storage_id,
					"service_user_id": service_user_id,
					"product_id": product_id,
					"sn": sn,
					"bus_number": bus_number,
					"automat_number": automat_number,
					"datetime": datetime,
					"damaged_devices_status": damaged_devices_status,
				},
				success: function(data) {
					location.reload();
				},
				error: function(data){
					$.notify('Błąd', 'error');
				}
		});	
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
		link.download = "LISTA URZĄDZEŃ POBRANYCH PRZEZ SERWISANTÓW <?php echo date("Ymd")?>";
		link.href = uri + base64(format(template, ctx));
		link.click();
  }
})()
</script>

<style>
th,td{
	font-size:0.9em !important;
}
input,select{
	width:auto !important;
}
.side_bus_number{
	width:60px !important
}
#export2excel{
	float:right
}
</style>
<input type="button" id="export2excel" value="Export to Excel">
<?php
require('../../../config/db.class.php');

if($vectorsoft_magazyn->getDamagedDevices($_SESSION['mennica_magazyn_storage_id']))
{
	echo "<h3>Lista urządzeń pobranych przez serwisantów</h3><br />";
	echo "<table id='sortTable' class='table2excel'>";
	echo "<thead>";
	echo "<th>Serwisant</th>";
	echo "<th>Nazwa urządzenia</th>";
	echo "<th>Numer seryjny</th>";
	echo "<th>Ilość</th>";
	echo "<th>Nr automatu</th>";
	echo "<th>Data operacji</th>";
	echo "<th class='noExl'>Status urządzenia</th>";
	echo "</thead>";
	echo "<tbody>";

	$x=1;
	foreach($vectorsoft_magazyn->getDamagedDevices_without_paper($_SESSION['mennica_magazyn_storage_id']) as $row)
	{
		echo "<input type='hidden' name='damaged_devices_id[]' value='".$row['damaged_devices_id']."'/>";
		echo "<input type='hidden' name='service_request_id[]' value='".$row['service_request_id']."'/>";
		echo "<input type='hidden' name='product_id[]' value='".$row['product_id']."'/>";
		echo "<input type='hidden' name='storage_id' value='".$row['storage_id']."'/>";
		echo "<input type='hidden' name='service_user_id[]' value='".$row['service_user_id']."'/>";

		echo "<tr>";
		echo "<td>".$row['service_user_name']."</td>";
		echo "<td>".$row['product_name']."</td>";
		echo "<td><input type='text' name='sn[]' value='".$row['sn']."' placeholder='Jeżeli wymagany'/></td>";
		echo "<td>".$row['quantity']."</td>";
		echo "<td><input type='text' name='automat_number[]' class='side_bus_number' value='".$row['automat_number']."' /></td>";
		echo "<td><input type='text' name='datetime[]' id='datetime_".$x++."' value='".$row['datetime']."'></td>";
		echo "<td class='noExl'>
		<select name='damaged_devices_status[]'>
		<option value='0' selected disabled='disabled'>Wybierz z listy</option>
		<option value='1'>Uszkodzone</option>
		<option value='2'>Działające</option>
		<option value='5'>Do utylizacji</option>
		</select>
		</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	//echo "<input type='button' id='utilize_paper' value='Utylizuj cały papier'/>";
	echo "<input type='button' id='btn' value='Zapisz'/>";
	echo "<div style='clear:both'></div>";
}
else echo "<h4>Brak danych</h4>";
?>