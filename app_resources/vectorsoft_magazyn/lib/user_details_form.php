<?php
require("../../../config/db.class.php");
$user_id = $_POST['user_id'];
?>
<script>
$(document).ready(function(){
	$('#cancel').click(function(){
		$("#users_list").show("slow");
		$("#manage_user").hide();
	});
	
	$('#edit_user').click(function(){
		var user_id = $('input[name=user_id]').val();
		var login = $('input[name=login]').val();
		var new_password = $('input[name=new_password]').val();
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
			setTimeout(function(){ 
					unfilled.removeAttr( 'style' ); 
					}, 2500
			);
			return false;
		}
		//---/
		
		$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/edit_user_process.php",
				type: "POST",
				data: "user_id="+user_id+"&login="+login+"&password="+new_password+"&user_name="+user_name+"&email="+email+"&user_group_id="+user_group_id+"&storage_id="+storage_id,
				success: function(data) {
					$.notify("Zaktualizowane dane użytkownika", "success");
					$("#users_list").load("app_resources/"+$.cookie('module')+"/lib/users_list.php", function(){
						$('.user_manage').click(function(){
							var user_id = $(this).prop("name");
							$("#users_list").hide("slow");
							
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
				},
				error: function(data){
					$.notify('Wystąpił błąd', 'error');
				}
		});
	});
});
</script>
<style>
h4{
	float:left;
}
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


<?php
$user_details = $user->getUserDetails($_POST['user_id']);
?>
<h3>Szczegóły użytkownika <?php echo $user_details[0]['user_name']?></h3><br />
<table style="width:40%; border:1px solid #ddd">

			<tr>
				<td><h4>Nazwa użytkownika</h4><input type="text" name="login" required value="<?php echo $user_details[0]['login']?>"/></td>
				<input type="hidden" name="user_id" value="<?php echo $_POST['user_id']?>" />
				<td><h4>Imię i nazwisko</h4><input type="text" name="user_name" required value="<?php echo $user_details[0]['user_name']?>"/></td>
			</tr>
			<tr>
				<td><h4>hasło</h4><input type="password" name="new_password" /></td>
				<input type="hidden" name="password" value="<?php echo $_POST['password']?>" />
				<td><h4>email</h4><input type="text" name="email" value="<?php echo $user_details[0]['email']?>"/></td>
			</tr>
			<tr>
				<td><h4>Grupa użytkowników</h4>
				<select id="user_group_id">
				<option selected disabled value="<?php echo $user_details[0]['user_group_id']?>">Wybrano: <?php echo $user_details[0]['user_group_name']?></option>
				<?php
				foreach($user->getGroupList() as $row)
				{
					echo "<option value='".$row['id']."'>".$row['name']."</option>";
				}
				?>
				</select></td>
				
				<td><h4>Przypisz magazyn</h4>
				<select id="storage_id">
				<?php
				if($user_details['storage_id'] == 0)
				{
					echo "<option selected disabled value='0'>Wybrano: Wszystkie</option>";
				}
				else echo	"<option selected disabled value='".$user_details[0]['storage_id']."'>Wybrano: ".$user_details[0]['storage_name']."</option>";
				
				foreach($user->getStorageList() as $row)
				{
					echo "<option value='".$row['id']."'>".$row['name']."</option>";
				}
				?>
				<option value="0">Wszystkie</option>
				</select></td>
			</tr>
			<tr style="background-color:#eee">
			<td><br /><input type="button" value="Powrót" id="cancel"/></td>
			<td><br /><input type="button" value="Zapisz zmiany" id="edit_user"/></td>
			</tr>
			</table>
			<br /><br />