<script>
$(document).ready(function(){
	var product_id = $('input[name="product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();

	if(product_id.length == 0)
	{
		$("#btn_return_service").hide();
		$("#btn_fwd_serviceman").hide();
	}		
	$("#btn_return_service").click(function(){
		$("#btn_return_service").attr("disabled","disabled");
		$("#btn_return_service").attr("value","Przetwarzanie");
		$("#btn_fwd_serviceman").attr("disabled","disabled");
		$("#btn_fwd_serviceman").attr("value","Przetwarzanie");
		
		var product_id = $('input[name="product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var product_name = $('input[name="product_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
		/*var sn = $('input[name="sn[]"]').map(function(){ 
                    return this.value; 
                }).get();*/	
		var quantity = $('input[name="quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();			
	
		var r = confirm("Czy napewno chcesz przekazać urządzenia do zwrotu?");
		if (r == true) {
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/return_devices_new.php",
				type: "POST",
				data: {
					//"sn[]": sn,
					"product_id[]": product_id,
					"product_name[]": product_name,
					"quantity[]": quantity,
					},
				success: function() {
					$.notify("Dane zostały zapisane", "success");
					setTimeout(function(){
						location.reload();
					},2500);
				},
				error: function(data){
					$.notify('Błąd', 'error');
				}
			});
		}
		else {
			$("#btn_return_service").removeAttr("disabled");
			$("#btn_return_service").attr("value","Przekaż urządzenia do zwrotu");
			$("#btn_fwd_serviceman").removeAttr("disabled");
			$("#btn_fwd_serviceman").attr("value","Przekaż urządzenia serwisantowi");
			return false;
		}
	});
	
	$("#btn_fwd_serviceman").click(function(){
		window.location.href = 'index.php?action=forward_devices';
	});
});
</script>
<style>
input[type="text"]:disabled, input[type="number"]:disabled{
	background:transparent !important;
	border:0px;
}
input[type="text"]{
	width:350px;
	padding-left:10px;
}
input[type="number"]{
	width:100px;
	padding-left:10px;
}
input[type="button"]{
	width:auto;
}
#btn_return_service{
	background-color:#ff8080;
}

#btn_fwd_serviceman{
	float:right;
}
</style>
<?php
require('config/db.class.php');
?>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Moje urządzenia</h3></div>
			
		</header>
		<section>
			<?php
			echo "<table>";
			echo "<thead>";
			echo "<th>Nazwa urządzenia</th>";
			//echo "<th>Numer seryjny</th>";
			echo "<th>Ilość</th>";
			echo "</thead>";
			foreach($serviceman->getService_request() as $row)
			{
				if($row['quantity'] > 0)
				{
					echo "<tr>";
					echo "<input type='hidden' name='product_id[]' value='".$row['product_id']."'/>";
					echo "<td><input type='text' name='product_name[]' value='".$row['product_name']."' disabled style='width:20em'/></td>";
					//echo "<td><input type='text' name='sn[]', value='".$row['sn']."' disabled='disabled'/></td>";
					echo "<td><input type='number' name='quantity[]' value='".$row['quantity']."' disabled='disabled' style='width:3em'/></td>";
					echo "</tr>";
				}	
			}
			echo "</table>";
			?>
		<span>
			<input type="button" id="btn_return_service" value="Przekaż urządzenia do zwrotu" style="margin-bottom:30px">
			<input type="button" id="btn_fwd_serviceman" value="Przekaż urządzenia serwisantowi" style="margin-bottom:30px">
			<?php
			//if($_SESSION['mennica_magazyn_storage_id'] == '1') echo	'<input type="button" id="btn_fwd_serviceman" value="Przekaż urządzenia serwisantowi" style="margin-bottom:30px">';
			?>

		</span>
		</section>
	</article>
</div>