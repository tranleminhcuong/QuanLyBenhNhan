<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Thêm nhân viên</h5>
				<div class="card-body">
					<form action="nhanvien_them.php" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="manhanvien">Mã nhân viên</label>
								<input type="text" class="form-control" id="manhanvien" name="manhanvien" required>
							</div>
							<div class="form-group col-md-6">
								<label for="tennhanvien">Tên nhân viên</label>
								<input type="text" class="form-control" id="tennhanvien" name="tennhanvien" required>
							</div>
						</div>
						<div class="form-group">
							<label for="diachi">Địa chỉ</label>
							<input type="text" class="form-control" id="diachi" name="diachi" required>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="ngaysinh">Ngày sinh</label>
								<input type="text" class="form-control" id="ngaysinh" name="ngaysinh" required>
							</div>
							<div class="form-group col-md-6">
								<label for="dienthoai">Điện thoại</label>
								<input type="text" class="form-control" id="dienthoai" name="dienthoai"required>
							</div>
						</div>
					  
					  <button type="submit" class="btn btn-success btn-lg">Thêm Mới</button>
					</form>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<?php
		if(isset ($_POST['manhanvien']))
		{
			?>
		<script>
			db.collection("NHANVIEN").add({
				manhanvien: "<?php echo $_POST['manhanvien'];?>",
				tennhanvien: "<?php echo $_POST['tennhanvien'];?>",
				diachi: "<?php echo $_POST['diachi'];?>",
				ngaysinh:  "<?php echo $_POST['ngaysinh']; ?>",
				dienthoai: "<?php echo $_POST['dienthoai'];?>"
			})
			.then((docRef) => {
				///console.log("Document written with ID: ", docRef.id);
				location.href="nhanvien.php";
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