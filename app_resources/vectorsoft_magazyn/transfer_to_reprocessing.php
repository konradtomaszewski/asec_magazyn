<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function(){
	$("#btn").attr("disabled", "disabled");
	
	$('#arrival_document_number').each(function(){
		var arrival_type_id = '8';
		var arrival_type_prefix = 'UT';
		
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
});
</script>
<style>
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
</style>
<div id="main">

		<article class="post">
			<header>
				<div class="title"><h3>Urządzenia przeznaczone do utylizacji</h3></div>
			</header>
			<section>
				<div id="arrival_document_number"></div>
				<br />
				<h3>Lista pozycji</h3>
					<table id="sort_table">
					<thead>
					<th>Serwisant</th>
					<th>Typ automatu</th>
					<th>Nazwa urządzenia</th>
					<th>Numer seryjny</th>
					<th>Nr pojazdu</th>
					<th>Numer automatu</th>
					<th>Ilość</th>
					</thead>
					<tbody>
					<?php
						foreach($vectorsoft_magazyn->getDamagedDevicesReprocessing($_SESSION['mennica_magazyn_storage_id']) as $row)
						{
							if($row['quantity'] >0)
							{
								echo "<tr><td>".$row['service_user_name']."</td>";
								echo "<td>".$row['automat_type']."</td>";
								echo "<td>".$row['product_name']."</td>";
								echo "<td>".$row['sn']."</td>";
								echo "<td>".$row['bus_number']."</td>";
								echo "<td>".$row['automat_number']."</td>";
								echo "<td>".$row['quantity']."</td>";
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
					<input type="button" id="btn" value="Zatwierdź do utylizacji"/>
					<div style="clear:both"></div>
			</section>
		</article>

</div>	