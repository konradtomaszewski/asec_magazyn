<?php
require('config/db.class.php');
?>
<style>
#input_product_name{
	border:0px;
	background:transparent !important;
}
</style>
<script>
$(document).ready(function(){
	
		$('.sn').each(function(){
			var product_id = $(this).val();
			var check_required = $(this).prop('checked');
			if(check_required == true){
				$('#'+product_id).html('<b> TAK</b>');
			}
			else{
				$('#'+product_id).html(' NIE');
			}
			
		}).change(function () {
            var product_id = $(this).val();
            var product_name = $(this).attr('name');
			var check_required = $(this).prop('checked');
			if(check_required == true){
				var required = 'required';
				$('#'+product_id).html('<b> TAK</b>');
			}
			else{
				var required = '';
				$('#'+product_id).html(' NIE');
			}
            //console.log("Change: " + product_id + "-" +product_name+ " to " + check_required);
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/product_definitions_process.php",
						type: "POST",
						data: "product_id="+product_id+"&sn_required="+required,
						success: function(data) {
									
						},
						error: function(data){
							$.notify('Błąd', 'error');
						}
			})
        });
		
		$('.is_active_link').each(function(){
			var product_id = $(this).attr('name');
			var is_active = $(this).attr('is_active');
			if(is_active == 1)
			{
				$('#active_'+product_id).html('Dezaktywuj');

			}
			else 
			{
				$('#active_'+product_id).html('Aktywuj');
				$('.active_'+product_id).css('background','#eee');
			}
			//alert(is_active);
		}).click(function(){
			var product_id = $(this).attr('name');
			var is_active_actually = $(this).attr('is_active');
			if(is_active_actually == 0)
			{
				var is_active='1';
			}
			else
			{
				var is_active='0';
			}
			//console.log('actualy active='+is_active_actually);
			//console.log('setting active='+is_active);
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/product_definitions_active.php",
						type: "POST",
						data: "product_id="+product_id+"&is_active="+is_active,
						success: function() {
							location.reload();
						},
						error: function(data){
							$.notify('Błąd', 'error');
						}
			})
			
		});
		
		$('.change_storage_id').change(function(){
			var product_id = $(this).attr('name');
			var change_storage_id = $(this).val();
			
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/product_definitions_change_storage_id.php",
						type: "POST",
						data: "product_id="+product_id+"&change_storage_id="+change_storage_id,
						success: function() {
							location.reload();
							//$.notify('Zapisano', 'success');
						},
						error: function(data){
							$.notify('Błąd', 'error');
						}
			})
		});

	
});
</script>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Definicje urządzeń</h3></div>
		</header>
		
		<section>
			
			<?php
				echo "<table id='table'>";
	echo "<thead>";
	echo "<th>Nazwa urządzenia</th>";
	echo "<th>Grupa automatów</th>";
	echo "<th>Magazyn</th>";
	echo "<th>Czy wymagany S/N</th>";
	echo "<th>Aktywuj/Dezaktywuj</th>";
	echo "<th>Zmiana magazynu</th>";
	echo "</thead>";
	echo "<tbody>";
	foreach($vectorsoft_magazyn->getProduct_definitions() as $row)
		{
			
			if($row['sn_required'] == 'required')
			{
				$required = 'checked';
			}
			else
			{
				$required = '';
			}	
			
			
			echo "<tr class='active_".$row['id']."'>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['automat_type']."</td>";
				echo "<td>".$row['storage_name']."</td>";
				echo "<td><input type='checkbox' class='sn' name='".$row['name']."' value='".$row['id']."' ".$required."><span id='".$row['id']."'></span></td>";
				echo "<td><a href='#' id='active_".$row['id']."' name='".$row['id']."' class='is_active_link' is_active='".$row['is_active']."'></a></td>";
				echo "<td><select class='change_storage_id' name='".$row['id']."'><option value='0' disabled='disabled' selected='selected'>Wybierz magazyn</option><option value='1'>Warszawa</option><option value='2'>Wroclaw</option></select></td>";
				
			echo "</tr>";
		}
	echo "</tbody></table>";
?>
		<span></span>
		</section>
	</article>

</div>