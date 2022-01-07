<script>
function hide_element(id){
	document.write('<style type="text/css">#'+id+' {display: none;}</style>');
};
	
$(document).ready(function(){
	$.fn.generate_document_name  = function() {
		var arrival_type_id = '8';
		var arrival_type_prefix = 'PU';
		
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/generate_document_name.php",
			type: "POST",
			data: "arrival_type_id="+arrival_type_id+"&arrival_type_prefix="+arrival_type_prefix,
			success: function(data) {
				$("#arrival_document_number").html('<h3><br />Numer dokumentu przekazania: </h3><input type="text" id="document_name" disabled="disabled" name="arrival_document_number"  value="'+data+'">');
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});
	};	
	
	$('#arrival_document_number').each(function(){
		$().generate_document_name();
	});
	
	$("#btn_fwd_devices").click(function(){
		$("#btn_fwd_devices").attr("disabled","disabled");
		$("#btn_fwd_devices").attr("value","Przetwarzanie");
		
		var document_name = $('input[name="arrival_document_number"]').val();
		var serviceman_id = $('select[name="serviceman"] option:selected').val();
		var serviceman_name = $('select[name="serviceman"] option:selected').text();
		
		var product_id = $('input[name="product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var product_name = $('input[name="product_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
		/*var sn = $('input[name="sn[]"]').map(function(){ 
                    return this.value; 
                }).get();*/
		var sn = '';		
		var quantity = $('input[name="quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();
				
		if(serviceman_id == 0)
		{
			setTimeout(function(){ 
				$("#btn_fwd_devices").removeAttr("disabled");
				$("#btn_fwd_devices").attr("value","Przekaż urządzenia serwisantowi");
			}, 2500);
			$.notify("Nie wybrano serwisanta", "error");
			return false;
		}
		var r = confirm("Czy napewno chcesz przekazać urządzenia serwisantowi?");
		if (r == true) {
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/forward_devices_process.php",
				type: "POST",
				data: {
					"document_name": document_name,
					"serviceman_id": serviceman_id,
					"serviceman_name": serviceman_name,
					//"sn[]": sn,
					"product_id[]": product_id,
					"product_name[]": product_name,
					"quantity[]": quantity,
					},
				success: function() {
					$.notify("Dane zostały zapisane", "success");
					setTimeout(function(){
						window.location.href = 'index.php?action=my_devices';
					},2500);
				},
				error: function(data){
					$.notify('Błąd', 'error');
				}
			});
		}
		else {
			$("#btn_fwd_devices").removeAttr("disabled");
			$("#btn_fwd_devices").attr("value","Przekaż urządzenia serwisantowi");
			return false;
		}
	});
});
</script>
<style>
#document_name{
	border:1px solid #999;
	width:16.5em;
}
input[type="text"]:disabled, input[type="number"]:disabled{
	background:transparent !important;
	border:0px;
}
input[type="text"]{
	width:350px !important;
	padding-left:10px;
}
input[type="number"]{
	width:100px !important;
	padding-left:10px;
}
input[type="button"]{
	width:auto;
}
select{
	padding-left:10px;
}
</style>
<?php
require('config/db.class.php');
$virtual_serviceman = array('3','55','56','57','58','59','74','83','84','102');
$current_user_id = $_SESSION['mennica_magazyn_user_id'];
$forward_devices_to_serviceman = in_array($current_user_id,$virtual_serviceman);

?>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Przekaż urządzenia</h3></div>
			
		</header>
		<section>
			<div id="arrival_document_number"></div><br />
			<?php

			echo "<h3>Wybierz serwisanta z listy:</h3>";
			echo "<select name='serviceman'>";
			echo "<option value='0' selected disabled>Wybierz z listy</option>";
			
			if($forward_devices_to_serviceman){
				foreach($vectorsoft_magazyn->getSerwisantList($_SESSION['mennica_magazyn_storage_id']) as $row)
				{
					echo "<option value='".$row['id']."'>".$row['user_name']."</option>";
				}
			}else{
				foreach($vectorsoft_magazyn->getSerwisantList_forward_wawa($_SESSION['mennica_magazyn_storage_id']) as $row)
				{
					echo "<option value='".$row['id']."'>".$row['user_name']."</option>";
				}
			}
			echo "</select>";
			echo "<br /><br />";
			echo "<h3>Urządzenia do przekazania<h3>";
			echo "<table>";
			echo "<thead>";
			echo "<th>Nazwa urządzenia</th>";
			//echo "<th>Numer seryjny</th>";
			echo "<th>Ilość</th>";
			echo "</thead>";
			foreach($serviceman->getService_request($_SESSION['mennica_magazyn_storage_id']) as $row)
			{
				if($row['quantity'] > 0)
				{
					echo "<tr>";
					echo "<input type='hidden' name='product_id[]' value='".$row['product_id']."'/>";
					echo "<td><input type='text' name='product_name[]', value='".$row['product_name']."' disabled='disabled' style='width:20em'/></td>";
					//echo "<td><input type='text' name='sn[]', value='".$row['sn']."' disabled='disabled'/></td>";
					echo "<td><input type='number' name='quantity[]' value='".$row['quantity']."' disabled='disabled' style='width:2em'/></td>";
					echo "</tr>";
				}	
				else
				{
					echo "<script>hide_element('btn_return_service');</script>";
				}	
			}
			echo "</table>";
			?>
		<span>
			<input type="button" id="btn_fwd_devices" value="Przekaż urządzenia serwisantowi">
		</span>
		</section>
	</article>
</div>