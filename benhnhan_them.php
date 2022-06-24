<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Thêm bệnh nhân</h5>
				<div class="card-body">
					<form action="benhnhan_them.php" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="mabenhnhan">Mã bệnh nhân</label>
								<input type="text" class="form-control" id="mabenhnhan" name="mabenhnhan" required>
							</div>
							<div class="form-group col-md-6">
								<label for="tenbenhnhan">Tên bệnh nhân</label>
								<input type="text" class="form-control" id="tenbenhnhan" name="tenbenhnhan" required>
							</div>
						</div>
						<div class="form-group">
							<label for="mabaohiem">Mã bảo hiểm</label>
							<input type="text" class="form-control" id="mabaohiem" name="mabaohiem" required>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="ngaysinh">Ngày sinh</label>
								<input type="text" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="dd/MM/yyyy" required>
							</div>
							<div class="form-group col-md-6">
								<label for="dienthoai">Điện thoại</label>
								<input type="text" class="form-control" id="dienthoai" name="dienthoai" required>
							</div>
						</div>
						<div class="form-group">
							<label for="diachi">Địa chỉ</label>
							<input type="text" class="form-control" id="diachi" name="diachi" required>
						</div>
					  
						<button type="submit" class="btn btn-success btn-lg" onclick="kientra(mabenhnhan)">Thêm Mới</button>
					</form>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<?php
		if(isset ($_POST['mabenhnhan']))
		{
		?>
		<script>
		
		
			db.collection("BENHNHAN").add({
				mabenhnhan: "<?php echo $_POST['mabenhnhan'];?>",
				tenbenhnhan: "<?php echo $_POST['tenbenhnhan'];?>",
				mabaohiem: "<?php echo $_POST['mabaohiem'];?>",
				diachi: "<?php echo $_POST['diachi'];?>",
				ngaysinh: "<?php echo $_POST['ngaysinh'];?>",
				dienthoai: "<?php echo $_POST['dienthoai'];?>"
			})
			.then((docRef) => {
				console.log("Document written with ID: ", docRef.id);
				location.href="benhnhan.php";
			})
			.catch((error) => {
				console.error("Error adding document: ", error);
			});

		</script>
		<?php
		}
		?>
	</body>
</html>