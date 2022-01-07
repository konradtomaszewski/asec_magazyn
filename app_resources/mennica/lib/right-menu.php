<script src="assets/js/jquery.min.js"></script>
<script>
	$(document).ready( function(){
		$('ul li ul').css('display', 'none');
                $('ul li.dropdown').hover( function(){
                    $('span.left', this).append('<div class="dropdigit">||</div>');
                }, function(){
                    $(".dropdigit").remove();
                });
		$('ul li.dropdown').click( function(e){
			e.preventDefault();
                        
                        $('ul li.dropdown').removeClass('active');
                        if($('ul', this).is(':visible')){
                            $('ul', this).hide();
                            $(this).removeClass('active');
                        }else{
                            $('ul', this).show();
                            $(this).addClass('active');
                        }
			
                        
                
		});
	});
</script>
<style>
#sidebar{
	margin-left:-0.8em !important;
	border:0px !important;
}
ul#sidebar{
    width:250px;
    margin:0px;
    padding:0px;
    border:1px solid #cccccc;
    border-radius: 5px;
    overflow:hidden;
}

ul#sidebar li:last-child{
    border:none;
}

ul#sidebar li{
    /*background:url("../images/heading_bg.png");*/
    width:230px;
    min-height:30px;
    /*border-bottom:1px solid #cccccc;*/
    display:block;
    /*padding:10px 10px 0px 10px;*/
}




ul#sidebar li ul{
    padding:0px;
    margin:0px 0px -20px 0px;
    display:block;
}

ul#sidebar li ul li{
    /*background:#f2f2f2;*/
    width:230px;
    color:#797878 !important;
    height:30px;
    display:block;
    padding-left:20px;
}


ul#sidebar li:hover, ul#sidebar li.active{
   /* background:url("../images/heading_bg_hover.png");*/
    color:#000000;
}

ul#sidebar li span#icon{
    font-family:PulsarJS;
    float:right;
    font-size:21px !important;
}



ul li.dropdown ul {
    display:none !important;
}

ul li.active ul {
    display:block !important;
}
</style>
<!-- Menu -->
					<section id="menu">

						<!-- Links -->
							<section>
								<ul class="links" id="sidebar">
									<li class="dropdown">index
									<ul>
										<li>test</li>
										<li>test2</li>
										<li>test3</li>
									</ul>
									</li>
									<li><a href="page.php">page</a></li>
									<li class="dropdown">home3
									<ul>
										<li>test</li>
										<li>test2</li>
										<li>test3</li>
									</ul>
									</li>
									<li><a href="#">home4</a></li>
									
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<li><a href="#" class="button big fit">Wyloguj</a></li>
								</ul>
							</section>

					</section>