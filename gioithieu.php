<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id="accordion">
			  <div class="card">
				<div class="card-header" id="headingOne">
				  <h5 class="mb-0">
					<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  GIỚI THIỆU
					</button>
				  </h5>
				</div>

				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
				  <div class="card-body">
					<p style="color:red"><b>Website Quản lý Bệnh Nhân:</b></p>
					<p>- Tin học hoá các nghiệp vụ quản lý</p>
					<p>- Thực hiện bệnh án điện tử</p>
					<p>- Quản lý chặt chẽ thông tin bệnh nhân và thông tin bệnh án của bệnh nhân.</p>
					<p>- Tự động tổng hợp số liệu sử dụng cho bệnh nhân để lập phiếu thanh toán tiền đảm bảo số liệu chính xác, đầy đủ, chống thất thu.</p>
					<p>- Tạo sự chuyên nghiệp trong quản lý bệnh nhân và tiết kiệm thời gian chờ của bệnh nhân và chi phí trong quá trình hoạt động.
				  </div>
				</div>
			  </div>
			  <div class="card" >
				<div class="card-header" id="headingTwo">
				  <h5 class="mb-0">
					<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  THÀNH VIÊN SÁNG LẬP
					</button>
				  </h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				  <div class="card-body">
					<p>Bùi Nhật Trường Linh - DTH185460</p>
					<p>Trương Như Ý - DTH185437</p>
					<p>Nguyễn Ngọc Cẩm - DTH185245</p>
				  </div>
				</div>
			  </div>
				
			  
			</div>
			
			<div class="card">
			  <div class="card-body">
				<h5 class="card-title" style="color:red"><b>CỞ SỞ VẬT CHẤT</b></h5>
				<p class="card-text">Cơ sở vật chất khang trang cùng với trang thiết bị hiện đại tạo nên sự chuyên nghiệp cho đội ngũ y bác sĩ.</p>
				<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			  </div>
			  <img class="card-img-bottom img-thumbnail" src="images/banner1.png" alt="Card image cap">
			</div>
			
			<div class="card">
			  <div class="card-body">
				<h5 class="card-title" style="color:red"><b>ĐỘI NGŨ Y BÁC SĨ</b></h5>
				<p class="card-text">Đội ngũ y bác sĩ thân thiện, nhiệt tình, chu đáo. Đặc biệt, các y bác sĩ điều có chuyên môn cao mang đến cho bệnh nhân sự yên tâm tuyệt đối.</p>
				<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			  </div>
			  <img class="card-img-bottom img-thumbnail" src="images/banner7.jpg" alt="Card image cap">
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
		<script>
			$(window).scroll(function(){
				if($(window).scrollTop() >= 10) {
					$('.button_scroll2top').show();
				} else {
					$('.button_scroll2top').hide();
				}
			});
			function page_scroll2top(){
				$('html,body').animate({
					scrollTop: 0
				}, 'fast');
			}
		</script>
	</body>
</html>