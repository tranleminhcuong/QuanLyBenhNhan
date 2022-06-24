<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header " >Nhân viên</h5>
				<div class="card-body">
				
				<a href="nhanvien_them.php"  class ="btn btn-outline-success mb-2"><i class="fa fa-plus-square"></i> Thêm Mới</a>
					
					<table id="PhanTrang" class="table  table-bordered table-hover table-sm " style="width:100%">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col" class="text-center">Mã nhân viên</th>
							  <th scope="col" class="text-center">Tên nhân viên</th>
							  <th scope="col" class="text-center">Địa Chỉ</th>
							  <th scope="col" class="text-center">Ngày Sinh</th>
							  <th scope="col" class="text-center">Điện Thoại</th>
							  <th scope="col" class="text-center">Sửa</th>
							  <th scope="col" class="text-center">Xóa</th>
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
		
		db.collection("NHANVIEN").orderBy("manhanvien", "desc").get().then((querySnapshot) => {
			var stt = 1;
			var output = "";
			
			querySnapshot.forEach((doc) => {
								
				output+='<tr>';
					output+='<th scope="row">'+stt+'</th>';
					output+='<td class="text-center"><span class="d-block text-primary">'+doc.data().manhanvien+'</td>';
					output+='<td ><span class="d-block text-success">'+doc.data().tennhanvien+'</td>';
					output+='<td class="text-center small">'+doc.data().diachi+'</td>';
					output+='<td class="text-center">'+doc.data().ngaysinh+'</td>';
					output+='<td class="text-center">'+doc.data().dienthoai+'</td>';
					output+='<td class="text-center"><a href="nhanvien_sua.php?id='+doc.id+'"><i class="fa fa-pencil"></i></a></td>';
					output+='<td class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa nhân viên '+doc.data().tennhanvien+' không ???\')" href="nhanvien_xoa.php?id='+doc.id+'"><i class="fa fa-minus-square text-danger"></i></a></td>';
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