
<nav class="navbar navbar-expand-lg rounded-lg  navbar-dark bg-success" >
	
	<a class="navbar-brand" href="index.php">
		<i class="fa fa-heartbeat" aria-hidden="true" style="color:red"></i>
		Quản Lý Bệnh Nhân
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		
				<?php
			session_start();
			if(!isset($_SESSION['uid']))
			{
		?>		
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="gioithieu.php">
							<i class="fa fa-info-circle"></i> Giới thiệu
						</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="dangnhap.php">
							<i class="fad fa-sign-in-alt"></i> Đăng nhập
						</a>
					</li>
				</ul>
				
		<?php
			}
			else
			{
		?>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="gioithieu.php">
							<i class="fa fa-info-circle"></i> Giới thiệu
						</a>
					</li>
				</ul>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="phieukham.php">
							<i class="fa fa-list-alt" aria-hidden="true"></i> Phiếu khám
						</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="chitiet_xem.php">
							<i class="fa fa-list-alt" aria-hidden="true"></i> Đơn thuốc
						</a>
					</li>
					
					<li class="nav-item active">
						<a class="nav-link" href="benhnhan.php">
								<i class="fa fa-wheelchair" aria-hidden="true"></i> Bệnh nhân
						</a>
					</li>
					<li class="nav-item active dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-cogs"></i> Danh mục
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="nhanvien.php">
								<i class="fa fa-user-md" aria-hidden="true"></i> Nhân viên
							</a>
							
							<a class="dropdown-item" href="thuoc.php">
								<i class="fa fa-medkit" aria-hidden="true"></i> Kho thuốc
							</a>
							
						</div>
					</li>
					
			
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="dangxuat.php">
							<i class="fal fa-user-circle" style="color:yellow"></i> <?php echo $_SESSION['email'] ?>  [Đăng xuất]
						</a>
					</li>
			
				</ul>
		<?php
			}
		?>
		
	</div>
</nav>
<div id="head-link">
	<div id="head-link3">	
		<font color="#FFFFFF">
		<marquee onmouseover= "this.stop();" onmouseout="this.start();">
			 Website quản lý bệnh nhân - đồng hành cùng bệnh nhân trên những chặng đường tương lai; cùng tạo ra những giá trị Bền vững – Tận tâm – Hiệu quả.
		</marquee>	
		</font>
	</div> 
</div>