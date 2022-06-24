<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="images/banner2.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				  <img src="images/banner5.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
				  <img src="images/banner6.jpg" class="d-block w-100" alt="...">
				</div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
			
			<div class="text-center p-2" style="background-color: white">
				<font color="darkgreen">
					<marquee onmouseover= "this.stop();" onmouseout="this.start();">
						 Chúng tôi luôn sẵn sàng phục vụ !&nbsp;Hotline: 0368 672 641
					</marquee>	
				</font>
			</div>	
			<?php include "footer.php"; ?>
			
			<div class="button_scroll2top" onclick="page_scroll2top()">
				<i class="fa fa-chevron-up"/>
			</div>
		</div>
		
		<?php include "javascript.php"; ?>
		
	</body>
</html>