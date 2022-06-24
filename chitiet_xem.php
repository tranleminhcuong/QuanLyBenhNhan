<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Danh sách chi tiết phiếu khám</h5>
				<div class="card-body">
					<table id="PhanTrang" class="table  table-bordered table-hover table-sm">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col" class="text-center">Mã phiếu</th>
							  <th scope="col" class="text-center">Tên thuốc</th>
							  <th scope="col" class="text-center">Đơn giá</th>
							  <th scope="col" class="text-center">Số lượng</th>
							  <th scope="col" class="text-center">Thành tiền</th>
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
			db.collection("CHITIETPHIEU").get().then((querySnapshot)=> {
				var stt = 1;
				var output = "";
			  querySnapshot.forEach((doc)=>{
				
				output+='<tr>';
					output+='<th scope="row">'+stt+'</th>';
					output+='<td class="'+doc.data().maphieu.id+'"></td>';
					output+='<td class="'+doc.data().mathuoc.id+'"></td>';
					output+='<td class="text-center">'+doc.data().soluong+'</td>';
					output+='<td class="'+doc.data().mathuoc.id+'dongia"></td>';
					if(doc.data().thanhtien>=1000 && doc.data().thanhtien<1000000)
					{
						output+='<td class="text-center">'+doc.data().thanhtien/1000+'.000 VNĐ'+'</td>';
					}
					if(doc.data().thanhtien>=1000000)
					{
						output+='<td class="text-center">'+doc.data().thanhtien/1000000+'.000.000 VNĐ'+'</td>';
					}
					
				output+='</tr>';
				stt++;
				});
				$('#HienThi').html(output);
				//phân trang
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
			
			
			
		//lấy tên thuốc
		db.collection("THUOC").get().then((querySnapshot)=> {
			
			querySnapshot.forEach((doc)=>{
				try{
					let x=document.getElementsByClassName(doc.id);
					for(let i=0;i<x.length;i++)
					{
						x[i].innerText=doc.data().tenthuoc;
					}
				}catch{}
			});
		});
		//lấy đơn giá
		db.collection("THUOC").get().then((querySnapshot)=> {
				
				querySnapshot.forEach((doc)=>{
					try{
						let x=document.getElementsByClassName(doc.id+'dongia');
						for(let i=0;i<x.length;i++)
						{
							x[i].innerText=doc.data().dongia;
						}
					}catch{}
				});
		});
		//lấy mã phiếu
		db.collection("PHIEUKHAM").get().then((querySnapshot)=> {
			
			querySnapshot.forEach((doc)=>{
				try{
					let x=document.getElementsByClassName(doc.id);
					for(let i=0;i<x.length;i++)
					{
						x[i].innerText=doc.data().maphieu;
					}
				}catch{}
			});
		});
		</script>
		
		
	</body>
</html>