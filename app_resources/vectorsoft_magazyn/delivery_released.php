<?php
require('config/db.class.php');
?>
<style>
	
	.ui-autocomplete-category {
		font-weight: bold;
		padding: .2em .4em;
		margin: .8em 0 .2em;
		line-height: 1.5;
	}
	.remove_field{
		float:right;
		margin-right:2em;
		font-weight:bold;
		color:#F08080;
	}
	
	.max_value{
		color:#aaa;
	}
	
	#arrival_storage_id, #arrival_document_number, #serwisant{
		margin-left:1.5em;
	}
	#myTabContent{
		margin-left:1em;
	}
	
	select{
		width:15em;
		height:2em;
	}

	input[type="button"], input[type="button"]:hover{
		background-color:#fff;
		border:1px solid #aaa;
		margin-left:1.5em;
		height:2em;
	}

	input::-webkit-input-placeholder {
		/* WebKit browsers */
		text-align: left;
		padding-left:10px;
	}

	input::placeholder {
		text-align: left;
		padding-left:10px;
	}
	
	input[type="text"],input[type="number"]{
		width:15em;
		margin-right:1.5em;
		margin-bottom:0.5em;
		height:2em;
		padding-left:10px;
	}
	
	input[type="number"]{
		width:7.5em !important;
	}
	
	.item{
		background-color:#f8f8f8;
		padding:20px 20px 15px 10px;
		border-top: 1px solid #aaa;
		border-bottom: 1px solid #aaa;
		margin-bottom:5px;
	}
	select{
		padding-left:10px;
	}
	#number_item{
		display:none;
	}
	

  
