<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Sửa bệnh nhân</h5>
				<div class="card-body">
					<form action="benhnhan_sua.php" method="post">
						<input type="text" id="id" name="id" hidden />
						
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
						
						<div class="form-group"	
							<label for="mabaohiem">Mã bảo hiểm</label>
							<input type="text" class="form-control" id="mabaohiem" name="mabaohiem" required>
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="ngaysinh">Ngày sinh</label>
								<input type="text" class="form-control" id="ngaysinh" name="ngaysinh" required>
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
						
						<button type="submit" class="btn btn-info btn-lg">Cập nhật</button>
					</form>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<?php
		if(isset ($_GET['id']))
		{
			?>
		<script>
		var docRef = db.collection("BENHNHAN").doc("<?php echo $_GET['id'];?>");

		docRef.get().then((doc) => {
			if (doc.exists) {
				//console.log("Document data:", doc.data());
				$('#id').val(doc.id);
				$('#mabenhnhan').val(doc.data().mabenhnhan);
				$('#tenbenhnhan').val(doc.data().tenbenhnhan);
				$('#mabaohiem').val(doc.data().mabaohiem);
				$('#ngaysinh').val(doc.data().ngaysinh);
				$('#dienthoai').val(doc.data().dienthoai);
				$('#diachi').val(doc.data().diachi);
				
			} else {
				// doc.data() will be undefined in this case
				console.log("No such document!");
			}
		}).catch((error) => {
			console.log("Error getting document:", error);
		});
		</script>
		<?php
		}
		?>
		<?php
		if(isset ($_POST['mabenhnhan']))
		{
			?>
		<script>
		var washingtonRef = db.collection("BENHNHAN").doc("<?php echo $_POST['id'];?>");

		// Set the "capital" field of the city 'DC'
		washingtonRef.update({
				mabenhnhan: "<?php echo $_POST['mabenhnhan'];?>",
				tenbenhnhan: "<?php echo $_POST['tenbenhnhan'];?>",
				mabaohiem: "<?php echo $_POST['mabaohiem'];?>",
				ngaysinh: "<?php echo $_POST['ngaysinh'];?>",
				dienthoai: "<?php echo $_POST['dienthoai'];?>",
				diachi: "<?php echo $_POST['diachi'];?>"
		})
		.then(() => {
			//console.log("Document successfully updated!");
			location.href="benhnhan.php";
		})
		.catch((error) => {
			// The document probably doesn't exist.
			console.error("Error updating document: ", error);
		});
		</script>
		<?php
		}
		?>
	</body>
</html>