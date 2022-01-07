<script type="text/javascript">
$(window).ready(function() {
	$("#settings").load("app_resources/"+$.cookie('module')+"/lib/settings_form.php", function(){
		$('#new_password_confirm').on('keyup', function () {
			if ($(this).val() == $('#new_password').val()) {
				$('#message2').html('Podane hasła są zgodne').css('color', 'green');
				$('#new_password').attr({class: 'pass_valid'});
				$(this).attr({class: 'pass_valid'});
			} else {
				$('#message2').html('Wprowadzono błędne dane').css('color', 'red');
				$('#new_password').attr({class: 'pass_invalid'});
				$(this).attr({class: 'pass_invalid'});
			};
			
		});
		$("#settings_form_button").click(function() {
				var new_password = $('input[name=new_password]').val();
				var new_password_confirm = $('input[name=new_password_confirm]').val();
				var user_id = <?php echo $_SESSION['mennica_magazyn_user_id'] ?>;

				if(new_password !== new_password_confirm)
				{
					alert("Hasła nie pasują do siebie");
				}
				else
				{
					$.ajax({
							url: "app_resources/"+$.cookie('module')+"/lib/settings_form_process.php",
							type: "POST",
							data: "user_id="+user_id+"&new_password="+new_password,
							success: function(data) {
								$.notify('Hasło zostało zmienione', 'success')
								
							}
					});
				};
			
		});
	});

});
</script>
<style>
	input{
		width:100%;
	}
	#message2{
		margin-left:2em;
		font-weight:bold;
	}
  .pass_valid, input:required:valid {
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAepJREFUeNrEk79PFEEUx9/uDDd7v/AAQQnEQokmJCRGwc7/QeM/YGVxsZJQYI/EhCChICYmUJigNBSGzobQaI5SaYRw6imne0d2D/bYmZ3dGd+YQKEHYiyc5GUyb3Y+77vfeWNpreFfhvXfAWAAJtbKi7dff1rWK9vPHx3mThP2Iaipk5EzTg8Qmru38H7izmkFHAF4WH1R52654PR0Oamzj2dKxYt/Bbg1OPZuY3d9aU82VGem/5LtnJscLxWzfzRxaWNqWJP0XUadIbSzu5DuvUJpzq7sfYBKsP1GJeLB+PWpt8cCXm4+2+zLXx4guKiLXWA2Nc5ChOuacMEPv20FkT+dIawyenVi5VcAbcigWzXLeNiDRCdwId0LFm5IUMBIBgrp8wOEsFlfeCGm23/zoBZWn9a4C314A1nCoM1OAVccuGyCkPs/P+pIdVIOkG9pIh6YlyqCrwhRKD3GygK9PUBImIQQxRi4b2O+JcCLg8+e8NZiLVEygwCrWpYF0jQJziYU/ho2TUuCPTn8hHcQNuZy1/94sAMOzQHDeqaij7Cd8Dt8CatGhX3iWxgtFW/m29pnUjR7TSQcRCIAVW1FSr6KAVYdi+5Pj8yunviYHq7f72po3Y9dbi7CxzDO1+duzCXH9cEPAQYAhJELY/AqBtwAAAAASUVORK5CYII=);
    background-position: right top;
    background-repeat: no-repeat;
	border:1px solid green !important
  }
  
  .pass_invalid, input:required:invalid, input:focus:invalid {
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAeVJREFUeNqkU01oE1EQ/mazSTdRmqSxLVSJVKU9RYoHD8WfHr16kh5EFA8eSy6hXrwUPBSKZ6E9V1CU4tGf0DZWDEQrGkhprRDbCvlpavan3ezu+LLSUnADLZnHwHvzmJlvvpkhZkY7IqFNaTuAfPhhP/8Uo87SGSaDsP27hgYM/lUpy6lHdqsAtM+BPfvqKp3ufYKwcgmWCug6oKmrrG3PoaqngWjdd/922hOBs5C/jJA6x7AiUt8VYVUAVQXXShfIqCYRMZO8/N1N+B8H1sOUwivpSUSVCJ2MAjtVwBAIdv+AQkHQqbOgc+fBvorjyQENDcch16/BtkQdAlC4E6jrYHGgGU18Io3gmhzJuwub6/fQJYNi/YBpCifhbDaAPXFvCBVxXbvfbNGFeN8DkjogWAd8DljV3KRutcEAeHMN/HXZ4p9bhncJHCyhNx52R0Kv/XNuQvYBnM+CP7xddXL5KaJw0TMAF8qjnMvegeK/SLHubhpKDKIrJDlvXoMX3y9xcSMZyBQ+tpyk5hzsa2Ns7LGdfWdbL6fZvHn92d7dgROH/730YBLtiZmEdGPkFnhX4kxmjVe2xgPfCtrRd6GHRtEh9zsL8xVe+pwSzj+OtwvletZZ/wLeKD71L+ZeHHWZ/gowABkp7AwwnEjFAAAAAElFTkSuQmCC);
    background-position: right top;
    background-repeat: no-repeat;
    -moz-box-shadow: none;
	border:1px solid red !important
  }
</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Ustawienia konta</h3></div>
		</header>
		<section>
			<div id="settings"></div>
			<span></span>
		</section>
	</article>
</div>