</style>
<script>
$(document).ready(function(){
	$('#section_success').hide();
	
	$.fn.generate_document_name  = function() {
		var arrival_type_id = '2';
		var arrival_type_prefix = 'WYD';
		
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/generate_document_name.php",
			type: "POST",
			data: "arrival_type_id="+arrival_type_id+"&arrival_type_prefix="+arrival_type_prefix,
			success: function(data) {
				$("#arrival_document_number").html('<h3><br />Numer dokumentu dostawy: </h3><input type="text" disabled="disabled" name="arrival_document_number"  value="'+data+'">');
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});
	};	
	
	$('#arrival_document_number').each(function(){
		$().generate_document_name();
	});
		
	$("#send_form").click(function() {
		$("#send_form").attr("disabled", "disabled"); 
		$("#send_form").css("width", "200px");
		$("#send_form").attr("value", "Przetwarzanie...");
		$("#btn").attr("disabled", "disabled"); 
		setTimeout(function(){ 
					$("#send_form").removeAttr("disabled");
					$("#send_form").css("width", "100px");
					$("#send_form").attr("value", "Zapisz");
					$("#btn").removeAttr("disabled");
					}, 2500
			);
		
		var storage_id = <?php echo $_SESSION['mennica_magazyn_storage_id']?>;
		
		var document_name = $('input[name="arrival_document_number"]').val();
		
		var item_name = $('input[name="item_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_sn = $('input[name="item_sn[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_quantity = $('input[name="item_quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_product_id = $('input[name="item_product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var release_user_id = $('#release_user_id').val();
		var release_user_name = $('#release_user_id option:selected').text();
		
		//warunek czy serwisant został wybrany z listy
		if(release_user_id == null)
		{
			$.notify('Wybierz z listy serwisanta', 'error');
			return false;
		}
		
		//sprawdzanie przed wysłaniem czy pola required są wypełniona		
		var unfilled = $('[required]').filter(function() {
			return $(this).val().length === 0;
		});
		if (unfilled.length > 0) {
			unfilled.css('border', '2px solid #F08080');
			//$.notify('Wprowadż nazwę urządzenia','error');
			setTimeout(function(){ 
					unfilled.removeAttr( 'style' ); 
					}, 2500
			);
			return false;
		}
		//---/
		
		
		
		
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/delivery_released_proccess.php",
			type: "POST",
			data: {
				"storage_id": storage_id,
				"release_user_id": release_user_id,
				"release_user_name": release_user_name,
				"document_name": document_name,
				"item_name[]": item_name,
				"item_sn[]": item_sn,
				"item_quantity[]": item_quantity,
				"item_product_id[]": item_product_id,
				},
			success: function(data) {
				$.notify("Dane zostały zapisane", "success");
				$("#section_form").hide();
				$("#section_success").show("slow");
				$().generate_document_name();
				$(".max_value").hide();
				/*setTimeout(function(){
					$("#delivery_form")[0].reset();
					$('#myTabContent div:not(:first)').remove();
					$("#section_form").show("slow");
					$("#section_success").hide("slow");
				},4000);
				*/
				location.reload();
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});
		
	});	
	/*
	$("#arrival_document_number").hide();
	$("#myTabContent").hide();
	$("#buttons").hide();
	*/
	$.widget( "custom.autocomplete", $.ui.autocomplete, {
      _create: function() {
        this._super();
        this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
      },
      _renderMenu: function( ul, items ) {
        var that = this,
          currentCategory = "";
        $.each( items, function( index, item ) {
          var li;
          if ( item.category != currentCategory ) {
            ul.append( "<li class='ui-autocomplete-category'><b>" + item.category + "</b></li>" );
            currentCategory = item.category;
          }
          li = that._renderItemData( ul, item );
          if ( item.category ) {
            li.attr( "aria-label", item.category + " : " + item.label );
          }
        });
      }
    });
	
    var validOptions = [
	<?php
		foreach($vectorsoft_magazyn->getProductsList($_SESSION['mennica_magazyn_storage_id']) as $row)
		{
			echo '{ label: "'.$row['product_name'].'",
					category: "'.$row['automat_type'].'",
					product_id: "'.$row['product_id'].'",
					sn_required:"'.$row['sn_required'].'",
					max_value: "'.$row['product_quantity'].'"
				},';
		}
	?>
		]
	previousValue = "";
	
	var x=1;
		
    $("#btn").click(function () {
		//sprawdzanie czy nazwa sprzętu została wypełniona przed dodaniem nowego pola		
		var unfilled = $('input[name="item_name[]"]').filter(function() {
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
        x++;
		$('#myTabContent').append('<div class="item">'+
		'<span class="no-mobile" id="number_item">'+x+'. </span>'+
		'<input name="item_name[]"  type="text"    class="searchInput" placeholder="Nazwa sprzętu" required/>'+
		'<input name="item_sn[]" class="item_sn_'+x+'" type="text" placeholder="Numer seryjny (opcjonalnie)" />'+
		'<input name="item_quantity[]" class="item_quantity_'+x+'" placeholder="Ilość" type="number" min="1" required/>'+
		'<input name="item_product_id[]"  type="hidden" id="product_id_'+x+'" disabled="disabled"/><span class="max_value_'+x+'"></span>'+
		'<a href="#" class="remove_field"><img src="assets/icons/del_icon.png" width="30"/></a>'+
		'</div>');


		
		
		
		$('#myTabContent').on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
		});	
		

		
        $(".searchInput").autocomplete({
			source: validOptions,
			select: function(event, ui) {
				$("#product_id_"+x).val(ui.item.product_id);
            }
        }).keyup(function() {
				var isValid = false;
				 for (var i = 0; i <validOptions.length; i++) {
					if (validOptions[i]["label"].toLowerCase().match(this.value.toLowerCase())) {
						isValid = true;
					}
				}
				if (!isValid) {
					this.value = previousValue
				} else {
					previousValue = this.value;
				}
		}).blur(function(){
				var isValid = false;
				var userValue = this.value;
				for (var i = 0; i <validOptions.length; i++) {
					if(userValue === validOptions[i]["label"]){
						/*do walidacji sn*/
						/*if(validOptions[i]["sn_required"] === 'required'){
							$('.item_sn_'+x).prop('required',true);
							$('.item_sn_'+x).removeProp('disabled');
							$('.item_quantity_'+x).prop('value','1');
							$('.item_quantity_'+x).prop('disabled','disabled');
						}
						else{
							$('.item_sn_'+x).prop('disabled','disabled');
							$('.item_sn_'+x).removeProp('required');
							$('.item_quantity_'+x).prop('value','');
							$('.item_quantity_'+x).removeProp('disabled');
						}*/
						var max_value = validOptions[i]["max_value"];
						$('.item_quantity_'+x).prop("max", max_value);
						$('.max_value_'+x).html("Na magazynie: <b>"+max_value+"</b> szt.");
						valid_quantity_x(max_value);
						isValid = true;
					}
				}	

				if (!isValid) {
					$.notify("Niepoprawna nazwa sprzętu", "error");
					this.value = '';
				}
				
				
		});
		
		function valid_quantity_x(max_value){
			$('.item_quantity_'+x).keyup(function(){
				var quantity_x = $('.item_quantity_'+x).val();
				
				if(Number(quantity_x) > Number(max_value))
				{
					$('.item_quantity_'+x).prop('value', '');
					$.notify("Wprowadzona zbyt duża ilość");
					return false;
				}
				if(Number(quantity_x) < 1){
					this.value='';
					$.notify("Wartość nie może być równa 0","error");
					return false;
				}
			});
		}
		
		/*$('.item_sn_'+x).blur(function(){
			var storage_id = <?php echo $_SESSION['mennica_magazyn_storage_id']?>;
			var item_sn = $(this).val();
			var item_product_id = $('input[name="item_product_id[]"]').map(function(){ 
						return this.value; 
					}).get();
				$.ajax({
					url: "app_resources/"+$.cookie('module')+"/lib/check_valid_products.php",
					type: "POST",
					data: {
						"storage_id": storage_id,
						"item_sn[]": item_sn,
						"item_product_id[]": item_product_id,
						},
					success: function(data) {
						console.log(data);
						if(data === 'bad'){
							$('.item_sn_'+x).prop('value','');
							$.notify("Niepoprawny numer seryjny","error");
							$('.item_sn_'+x).css('border', '2px solid #F08080');
						}
						else{
							$('.item_sn_'+x).css('border', '2px solid green');
						} 
					}			
				});
		});*/
		
	
    });

	$('#myTabContent').append(
	'<div class="item">'+
	'<span class="no-mobile" id="number_item">1. </span>'+
	'<input name="item_name[]"  type="text"    class="searchInput" placeholder="Nazwa sprzętu" required/>'+
	'<input name="item_sn[]" class="item_sn" type="text" placeholder="Numer seryjny (opcjonalnie)" />'+
	'<input name="item_quantity[]"  class="item_quantity" type="number" min="1" placeholder="Ilość" required/>'+
	'<input name="item_product_id[]"  type="hidden" id="product_id" disabled="disabled"/><span class="max_value"></span>'+
	'</div>');
	
	/*$('.item_sn').blur(function(){
		var storage_id = <?php echo $_SESSION['mennica_magazyn_storage_id']?>;
		var item_sn = $(this).val();
		var item_product_id = $('input[name="item_product_id[]"]').map(function(){ 
                    return this.value; 
                }).get();
			$.ajax({
				url: "app_resources/"+$.cookie('module')+"/lib/check_valid_products.php",
				type: "POST",
				data: {
					"storage_id": storage_id,
					"item_sn[]": item_sn,
					"item_product_id[]": item_product_id,
					},
				success: function(data) {
					console.log(data);
					if(data === 'bad'){
						$('.item_sn').prop('value','');
						$.notify("Niepoprawny numer seryjny","error");
						$('.item_sn').css('border', '2px solid #F08080');
						setTimeout(function(){ 
							$('.item_sn').removeAttr( 'style' ); 
							}, 2500
						);
					}
					else{
						$('.item_sn').css('border', '2px solid green');
					} 
				}			
			});
	});*/
	
	
	$(".searchInput").autocomplete({
			source: validOptions,
			select: function(event, ui) {
				$("#product_id").val(ui.item.product_id);
			}
	}).keyup(function() {
			var isValid = false;
			 for (var i = 0; i <validOptions.length; i++) {
				if (validOptions[i]["label"].toLowerCase().match(this.value.toLowerCase())) {
					isValid = true;
				}
			}
			if (!isValid) {
				this.value = previousValue
			} else {
				previousValue = this.value;
			}
	}).blur(function(){
			var isValid = false;
			var userValue = this.value;
			for (var i = 0; i <validOptions.length; i++) {
				if(userValue === validOptions[i]["label"]){
					/*do walidacji sn*/
					/*if(validOptions[i]["sn_required"] === 'required'){
						$('.item_sn').prop('required',true);
						$('.item_sn').removeProp('disabled');
						$('.item_quantity').prop('value','1');
						$('.item_quantity').prop('disabled','disabled');
					}
					else{
						$('.item_sn').prop('disabled','disabled');
						$('.item_sn').removeProp('required');
						$('.item_quantity').prop('value','');
						$('.item_quantity').removeProp('disabled');
					}*/
					
					var max_value = validOptions[i]["max_value"];
					$('.item_quantity').prop("max", max_value);
					$('.max_value').html("Na magazynie: <b>"+max_value+"</b> szt.");
					valid_quantity(max_value);
					isValid = true;
				}
			}	
			if (!isValid) {
				$.notify("Niepoprawna nazwa sprzętu","error");
				this.value = '';
			}
	});
	
	function valid_quantity(max_value){
		$('.item_quantity').keyup(function(){
			var quantity = $('.item_quantity').val();
			if(Number(quantity) > Number(max_value))
			{
				$('.item_quantity').prop('value', '');
				$.notify("Wprowadzona zbyt duża ilość");
				return false;
			}
			if(Number(quantity) < 1){
				this.value='';
				$.notify("Wartość nie może być równa 0","error");
				return false;
			}
		});
	}

	
	
});	

