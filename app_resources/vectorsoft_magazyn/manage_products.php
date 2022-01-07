<script>
$(document).ready(function(){

	$('#manage_products_form').load("app_resources/"+$.cookie('module')+"/lib/manage_products_form.php",function(){
		$('#manage_products_btn').click(function(){
			var automat_type = $('.automat_type_select').val();
			console.log(automat_type);
			var product_name = $('input[name=product_name]').val();
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/manage_products_process.php",
				type: "POST",
				data: "product_name="+product_name+"&automat_type="+automat_type,
				success: function(data) {
					$("input[type=text], select").val("");
					$.notify('ok', 'success');
				},
				error: function(data){
					$.notify('Błąd', 'error');
				}
			});
		});
	});

	$('#manage_products_name_form').load("app_resources/"+$.cookie('module')+"/lib/manage_products_name_form.php",function(){
		$('select[name=products_name_select]').change(function(){
			var product_name = $('select[name=products_name_select] option:selected').text();
			var product_id = $('select[name=products_name_select] option:selected').val();
			/*$('#manage_products_name_result').hide().html(
				'<br />'+
				'<label>Nazwa urządzenia</label>'+
				'<input type="hidden" name="product_id" value="'+product_id+'" />'+
				'<input type="text" name="product_name" value="'+product_name+'" />'+
				'<br/><br />'+
				'<input type="button" value="Zmień" id="change_product_name"/>'
			).fadeIn("slow");*/
			
				$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/get_products_name.php",
					type: "POST",
					data: "product_name="+product_name+"&product_id="+product_id,
					success: function(data) {
						$('#manage_products_name_result').html(data);
						//location.reload();
						//$.notify('Nazwa urządzenia została zmieniona', 'success');
					},
					error: function(data){
						$.notify('Błąd', 'error');
					}
				});
			
			$('#change_product_name').click(function(){
				var product_id = $('input[name=product_id]').val();
				var product_name = $('input[name=product_name]').val();
				var automat_type = $('select[name=automat_type] option:selected').val();
				console.log(product_id);
				console.log(product_name);
				console.log(automat_type);
				
				/*$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/manage_products_name_process.php",
					type: "POST",
					data: "product_name="+product_name+"&product_id="+product_id,
					success: function(data) {
						location.reload();
						$.notify('Nazwa urządzenia została zmieniona', 'success');
					},
					error: function(data){
						$.notify('Błąd', 'error');
					}
				});*/
			});
		});
	});


	$.fn.remove_automat_type = function() {
		$('.remove').click(function(){
			var automat_type = $(this).attr('id');
			console.log(automat_type);
			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/manage_automat_type_remove_process.php",
					type: "POST",
					data: "automat_type="+automat_type,
					success: function(data) {
						$("input[type=text], select").val("");
						$("#manage_automat_type_result").load("app_resources/"+$.cookie('module')+"/lib/manage_automat_type.php", function(){
							$().remove_automat_type();
						});
						$('#manage_products_form').load("app_resources/"+$.cookie('module')+"/lib/manage_products_form.php",function(){
							$('#manage_products_btn').click(function(){
								var automat_type = $('.automat_type_select').val();
								console.log(automat_type);
								var product_name = $('input[name=product_name]').val();
								$.ajax({
									url: "app_resources/"+$.cookie('module')+"/lib/manage_products_process.php",
									type: "POST",
									data: "product_name="+product_name+"&automat_type="+automat_type,
									success: function(data) {
										$("input[type=text], select").val("");
										$.notify('ok', 'success');
									},
									error: function(data){
										$.notify('Błąd', 'error');
									}
								});
							});
						});
					},
					error: function(data){
						$.notify('Błąd', 'error');
					}
			});
		});
	};

	$("#manage_automat_type_result").load("app_resources/"+$.cookie('module')+"/lib/manage_automat_type.php", function(){
		$().remove_automat_type();
	});

	$('#manage_automat_type_form').load("app_resources/"+$.cookie('module')+"/lib/manage_automat_type_form.php",function(){
		$('#manage_automat_type_btn').click(function(){
			var automat_type = $('input[name=automat_type]').val();
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/manage_automat_type_process.php",
				type: "POST",
				data: "automat_type="+automat_type,
				success: function(data) {
					$("input[type=text], select").val("");
					$("#manage_automat_type_result").load("app_resources/"+$.cookie('module')+"/lib/manage_automat_type.php", function(){
						$().remove_automat_type();
					});
					
					$('#manage_products_form').load("app_resources/"+$.cookie('module')+"/lib/manage_products_form.php",function(){
						$('#manage_products_btn').click(function(){
							var automat_type = $('.automat_type_select').val();
							console.log(automat_type);
							var product_name = $('input[name=product_name]').val();
							$.ajax({
								url: "app_resources/"+$.cookie('module')+"/lib/manage_products_process.php",
								type: "POST",
								data: "product_name="+product_name+"&automat_type="+automat_type,
								success: function(data) {
									$("input[type=text], select").val("");
									$.notify('ok', 'success');
								},
								error: function(data){
									$.notify('Błąd', 'error');
								}
							});
						});
					});
					//$.notify('ok', 'success');
				},
				error: function(data){
					$.notify('Błąd', 'error');
				}
			});
		});
	});
}); 
</script>
<style>
	select, input{
		width:15em;
	}
	
	input, input::-webkit-input-placeholder {
		/* WebKit browsers */
		text-align: left;
		padding-left:10px;
	}

	input, input::placeholder {
		text-align: left;
		padding-left:10px;
	}
	
	select{
		padding-left:10px;
	}
	
	.remove_row{
		height:40px;
		border:1px solid #ddd;
		margin-bottom:5px;
		padding-left:20px;
	}
	
	.remove_row:hover{
		background-color:#f8f8f8;
		border:1px solid #aaa;
		height:40px;
		width:100%;
	}
	.remove{
		position:absolute;
		right:80px;
		font-weight:bold;
		color:#F08080;
	}
	.remove:hover{
		color:red !important;
	}
	
	input[type="button"]{
		width:8em;
		text-align:center;
	}

</style>
<div id="main">
	<article class="post">
		<header><div class="title"><h3>Edytuj nazwę urządzenia</h3></div></header>
		<section>
			<div id="manage_products_name_form"></div>
			<div id="manage_products_name_result">
			
			</div>
		</section>
	</article>
</div>

<div style="display:block; width:50px"></div>

<div id="main">
	<article class="post">
		<header><div class="title"><h3>Definiuj nowe urządzenie</h3></div></header>
		<section>
			<div id="manage_products_form"></div>
			<div id="manage_products_result"></div>
		</section>
	</article>
</div>

<div style="display:block; width:50px"></div>

<div id="main">
	<article class="post">
		<header><div class="title"><h3>Zarządzaj grupą automatów</h3></div></header>
		<section>
			<div id="manage_automat_type_form"></div>
			<div id="manage_automat_type_result"></div>
		</section>
	</article>
</div>




