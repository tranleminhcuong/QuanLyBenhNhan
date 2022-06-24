<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Thuốc</h5>
				<div class="card-body">
				
				<a href="thuoc_them.php" class ="btn btn-outline-success mb-2"><i class="fa fa-plus-square"></i> Thêm Mới</a>
					<table id="PhanTrang" class="table table-bordered table-hover table-sm">
						  <thead>
							<tr>
							  <th scope="col" class="text-center">#</th>
							  <th scope="col" class="text-center" width="15%">Mã thuốc</th>
							  <th scope="col" class="text-center">Tên thuốc</th>
							  <th scope="col" class="text-center">Đơn giá</th>
							  
							  <th scope="col" width="8%" class="text-center">Sửa</th>
							  <th scope="col" width="8%" class="text-center">Xóa</th>
							</tr>
						  </thead>
						  <tbody id="HienThi">
						  </tbody>
					</table>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		
		<script>
		
		db.collection("THUOC").orderBy("mathuoc", "desc").get().then((querySnapshot) => {
			var stt = 1;
			var output = "";
			
			querySnapshot.forEach((doc) => {
				
				output+='<tr>';
					output+='<th scope="row" class="text-center">'+stt+'</th>';
					output+='<td class="text-center"><span class="d-block text-primary">'+doc.data().mathuoc+'</td>';
					output+='<td class="text-center"><span class="d-block text-success">'+doc.data().tenthuoc+'</td>';
					output+='<td class="text-center">'+doc.data().dongia+'</td>';
					
					output+= '<td class="text-center"><a href="thuoc_sua.php?id='+doc.id+'"><i class="fa fa-pencil"></i></a></td>';
					output+= '<td class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa thuốc '+doc.data().tenthuoc+' không ???\')" href="thuoc_xoa.php?id='+doc.id+'"><i class="fa fa-minus-square text-danger"></i></a></td>';
				output+='</tr>';
				stt++;
			});
			$('#HienThi').html(output);
			$(document).ready(function(){
				$('#PhanTrang').DataTable({
					'language': {
						'sProcessing':   'Đang xử lý...',
						'sLengthMenu':   'Hiển thị _MENU_ dòng',
						'sZeroRecords':  'Không tìm thấy dòng nào phù hợp',
						'sInfo':         'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ dòng',
						'sInfoEmpty':    'Đang xem 0 đến 0 trong tổng số 0 dòng',
						'sInfoFiltered': '(được lọc từ _MAX_ dòng)',
						'sInfoPostFix':  '',
						'sSearch':       'Tìm kiếm:',
						'sUrl':          '',
						'oPaginate': {
							'sFirst':    '<i class="fad fa-arrow-alt-to-left"></i>',
							'sPrevious': '<i class="fad fa-arrow-alt-left"></i>',
							'sNext':     '<i class="fad fa-arrow-alt-right"></i>',
							'sLast':     '<i class="fad fa-arrow-alt-to-right"></i>'
						}
					}
				});
			});
		});
		</script>
	</body>
</html>