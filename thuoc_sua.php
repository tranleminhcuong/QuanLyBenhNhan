<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Sửa thuốc</h5>
				<div class="card-body">
					<form action="thuoc_sua.php" method="post">
						<input type="text" id="id" name="id" hidden />
						
						<div class="form-group">
							<label for="mathuoc">Mã thuốc</label>
							<input type="text" class="form-control" id="mathuoc" name="mathuoc" required />
						</div>
						
						<div class="form-group">
							<label for="tenthuoc">Tên thuốc</label>
							<input type="text" class="form-control" id="tenthuoc" name="tenthuoc" required />
						</div>
						
						<div class="form-group">
							<label for="dongia">Đơn giá</label>
							<input type="text" class="form-control" id="dongia" name="dongia" required />
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
		var docRef = db.collection("THUOC").doc("<?php echo $_GET['id'];?>");

		docRef.get().then((doc) => {
			if (doc.exists) {
				//console.log("Document data:", doc.data());
				$('#id').val(doc.id);
				$('#mathuoc').val(doc.data().mathuoc);
				$('#tenthuoc').val(doc.data().tenthuoc);
				$('#dongia').val(doc.data().dongia);
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
		if(isset ($_POST['mathuoc']))
		{
			?>
		<script>
		var washingtonRef = db.collection("THUOC").doc("<?php echo $_POST['id'];?>");

		// Set the "capital" field of the city 'DC'
		washingtonRef.update({
				mathuoc: "<?php echo $_POST['mathuoc'];?>",
				tenthuoc: "<?php echo $_POST['tenthuoc'];?>",
				dongia: "<?php echo $_POST['dongia'];?>"
		})
		.then(() => {
			//console.log("Document successfully updated!");
			location.href="thuoc.php";
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