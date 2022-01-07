<?php
session_start();
@$_SESSION['mennica_magazyn_user_id']='';
@$_SESSION['mennica_magazyn_login']='';
?>
<html >
  <head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/login.css">
	<script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="assets/js/notify.js"></script>
	<script>
		jQuery.fn.clear = function()
		{
			var $form = $(".login-form");
			$form.find('input:text, input:password, input:file, textarea').val('');
			$form.find('select').prop('value','');
			$form.find('input:checkbox, input:radio').removeAttr('checked');
			return this;
		}; 
		
		$(document).ready(function() {
			
			$("#checkServicesDB").load("services/checkServicesDB.php");
			setInterval(function() {
				$("#checkServicesDB").load("services/checkServicesDB.php");
			},5500);
			
			var isMobile = {
				Android: function() {
					return navigator.userAgent.match(/Android/i);
				},
				BlackBerry: function() {
					return navigator.userAgent.match(/BlackBerry/i);
				},
				iOS: function() {
					return navigator.userAgent.match(/iPhone|iPad|iPod/i);
				},
				Opera: function() {
					return navigator.userAgent.match(/Opera Mini/i);
				},
				Windows: function() {
					return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
				},
				any: function() {
					return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
				}
			};
			if( isMobile.any() ){
				//var login_autocomplete = localStorage.getItem("login");
				//var password_autocomplete = localStorage.getItem("password");
				var login_autocomplete = '';
				var password_autocomplete = '';
			}
			else {
				var login_autocomplete = '';
				var password_autocomplete = '';
			}
					
			
			if (login_autocomplete == null)
			{
				login_autocomplete = '';
				password_autocomplete = '';
			}
			$('#login').html('<input type="text" class="login-field" autocomplete="on" placeholder="Nazwa użytkownika" id="login-name" name="login-name" value="'+login_autocomplete+'">');
			$('#password').html('<input type="password" class="login-field" autocomplete="on" placeholder="Hasło" id="login-pass" name="login-pass" value="'+password_autocomplete+'">');
			
			$("#login_form_button").click(function() {
					
					var login = $('input[name=login-name]').val();
					var password = $('input[name=login-pass]').val();
					
					if(login.length < 1 || password.length <1)
					{
						alert("Pola nie mogą być puste");
						return false;
					}
					
					$.ajax({
						url: "assets/login/login_process.php",
						type: "POST",
						data: "login="+login+"&password="+password,
						success: function(data) {
							if(data === 'succes')
							{
								//localStorage.setItem("login", login);
								//localStorage.setItem("password", password);
								window.location.href = 'index.php';
							}
							else {
								$.notify('Błędne dane logowania', 'error');
								setTimeout(function(){
									$('.login-form').clear();
								},500);
							}					
						}
					});
			});
			
		});
	</script>    
  </head>

  <body>
<div id="main">	
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<img src="assets/images/logo_VS_rgb.gif" style="width:250px; margin-bottom:20px;"/>
				
				<h1>Logowanie</h1>
				<h4>Magazyn ASEC</h4>
				
			</div>

			<div class="login-form">
				<form autocomplete="on">
				<div class="control-group">
				<!--<input type="text" class="login-field" autocomplete="on" placeholder="Nazwa użytkownika" id="login-name" name="login-name">-->
					<div id="login"></div>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<!--<input type="password" class="login-field" autocomplete="on" placeholder="Hasło" id="login-pass" name="login-pass">-->
				<div id="password"></div>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<a class="btn btn-primary btn-large btn-block" id="login_form_button">Zaloguj</a>
				</form>
				<div id="checkServicesDB"></div>
			</div>
			
		</div>
		
	</div>
</div>	
  </body>
</html>