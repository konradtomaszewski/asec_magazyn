<script> 
$(document).ready(function(){
	$("#broken_arrival_details").hide();

	$("#sortTable").ready(function(){
		$(".btn_show").click(function(){
			var broken_arrival_id = $(this).prop("name");
			var document_name = $(this).attr("dname");
					
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/broken_arrival_details_process.php",
				type: "POST",
				data: "document_name="+document_name+"&broken_arrival_id="+broken_arrival_id,
				success: function(data) {
						$("#select_date").hide("slow"),
						$("#broken_arrival_list").hide("slow"),
						$("#broken_arrival_details").hide().fadeIn("slow").html(data);
				},
				error: function(data){
					$.notify('Błąd Pobierania danych', 'error');
				}
			});
		});
	}).tablesorter();
});
</script>
<?php
require('../../../config/db.class.php');
$date_of = $_POST['date_of']." 00:00:00";
$date_to = $_POST['date_to']." 23:59:59";
echo "<div id='broken_arrival_list'>";
	if($mennica_magazyn->report_broken_devices($date_of, $date_to) != null)
	{
		echo "<table id='sortTable'>";
		echo "<thead>";
		echo "<th>Lp.</th>";
		echo "<th>Magazyn</th>";
		echo "<th>Dokument</th>";
		echo "<th>Data utworzenia</th>";
		echo "<th>Szczegóły</th>";
		echo "</thead>";
		echo "<tbody>";
		$x=0;
			foreach($mennica_magazyn->report_broken_devices($date_of, $date_to) as $row)
			{
				$x++;
				echo "<tr>";
				echo "<td>".$x.".</td>";
				echo "<td>".$row['storage_name']."</td>";
				echo "<td>".$row['document_name']."</td>";
				echo "<td>".$row['create_date']."</td>";
				echo "<td><a class='btn_show' name='".$row['arrival_id']."' dname='".$row['document_name']."'>Pokaż</a></td>";
				echo "</tr>";
			}
		echo "</tbody>";	
		echo "</table>";
	}
	else echo "<h4>Brak danych o dostawach. Zwiększ zakres dat</h4>";	
echo "</div>";
?>
<div id="broken_arrival_details"></div>