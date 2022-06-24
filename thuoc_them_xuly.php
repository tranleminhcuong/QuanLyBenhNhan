<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Xử lý thêm thuốc</h5>
				<div class="card-body">
					
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		
		
		<script>
			db.collection("THUOC").add({
				mathuoc: "<?php echo $_POST['mathuoc'];?>",
				tenthuoc: "<?php echo $_POST['tenthuoc'];?>",
				dongia: <?php echo $_POST['dongia'];?>
			})
			.then((docRef) => {
				///console.log("Document written with ID: ", docRef.id);
				location.href="thuoc.php";
			})
			.catch((error) => {
				console.error("Error adding document: ", error);
			});
		
		</script>
	
	</body>
</html>