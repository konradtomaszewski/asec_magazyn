<script>
$(document).ready(function(){
	function folder_calback(){
		$('#category_block').load("app_resources/"+$.cookie('module')+"/lib/category_block.php",function(){
			$('.folder').click(function(){
				$('#category_block').hide();
				$('#category_content').show();
				$('.grid-container').hide();
				var category_id = $(this).attr('category_id');
				$('#category_content').load("app_resources/"+$.cookie('module')+"/lib/category_content.php?category_id="+category_id, function(){
					folder_calback();
					$('#back').click(function(){
						$('#category_block').show();
						$('#category_content').hide();
						$('#read_article').hide();
						folder_calback();
					});
					$('.files').click(function(){
						$('#read_article').show();
						$('#category_content').hide();
						var article_id = $(this).attr('article_id');
						$('#read_article').load("app_resources/"+$.cookie('module')+"/lib/read_article.php?article_id="+article_id, function(){
							$('#show_category_content').click(function(){
								$('#read_article').hide();
								$('#category_block').hide();
								$('#category_content').show();
							});
						});
					});
				});	
			});
		});
	};

	$('#category_block').load("app_resources/"+$.cookie('module')+"/lib/category_block.php",function(){
		$('.folder').click(function(){
			$('#category_block').hide();
			$('#category_content').show();
     		$('.grid-container').hide();
		  	var category_id = $(this).attr('category_id');
      		$('#category_content').load("app_resources/"+$.cookie('module')+"/lib/category_content.php?category_id="+category_id, function(){
				folder_calback();
				$('#back').click(function(){
					$('#category_block').show();
					$('#category_content').hide();
					$('#read_article').hide();
					folder_calback();
				});
				$('.files').click(function(){
					$('#read_article').show();
					$('#category_content').hide();
					var article_id = $(this).attr('article_id');
					$('#read_article').load("app_resources/"+$.cookie('module')+"/lib/read_article.php?article_id="+article_id, function(){
						$('#show_category_content').click(function(){
							$('#read_article').hide();
							$('#category_block').hide();
							$('#category_content').show();
						});
					});
				});
			});
	  	});
	});
});
</script>
<style>
.container{
	width:70%;
	margin: 0 auto;
}
#read_article{
	margin-top:0px;
}


.grid-container {
	/*zoom:0.8;*/
	display: grid;
	grid-template-columns: repeat(auto-fill,minmax(150px,1fr));
	justify-content: center;
	grid-gap: 60px;
	padding: 10px;
}

.grid-container > .folder {
  text-align: center;
  font-size: 11.5px;
  width: 110px;
  height: 50px;
  padding-top: 75px;
  position: relative;
  cursor: pointer;
  /*zoom:1.2;*/
}

.grid-container > .folder:after {
    content: " ";
    width: 75px;
    height: 52.5px;
    border-radius: 0 5px 5px 5px;
    box-shadow: 1px 1px 0 1px #CCCCCC;
    display: block;
    background-color: #6CCBF9;
    position: absolute;
    top: 15px;
    left: 25px;
}

.grid-container > .folder:before {
    content: " ";
    width: 25px;
    height: 5px;
    border-radius: 5px 15px 0 0;
    display: block;
    background-color: #88D4FF;
    position: absolute;
    top: 10px;
    left: 25px;
}

.grid-container > .files:after {
    content: " ";
    width: 75px;
    height: 52.5px;
    display: block;
    background-image:url('assets/images/pdf.png');
    background-repeat: no-repeat;
    background-origin: padding-box;
    position: absolute;
    top: 15px;
    left: 25px;
}

.grid-container > .files {
  text-align: center;
  font-size: 11.5px;
  width: 110px;
  height: 50px;
  padding-top: 75px;
  position: relative;
  cursor: pointer;
  zoom:1.2;
}
</style>
<div id="main">
	<article class="post">
		<header>
			<div class="title"><h3>Baza wiedzy - widok serwisanta</h3></div>
		</header>
		<section>
			<div class="container">
				<div id='category_block'></div>
				<div id='category_content'></div>
				<div id='read_article'></div>
			</div>
		</section>
		<footer><br /><br /><br /></footer>
	</article>
	
</div>