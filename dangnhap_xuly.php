<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Xử lý đăng nhập</h5>
				<div class="card-body">
					<div id="KetQua">
						<p class="card-text">Đang xử lý đăng nhập....</p>
						<div class="alert alert-danger alert-dismissible fade show mb-0" role ="alert">
							<span id="ThongBao"></span>
							<button type="button" class="close" data-dismiss="alert-warning" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>	
						</div>
					</div>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
		
		$('#KetQua').hide();
		var email='<?php echo $_POST['email']; ?>';
		var password='<?php echo $_POST['matkhau']; ?>';
		firebase.auth().signInWithEmailAndPassword(email,password)
			.then((userCredential)=>{
				var user = userCredential.user;
				$.ajax({
					type:'POST',
					url:'dangnhap_ajax.php',
					data: {
						uid: user.uid,
						email: user.email
					},
					dataType:'text',
					success: function(response) {
						location.href='index.php';
					}
				});
			})
			.catch((error)=>{
				$('.card-text').hide();
				$('#KetQua').show();
				$('#ThongBao').html('Lỗi '+error.code+': '+error.message);
			});
		</script>
	</body>
</html>