<script>
$(document).ready(function(){
	function isInArray(value, array) {
	  return array.indexOf(value) > -1;
	}
	
	var deny_user_id = [55,56,57,58,59];
	var user_id = <?php echo $_SESSION['mennica_magazyn_user_id'];?>;

	if(!isInArray(user_id, deny_user_id))
	{
		$('#allow').css("display", "block");	
	}
	else $('#deny').css("display", "block");
	
	
	$('#productSelect_form').load("app_resources/"+$.cookie('module')+"/lib/productSelect_form.php",function(){
		$('#productSelect').change(function(){
			var service_request = $( this ).val();
			var res = service_request.split("$");
			
			var service_request_id = res[0];
			var service_request_pname = res[1];
			var service_request_pid = res[2];
			var service_request_arrival_id = res[3];
			var service_request_quantity = res[4];
			var service_request_sn = res[5];

			$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/productSelect_form_process.php",
					type: "POST",
					data: "service_request_id="+service_request_id+"&product_id="+service_request_pid+"&product_name="+service_request_pname+"&arrival_id="+service_request_arrival_id+"&quantity="+service_request_quantity+"&sn="+service_request_sn,
					success: function(data) {
						$("#productDetail_form").html(data); 
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
input, select{
	height:3em;
	width:15em;
	margin-right:15px;
	padding-left:10px;
}
h4{
	text-align:left !important;
}
#deny, #allow{
	display:none;
}
</style>
<div id="main">
		<div id="deny">
			<article class="post">
				<header>
					<div class="title"><h3>Brak uprawnień</h3></div>
				</header>
				<section>
					Brak uprawnień do wykonania działań.
					<span></span>
				</section>
			</article>	
		</div>
		<div id="allow">
			<article class="post">
				<header>
					<div class="title"><h3>LIsta pobranych urządzeń</h3></div>
					
				</header>
				<section>
			
				<div id="productSelect_form"></div>
				<div id="productDetail_form"></div>
									
				<span></span>
				</section>
			</article>
		</div>	
		
</div>
