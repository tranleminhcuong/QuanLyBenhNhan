<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div  id ="form_mo" class="card mt-1">
				<h5 class="card-header">Xóa nhân viên</h5>
				<div class="card-body">
				
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			db.collection("NHANVIEN").doc("<?php echo $_GET['id'];?>").delete().then(() => {
				///console.log("Document successfully deleted!");
				location.href="nhanvien.php";
			}).catch((error) => {
				console.error("Error removing document: ", error);
			});
		</script>
	</body>
</html>