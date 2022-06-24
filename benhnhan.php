<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card  border rounded-left mt-1 " >
				<h5 class="card-header">Bệnh nhân</h5>
				<div class="card-body">
				
				<a href="benhnhan_them.php" class ="btn btn-outline-success mb-2"><i class="fa fa-plus-square"></i> Thêm Mới</a>
					<table id="PhanTrang" class="table table-bordered table-hover table-sm mb-0">
						  <thead>
								<tr>
								  <th scope="col" >#</th>
								  <th scope="col" class="text-center" width="13%">Mã bệnh nhân</th>
								  <th scope="col" class="text-center" width="15%">Tên bệnh nhân</th>
								  <th scope="col" class="text-center" width="10%">Bảo hiểm</th>
								  <th scope="col" class="text-center" >Địa chỉ</th>
								  <th scope="col" class="text-center" width="9%">Ngày sinh</th>
								  <th scope="col" class="text-center" width="10%">Điện thoại</th>
								  <th scope="col">Sửa</th>
								  <th scope="col">Xóa</th>
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
		//var league = db.collection("BENHNHAN").doc('mabenhnhan').get().data().maphong.get().data();
		db.collection("BENHNHAN").orderBy("mabenhnhan", "desc").get().then((querySnapshot) => {
			var stt = 1;
			var output = "";
			
			querySnapshot.forEach((doc) => {
				
				
				output+='<tr>';
					output+='<th scope="row">'+stt+'</th>';
					output+='<td class="text-center"><span class="d-block text-primary">'+doc.data().mabenhnhan+'</td>';
					output+='<td ><span class="d-block text-success">'+doc.data().tenbenhnhan+'</td>';
					output+='<td class="text-center">'+doc.data().mabaohiem+'</td>';
					output+='<td class="text-center small">'+doc.data().diachi+'</td>';
					output+='<td class="text-center">'+doc.data().ngaysinh+'</td>';
					output+='<td class="text-center">'+doc.data().dienthoai+'</td>';
					
					output+='<td class="text-center"><a href="benhnhan_sua.php?id='+doc.id+'"><i class="fa fa-pencil"></i></a></td>';
					output+='<td class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa bệnh nhân '+doc.data().tenbenhnhan+' không ???\')" href="benhnhan_xoa.php?id='+doc.id+'"><i class="fa fa-minus-square text-danger"></i></a></td>';
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