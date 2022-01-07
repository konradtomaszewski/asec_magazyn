$.fn.new_delivery  = function() {
	$("#send_form").click(function() {
		var item_name = $('input[name="item_name[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_sn = $('input[name="item_sn[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_quantity = $('input[name="item_quantity[]"]').map(function(){ 
                    return this.value; 
                }).get();
		var item_hardwareID = $('input[name="item_hardwareID[]"]').map(function(){ 
                    return this.value; 
                }).get();
		
		//sprawdzanie przed wys³aniem czy pola required s¹ wype³niona		
		var unfilled = $('[required]').filter(function() {
			return $(this).val().length === 0;
		});
		if (unfilled.length > 0) {
			unfilled.css('border', '2px solid red');
			setTimeout(function(){ 
					unfilled.removeAttr( 'style' ); 
					}, 2500
			);
			return false;
		}
		//---/
							
		$.ajax({
			url: "lib/result.php",
			type: "POST",
			data: {
				"item_name[]": item_name,
				"item_sn[]": item_sn,
				"item_quantity[]": item_quantity,
				"item_hardwareID[]": item_hardwareID,
				},
			success: function(data) {
				/**/
			},
			error: function(data) {
				/**/
			}
		});
		
	});	
	
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
      { label: "anders", category: "", hardwareID: "1" },
      { label: "andreas", category: "", hardwareID: "2" },
      { label: "antal", category: "", hardwareID: "3" },
      { label: "annhhx10", category: "Products", hardwareID: "4" },
      { label: "annk K12", category: "Products", hardwareID: "5" },
      { label: "annttop C13", category: "Products", hardwareID: "6" },
      { label: "anders andersson", category: "People", hardwareID: "7" },
      { label: "andreas andersson", category: "People", hardwareID: "8" },
      { label: "andreas johnson", category: "People", hardwareID: "9" }
		]
	previousValue = "";
	
	var x=1;
		
    $("#btn").click(function () {
		//sprawdzanie czy nazwa sprzêtu zosta³a wype³niona przed dodaniem nowego pola		
		var unfilled = $('input[name="item_name[]"]').filter(function() {
			return $(this).val().length === 0;
		});
		if (unfilled.length > 0) {
			unfilled.css('border', '2px solid red');
			setTimeout(function(){ 
					unfilled.removeAttr( 'style' ); 
					}, 2500
			);
			return false;
		}
		//---/
        x++;
		$('#myTabContent').append(
		'<div><input name="item_name[]"  type="text"    class="searchInput" placeholder="Nazwa sprzêtu" required/><input name="item_sn[]"  type="text" placeholder="Numer seryjny" /><input name="item_quantity[]"  type="text" placeholder="Iloœæ" type="number" min="1" required/><input name="item_hardwareID[]"  type="hidden" id="hardwareID_'+x+'" disabled="disabled"/><a href="#" class="remove_field">Remove</a></div>');
        console.log($(".searchInput"));
		
		$('#myTabContent').on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
		});	
		
        $(".searchInput").autocomplete({
            source: validOptions,
			select: function(event, ui) {
				$("#hardwareID_"+x).val(ui.item.hardwareID);
            }
        }).keyup(function() {
				var isValid = false;
				for (i in validOptions) {
					if (validOptions[i].toLowerCase().match(this.value.toLowerCase())) {
						isValid = true;
					}
				}
				if (!isValid) {
					this.value = previousValue
				} else {
					previousValue = this.value;
				}
			});
    });
	
	$('#myTabContent').append('<div><input name="item_name[]"  type="text"    class="searchInput" placeholder="Nazwa sprzêtu" required/><input name="item_sn[]"  type="text" placeholder="Numer seryjny" /><input name="item_quantity[]"  type="number" min="1" placeholder="Iloœæ" required/><input name="item_hardwareID[]"  type="hidden" id="hardwareID" disabled="disabled"/></div>');
	
	
	$(".searchInput").autocomplete({
        source: validOptions,
		select: function(event, ui) {
				$("#hardwareID").val(ui.item.hardwareID);
        }
    }).keyup(function() {
				var isValid = false;
				for (i in validOptions) {
					if (validOptions[i].toLowerCase().match(this.value.toLowerCase())) {
						isValid = true;
					}
				}
				if (!isValid) {
					this.value = previousValue
				} else {
					previousValue = this.value;
				}
			});
	
	
	
	
}
$().new_delivery();