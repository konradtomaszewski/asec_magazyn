<?php
require('config/db.class.php');
?>
<script> 
$(document).ready(function(){
	$("#sortTable").tablesorter();
	$("#manage_user").hide();

	$("#users_list").load("app_resources/"+$.cookie('module')+"/lib/users_list.php", function(){
		$('.user_manage').click(function(){
			var user_id = $(this).prop("name");
			$("#users_list").hide("slow");
			//console.log(user_id);
			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/user_details_form.php",
					type: "POST",
					data: "user_id="+user_id,
					success: function(data) {
						$("#manage_user").hide().html(data).fadeIn("slow");
						
					}
			});
		});
	});	
	
	

});
</script>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Zarządzanie użytkownikami</h3></div>
		</header>
		<section>
			<div id="users_list">
				
			</div>
			<div id="manage_user"></div>
		</section>
	</article>
</div>