</script>
<!--<body onbeforeunload="return !confirm('Czy chcesz opuścić tę stronę')">-->
<body>
<div id="main">


	<article class="post">
		<header>
			<div class="title"><h3>Wydanie towaru z magazynu</h3></div>
		</header>
		
		<section id="section_form">
			
			<form action="#" method="post" id="delivery_form">
				<div id="arrival_document_number"></div>
				
				<div id="serwisant">
					<h3><br />Osoba dla której wydawany jest towar:</h3>
					<select id="release_user_id">
						<option value="0" selected disabled>Wybierz serwisanta z listy</option>
					<?php
						foreach($vectorsoft_magazyn->getSerwisantList($_SESSION['mennica_magazyn_storage_id']) as $row)
						{
							echo "<option value=".$row['id'].">".$row['user_name']."</option>";
						}
					?>
					</select>
				</div>
				
				<div id="myTabContent"><h3><br /><br />Lista pozycji:</h3></div>
				<br />
				<div id="buttons">
					<input type="button" id="btn" style="width:10em" value="Dodaj pozycję" />
					<input type="button" id="send_form" value="Zapisz"/>
				</div>
				
				
			</form>
		<span></span>
		</section>
		<section id="section_success">
			<div style="text-align:center;"><h3>Dane są zapisywane...<br /><br /></h3></div>
		</section>
	</article>

</div>