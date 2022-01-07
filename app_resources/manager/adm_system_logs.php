<script>
$(document).ready(function(){
	  
	$('#dir_list a').click(function(){
		var dir = $(this).text();
		$.cookie('dir', dir);
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/show_log_files.php",
				type: "POST",
				data: "dir="+dir,
				success: function(data) {
					$("#dir_list_title").hide(500);
					$("#dir_list").hide("slow");
					$("#dir_show_files").html(data);
				},
				error: function(data){
					$.notify('Występił błąd przy zmienianiu statusu zamówienia', 'error');
				}
		});

	});
});

</script>

<style>

#dir_list, #log_files{
	zoom:0.8;
	width:500px;

}
#btn_back{
	height:45px;
	width:auto;
}
#log_files{
	margin-top:20px;
}
#show_log_file{
	display:block;
	padding:8px 10px 0 10px;
	border: 1px solid #aaa;
	background:#eee;
}
.folder_image{
	background-image: url("assets/images/folder.png");
	background-size:cover;
	width:25px;
	height:25px;
	margin-bottom:5px;
}

.text_image{
	background-image: url("assets/images/log_file.png");
	background-size:cover;
	width:25px;
	height:25px;
	margin-bottom:5px;
}

.folder_image a{
	padding-left:30px;
}

.text_image a{
	padding-left:30px;
}

</style>

<?php
$log_path    = 'Logs/';
$dirs = scandir($log_path,1);
?>

<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Podgląd zdarzeń systemowych</h3></div>
		</header>
		<section>
			<?php
			echo "<div id='dir_list_title'><h3>Wybierz katalog z logami</h3></div>";
				echo "<div id='dir_list'>";
					foreach($dirs as $dir)
					{
						if($dir != '.' && $dir != '..')	echo "<div class='folder_image'><a>".$dir."</a></div>";
					}
				echo "</div>";
			?>
			<div id="dir_show_files"></div>
		</section>
	</article>
</div>


