<?php
require('config/db.class.php');
?>

<script>
$(document).ready(function(){
	
		$('input:checkbox').each(function(){
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
            console.log("Change: " + product_id + "-" +product_name+ " to " + check_required);
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
	echo "<th>Czy wymagany numer seryjny</th>";
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
			
			echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['automat_type']."</td>";
				echo "<td><input type='checkbox' name='".$row['name']."' value='".$row['id']."' ".$required."><span id='".$row['id']."'></span></td>";
			echo "</tr>";
		}
	echo "</tbody></table>";
?>
		<span></span>
		</section>
	</article>

</div>