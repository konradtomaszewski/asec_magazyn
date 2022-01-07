<script>
$(document).ready(function(){
	 

	$("#show_log_file").hide();
	
	$("#btn_back").click(function(){
		$("#btn_back").hide();
		$("#log_files").hide("slow");
		$("#show_log_file").hide("slow");
		$("#dir_list").hide().fadeIn("slow");
		$("#dir_list_title").hide().fadeIn("slow");
	});
	
	$('#log_files a').click(function(){
		var log_dir = $.cookie('dir');
		var log_file = $(this).text();
		var read_log_file = "Logs/"+log_dir+"/"+log_file;
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/read_log_files.php",
				type: "POST",
				data: "read_log_file="+read_log_file,
				success: function(data) {
					$("#show_log_file").hide().fadeIn("slow").html(data);
				},
				error: function(data){
					$.notify('Występił błąd przy zmienianiu statusu zamówienia', 'error');
				}
		});
	})
});
</script>

<input type="button" id="btn_back" value="Powrót">
<?php
$dir = $_POST['dir'];

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
   $files = scandir("..\\..\\..\\Logs\\".$dir,1);
} else {
    $files = scandir("..//../../Logs//".$dir,1);
}

echo "<div id='log_files'>";
echo "<h3>Wybierz plik log</h3>";
foreach($files as $file)
{
	if($file != '.' && $file != '..')	echo "<div class='text_image'><a>".$file."</a></div>";
}
echo "</div>";
echo "<br />";
echo "";
echo "<div id='show_log_file'></div>";
?>