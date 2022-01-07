<?php
require('config/db.class.php');
?>
<script>
$(document).ready(function() {
    $('#repair_devices_history').DataTable( {
        "order": [[3, "desc" ]]
    } );
	
	$("#export2excel").click(function(){
		$(".table2excel").table2excel({
			exclude: ".noExl",
			name: "Worksheet Name",
			filename: "Historia napraw <?php echo date('Y-m-d')?>",
			fileext: ".xls"
		}); 
	});
} );
</script>
<style>
#export2excel{
	float:right;
	width:auto !important;
}
</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Historia z napraw urządzeń</h3></div>
		</header>
		<section>
		<input type="button" id="export2excel" value="Export to Excel">
		<?php
			echo "<table id='repair_devices_history' class='table2excel'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Lp.</th>";
			echo "<th>Nr seryjny</th>";
			echo "<th>Nazwa urządzenia</th>";
			echo "<th>Data naprawy</th>";
			echo "<th>Podjęte czynności</th>";
			echo "<th>Czas naprawy</th>";
			echo "<th>Interweniował</th>";
			echo "<th>Naprawiał</th>";
			echo "<th>Status</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			//$i=1;
			foreach($vectorsoft_magazyn->repair_devices_history() as $row)
			{
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['sn']."</td>";
				echo "<td>".$row['repair_devices_name']."</td>";
				echo "<td>".$row['end_repair_datetime']."</td>";
				echo "<td>".$row['repair_description']."</td>";
				echo "<td>".$row['real_time_repair']."</td>";
				echo "<td>".$row['service_user_name']."</td>";
				echo "<td>".$row['repair_user_name']."</td>";
				echo "<td>".$row['repair_status']."</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		?>
		</section>
	</article>
</div>
 