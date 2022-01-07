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
		link.download = "Dokument magazynowy <?php echo $_POST['document_name']."_".date("Ymd")?>";
		link.href = uri + base64(format(template, ctx));
		link.click();
  }
})()
</script>
<style>
#exportTable{
	display:none;
}
#export_btn{
	float:right;
	width:200px;
}
#btn{
	width:15em;
	float:right;
}
input::placeholder {
	text-align: left;
	padding-left:10px;
}
input[type="text"],input[type="number"]{
	width:15em;
	margin-right:1.5em;
	margin-bottom:0.5em;
	height:2em;
	padding-left:10px;
}

select{
	width: 10em;
	height:2em;
	padding-left:10px;
}

</style>
<script>
$(document).ready(function(){
	$('#sort_table').tablesorter();
	
	$('#arrival_document_number').each(function(){
		var arrival_type_id = '5';
		var arrival_type_prefix = 'U';
		
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/generate_document_name.php",
			type: "POST",
			data: "arrival_type_id="+arrival_type_id+"&arrival_type_prefix="+arrival_type_prefix,
			success: function(data) {
				$("#arrival_document_number").html('<h3><br />Numer dokumentu dostawy: </h3><input type="text" disabled="disabled" name="document_name"  value="'+data+'">');
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});
	});
	
	$('#btn').click(function(){
		$('#btn').attr("disabled", "disabled");
		$('#btn').attr("value", "Przetawarzanie...");
		
		var document_name = $('input[name="document_name"]').val();
		var damaged_devices_id = $('input[name="damaged_devices_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var product_name = $('input[name="product_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var product_id = $('input[name="product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var sn = $('input[name="sn[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var quantity = $('input[name="quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var mennica_service_id = $('select[name="mennica_service_id[]"] option:selected').map(function(){ 
                    return this.value; 
                }).get();	
		
		if(product_name.length < 1)
		{
			$.notify("Dane nie zostały zapisane.", "error");
			$.notify("Brak urządzeń.", "error");
			return false;
		}
		var result = $.grep( mennica_service_id, function( n, i ) {
					  return n > 0;
					});
					
		if(result == ''){
			$.notify("Wybierz serwis przynajmniej dla jednego urządzenia", "error");
			setTimeout(function(){ 
				$('#btn').removeAttr("disabled");
				$('#btn').attr("value", "Zatwierdź do serwisu");
			},2500);	
			return false;
		}
		//sprawdzanie przed wysłaniem czy pola required są wypełniona		
		var unfilled = $('[required]').filter(function() {
			return $(this).val().length === 0;
		});
		if (unfilled.length > 0) {
			unfilled.css('border', '2px solid #F08080');
			$.notify("Wprowadź nazwę dokumentu", "error");
			setTimeout(function(){ 
					unfilled.removeAttr( 'style' ); 
					}, 2500
			);
			return false;
		}
		//---/		
				
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/transfer_to_mennica_service_process.php",
				type: "POST",
				data: {
					"damaged_devices_id[]": damaged_devices_id,
					"sn[]": sn,
					"product_name[]": product_name,
					"product_id[]": product_id,
					"document_name": document_name,
					"quantity[]": quantity,
					"mennica_service_id[]": mennica_service_id,
					},
				success: function() {
					location.reload();
				},
				error: function(data){
					$.notify('Błąd', 'error');
				}
		});	
	});
	
	$('.back_to_damaged_devices_list').click(function(){
		var damaged_devices_item = $(this).attr("id");

		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/transfer_back_to_damaged_devices_list.php",
				type: "POST",
				data: {
					"damaged_devices_item": damaged_devices_item,
					},
				success: function() {
					location.reload();
				},
				error: function(data){
					$.notify('Błąd', 'error');
				}
		});	

	});
});
</script>
<div id="main">

		<article class="post">
			<header>
				<div class="title"><h3>Urządzenia uszkodzone</h3></div>
			</header>
			<section>
				<div id="arrival_document_number"></div>
				<br />
				
				<h3>Lista pozycji</h3>
					<table id="sort_table">
					<thead>
					<th>Lp.</th>
					<th>Demontaż przez</th>
					<th>Nr automatu</th>
					<th class="excel">Nazwa urządzenia</th>
					<th class="excel">Numer seryjny</th>
					<th class="excel">Ilość</th>
					<th>Wybierz serwis</th>
					<th>Cofnij do listy pobranych</th>
					</thead>
					<tbody>
					<?php
					$i=1;
					foreach($vectorsoft_magazyn->getDamagedDevicesBroken($_SESSION['mennica_magazyn_storage_id']) as $row)
					{
						if($row['quantity'] >0)
						{
							echo "<tr><td>".$i++."</td>";
							echo "<td>".$row['service_user_name']."</td>";
							echo "<td>".$row['automat_number']."</td>";
							echo "<td class='excel'>".$row['product_name']."</td>";
							echo "<td class='excel'>".$row['sn']."</td>";
							echo "<td class='excel'>".$row['quantity']."</td>";
							echo "<td><select name='mennica_service_id[]'>";
							echo "<option value='0' selected='selected' disabled>Wybierz z listy</option>";
							foreach($vectorsoft_magazyn->getAsecServices() as $serwis)
							{
								echo "<option value='".$serwis['id']."'>".$serwis['service_name']."</option>";
							}
							/*<option value='0'>Wybierz z listy</option>
							<option value='1'>Serwis Mennica</option>
							<option value='2'>Serwis Mera</option>
							<option value='3'>Serwis EmTest</option>*/
							echo "</select></td>";
							echo "<td><input type='button' class='back_to_damaged_devices_list' id='".$row['damaged_devices_id']."' value='Przywróć' /></td></tr>";
							echo "<input type='hidden' name='damaged_devices_id[]' value='".$row['damaged_devices_id']."' />";
							echo "<input type='hidden' name='product_name[]' value='".$row['product_name']."' />";
							echo "<input type='hidden' name='product_id[]' value='".$row['product_id']."' />";
							echo "<input type='hidden' name='sn[]' value='".$row['sn']."' />";
							echo "<input type='hidden' name='quantity[]' value='".$row['quantity']."' />";
						}
					}
					?>
					</tbody>
					</table>
					<!--export to excel-->
						<div id='exportTable'>
							<table>
							<thead>
							<th>Lp.</th>
							<th>Nazwa urządzenia</th>
							<th>Numer seryjny</th>
							</thead>
							<tbody>
							<?php
							$i=1;
							foreach($vectorsoft_magazyn->getDamagedDevicesBroken($_SESSION['mennica_magazyn_storage_id']) as $row)
							{
								if($row['quantity'] >0)
								{
									echo "<tr><td>".$i++."</td>";
									echo "<td>".$row['product_name']."</td>";
									echo "<td>".$row['sn']."</td>";
								}
							}
							?>
							</tbody>
							</table>
						</div>	
					<!--EOF: export to excel-->
					<input type="button" id="export_btn" onclick="tableToExcel('exportTable')" value="Export to Excel">
					<input type="button" id="btn" value="Zatwierdź do serwisu"/>
					<div style="clear:both"></div>
			</section>
		</article>

</div>