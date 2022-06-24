<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="css/body.css" />
</head>
<body>
	<div id="login-overlay" class="modal-dialog">
		<div id="form_mo" class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Đóng</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Thành viên đăng nhập</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-6">
						<div class="well">
							<form action="dangnhap_xuly.php" method="post">
								<div class="form-group">
									<label for="email" class="control-label">Tài khoản</label>
									<input class="form-control" id="email" name="email" type="email" required   >
									<span class="help-block"></span>
								</div>
								<div class="form-group">
									<label for="matkhau" class="control-label">Mật khẩu</label>
									<input class="form-control" id="matkhau" name="matkhau" type="password" required  >
									<span class="help-block"></span> 
								</div>
								<button type="submit" class="btn btn-success btn-block"><i class="fad fa-sign-in-alt"></i>Đăng nhập
							</form>
						</div>
					</div>
					<div class="col-xs-6">
						<p class="lead" align="center">WEBSITE QUẢN LÝ BỆNH NHÂN </p>
						<ul class="list-unstyled" style="line-height: 2">
							<li><span class="fa fa-check text-success"></span> Bền vững – Tận tâm – Hiệu quả
							</li>
							<li><span class="fa fa-check text-success"></span> Sáng y đức – Vững chuyên môn – Luôn sẵn sàng
							</li>
						
							<li><span class="fa fa-check text-success"></span> Đỉnh cao chất lượng - Chuẩn mực yêu thương
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "javascript.php"; ?>
</body>
</html>