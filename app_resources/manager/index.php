<?php
require('config/db.class.php');
?>
<style>
input::placeholder {
	text-align: left;
	padding-left:10px;
}

input, select{
	width:15em;
	margin-right:1.5em;
	margin-bottom:0.5em;
	height:2em;
	padding-left:10px;
}

select{
	height:2.5em;
}

input[type='button']{
	float:right;
	width:15em;
	height:2.5em !important;
}

table h4{
	text-align:left !important;
}
</style>
<script>
$(document).ready(function(){
	$('#new_user').click(function(){
		var email_mask = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		
		var login = $('input[name=login]').val();
		var password = $('input[name=password]').val();
		var user_name = $('input[name=user_name]').val();
		var email = $('input[name=email]').val();
		var user_group_id = $('#user_group_id option:selected').val();
		var storage_id = $('#storage_id option:selected').val();
		
		//sprawdzanie przed wysłaniem czy pola required są wypełniona		
		var unfilled = $('[required]').filter(function() {
			return $(this).val().length === 0;
		});
		if (unfilled.length > 0) {
			unfilled.css('border', '2px solid #F08080');
			$.notify("Uzupełnij wszystkie pola", "error");
			setTimeout(function(){ 
					unfilled.removeAttr( 'style' ); 
					}, 2500
			);
			return false;
		}
		//---/
		
		var valid_email = email_mask.test(email);
		
		if(valid_email == false)
		{
			$.notify("Wprowadź poprawny adres email", "error");
			return false;
		}		
		
		
		
		
		$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/new_user_process.php",
					type: "POST",
					data: "login="+login+"&password="+password+"&user_name="+user_name+"&email="+email+"&user_group_id="+user_group_id+"&storage_id="+storage_id,
					success: function(data) {
						//$().html(data); 
						$.notify("Utworzono nowe konto", "success");
						$("input[type=text],input[type=password], select").val("");
					},
					error: function(data){
						//$.notify('Błąd', 'error');
					}
			});
	});
});
</script>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Nowy użytkownik</h3></div>
		</header>
		<section>
		<h3>Uzupełnij formularz</h3>
		<form action="" method="" autocomplete="off">
			<table style="width:40%; margin:0 auto; border:1px solid #ddd">
			<tr>
				<td><h4>Nazwa użytkownika</h4><input type="text" name="login" required autocomplete="off"/></td>
				<td><h4>Imię i nazwisko</h4><input type="text" name="user_name" required autocomplete="off"/></td>
			</tr>
			<tr>
				<td><h4>hasło</h4><input type="password" name="password" required autocomplete="off"/></td>
				<td><h4>email</h4><input type="text" name="email" required autocomplete="off"/></td>
			</tr>
			<tr>
				<td><h4>Grupa użytkowników</h4>
				<select id="user_group_id">
				<option selected disabled>Wybierz grupę</option>
				<?php
				foreach($user->getGroupList() as $row)
				{
					echo "<option value='".$row['id']."'>".$row['name']."</option>";
				}
				?>
				</select></td>
				
				<td><h4>Przypisz magazyn</h4>
				<select id="storage_id">
				<option selected disabled>Wybierz magazyn</option>
				<?php
				foreach($user->getStorageList() as $row)
				{
					echo "<option value='".$row['id']."'>".$row['name']."</option>";
				}
				?>
				</select></td>
			</tr>
			<tr style="background-color:#eee">
			<td colspan="2"><br /><input type="button" value="Utwórz użytkownika" id="new_user"/></td>
			</tr>
			</table>
		</form>	
		<br /><br />
		</section>
	</article>
</div>
