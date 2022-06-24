<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Danh sách phiếu khám</h5>
				<div class="card-body">
				
				<a href="phieukham_them.php" class ="btn btn-outline-success mb-2"><i class="fa fa-plus-square"></i> Thêm Mới</a>
					<table id="PhanTrang" class="table  table-bordered table-hover table-sm">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col" class="text-center">Mã phiếu</th>
							  <th scope="col" class="text-center">Tên bệnh nhân</th>
							  <th scope="col" class="text-center">Tên nhân viên</th>
							  <th scope="col" class="text-center">Tên bệnh</th>
							  <th scope="col" class="text-center">Ngày khám</th>
							  <th scope="col" class="text-center">Tổng tiền</th>
							  
							  <th scope="col" class="text-center">Thêm chi tiết</th>
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
			
			
			db.collection("PHIEUKHAM").orderBy("maphieu", "desc").get().then((querySnapshot)=> {
				var stt = 1;
				var output = "";
				var tt = 1;
			  querySnapshot.forEach((doc)=>{
				capnhattongtien(doc.id);
				output+='<tr>';
					output+='<th scope="row">'+stt+'</th>';
					output+='<td>'+doc.data().maphieu+'</td>';
					output+='<td class="'+doc.data().mabenhnhan.id+'"></td>';
					output+='<td class="'+doc.data().manhanvien.id+'"></td>';
					output+='<td>'+doc.data().tenbenh+'</td>';
					output+='<td>'+doc.data().ngaykham+'</td>';
					//console.log(doc.data().mabenhnhan.id);
					if(doc.data().tongtien>=1000 && doc.data().tongtien<1000000)
					{
						output+='<td>'+doc.data().tongtien/1000+'.000 VNĐ'+'</td>';
					}
					if(doc.data().tongtien>=1000000)
					{
						output+='<td>'+doc.data().tongtien/1000000+'.000.000 VNĐ'+'</td>';
					}
					if(doc.data().tongtien==0)
					{
						output+='<td>'+doc.data().tongtien+' VNĐ'+'</td>';
					}
					output+='<td class="text-center"><a href="chitiet_them.php?id='+doc.id+'"><i class="fa fa-plus-square"></i></a></td>';
					output+='<td class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa phiếu '+doc.data().maphieu+' không ???\')" href="phieukham_xoa.php?id='+doc.id+'"><i class="fa fa-minus-square text-danger"></i></a></td>';
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
			//lấy tên bệnh nhân
			db.collection("BENHNHAN").get().then((querySnapshot)=> {
				
			  querySnapshot.forEach((doc)=>{
				  try{
					  let x=document.getElementsByClassName(doc.id);
					  for(let i=0;i<x.length;i++)
					  {
						  x[i].innerText=doc.data().tenbenhnhan;
						  
					  }
				  }catch{}
			  });
			});
			//lây tên nhân viên
			db.collection("NHANVIEN").get().then((querySnapshot)=> {
				
			  querySnapshot.forEach((doc)=>{
				  try{
					  let x=document.getElementsByClassName(doc.id);
					  for(let i=0;i<x.length;i++)
					  {
						  x[i].innerText=doc.data().tennhanvien;
						  
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
			db.collection("CHITIETPHIEU").get().then((querySnapshot)=> {
				
				querySnapshot.forEach((doc)=>{
					try{
						let x=document.getElementsByClassName(doc.id+'thanhtien');
						for(let i=0;i<x.length;i++)
						{
							x[i].innerText=doc.data().thanhtien;
						}
					}catch{}
				});
			});
			
		function capnhattongtien(maphieu)
		{
			var tt = 0;
			db.collection("CHITIETPHIEU").get().then((querySnapshot)=> {
				querySnapshot.forEach((doc)=>{
					if(doc.data().maphieu.id == maphieu)
					{
						if(doc.data().thanhtien=="")
						{
							tt=0;
							
						}
						else
						{
							tt+=doc.data().thanhtien;
						}
						var washingtonRef = db.collection("PHIEUKHAM").doc(doc.data().maphieu.id);
						washingtonRef.update({
						tongtien:tt
						});
					}


				});
			});			
		}
		
		</script>
	</body>
</html>