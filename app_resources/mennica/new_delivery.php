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
	
	#arrival_storage_id, #arrival_document_number{
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
	
	$("#send_form").click(function() {
		var storage_id = $( "#arrival_storage_id" ).val();
		
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
		var item_product_id = $('input[name="item_hardwareID[]"]').map(function(){ 
                    return this.value; 
                }).get();
				
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
			url: "app_resources/"+$.cookie('module')+"/lib/new_delivery_process.php",
			type: "POST",
			data: {
				"storage_id": storage_id,
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
				setTimeout(function(){
					$("#delivery_form")[0].reset();
					$('#myTabContent div:not(:first)').remove();
					$("#section_form").show("slow");
					$("#section_success").hide("slow");
					$("#myTabContent").hide();
					$("#buttons").hide();
					$("#arrival_document_number").hide();
					$('#arrival_storage_id').prop('selectedIndex',0);
					location.reload();
				},4000);
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});
		
	});	
	
	$("#arrival_document_number").hide();
	$("#myTabContent").hide();
	$("#buttons").hide();
	
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
		foreach($mennica_magazyn->getProductsList() as $row)
		{
			echo '{ label: "'.$row['name'].'", category: "'.$row['automat_type'].'", hardwareID: "'.$row['id'].'", sn_required: "'.$row['sn_required'].'" },';
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
		'<input name="item_hardwareID[]"  type="hidden" id="hardwareID_'+x+'" disabled="disabled"/>'+
		'<a href="#" class="remove_field"><img src="assets/icons/del_icon.png" width="30"/></a>'+
		'</div>');

		$('#myTabContent').on("click",".remove_field", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
		});	
		
		$(".searchInput").autocomplete({
			source: validOptions,
			select: function(event, ui) {
				$("#hardwareID_"+x).val(ui.item.hardwareID);
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
						if(validOptions[i]["sn_required"] === 'required'){
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
						}
						isValid = true;
					}
				}	
				if (!isValid) {
					$.notify("Niepoprawna nazwa sprzętu", "error");
					this.value = '';
				}
		});
    });

	$('#myTabContent').append(
	'<div class="item">'+
	'<span class="no-mobile" id="number_item">1. </span>'+
	'<input name="item_name[]"  type="text"    class="searchInput" placeholder="Nazwa sprzętu" required/>'+
	'<input name="item_sn[]" class="item_sn" type="text" placeholder="Numer seryjny (opcjonalnie)" />'+
	'<input name="item_quantity[]"  class="item_quantity" type="number" min="1" placeholder="Ilość" required/>'+
	'<input name="item_hardwareID[]"  type="hidden" id="hardwareID" disabled="disabled"/>'+
	'</div>');
	
	$(".searchInput").autocomplete({
			source: validOptions,
			select: function(event, ui) {
				$("#hardwareID").val(ui.item.hardwareID);
				/*var device_id = $('input[name="item_hardwareID[]"]').map(function(){ return this.value; }).get();
				var device_name = $('input[name="item_name[]"]').map(function(){ return this.value; }).get();
				var doc = $('input[name="arrival_document_number"]').val();
				console.log("Projektowanie dostawy: ["+doc+"]; Nazwa urządzenia: ["+device_name+"]; ID urządzenia: ["+device_id+"]");*/
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
					if(validOptions[i]["sn_required"] === 'required'){
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
					}
					isValid = true;
				}
			}	
			if (!isValid) {
				$.notify("Niepoprawna nazwa sprzętu","error");
				this.value = '';
			}
	});
				
	$("#arrival_storage_id").change(function(){
		var selected_storage = $( "#arrival_storage_id option:selected" ).text();
		var selected_storage_id = $( "#arrival_storage_id option:selected" ).val();
		
		$.ajax({
			url: "app_resources/"+$.cookie('module')+"/lib/generate_document_delivery_name.php",
			type: "POST",
			data: "storage_id="+selected_storage_id+"&storage_name="+selected_storage,
			success: function(data) {
				$("#arrival_document_number").html('<h3><br />Numer dokumentu dostawy: </h3><input type="text" disabled="disabled" name="arrival_document_number"  value="'+data+'">');
				$.cookie("nr",data);
			},
			error: function(data) {
				$.notify("Dane nie zostały zapisane", "error");
			}
		});
		
		if(selected_storage.length > 0)
		{
			$("#arrival_document_number").show("slow");
			$("#myTabContent").show("slow");
			$("#buttons").show("slow");
			
		}
	});
	
	
});	

</script>
<!--<body onbeforeunload="return !confirm('Czy chcesz opuścić tę stronę')">-->
<body>
<div id="main">


	<article class="post">
		<header>
			<div class="title"><h3>Nowa dostawa do magazynu</h3></div>
		</header>
		
		<section id="section_form">
			
			<form action="#" method="post" id="delivery_form">
				<select name="arrival_storage_id" id="arrival_storage_id">
					<option disabled="disabled" selected>Wybierz z listy</option>
					<?php
					foreach($mennica_magazyn->getStorageList() as $row)
					{
						echo "<option value=".$row['id'].">".$row['name']."</option>";
					}
					?>
					
				</select>
				<div id="selected_storage"></div>
				
				<div id="arrival_document_number"></div>
				
				<div id="myTabContent"><h3><br />Lista pozycji:</h3></div>
					
					<br /><div id="buttons">
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