<!DOCTYPE html>
<html lang="en">
	<<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Xử lý đăng xuất</h5>
				<div class="card-body">				
					<p class="card-text">Đang xử lý đăng xuất....</p>
					<?php
						//Xoá SESSTION
						unset($_SESSION['uid']);
						unset($_SESSION['email']);
					?>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			firebase.auth().signOut();
			location.href='index.php';
		
		</script>
	</body>
</html>