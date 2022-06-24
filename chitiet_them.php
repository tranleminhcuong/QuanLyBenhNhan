<!DOCTYPE html>
<html lang="en">
	<?php include "header.php"; ?>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div id ="form_mo" class="card mt-1">
				<h5 class="card-header">Chi tiết phiếu khám</h5>
				<div class="card-body">
					<form action="chitiet_them.php" method="post">
						<input type="text" id="id" name="id" hidden>
						
						<div class="form-group col-md-4">
							<label for="mathuoc">Mã phiếu</label>
							<input type="text" class="form-control" id="maphieu" name="maphieu" readonly>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="mathuoc">Tên thuốc</label>
								<select class="custom-select" onchange="thuocChanged()" id="HienThiThuoc" name="mathuoc" required>
									
								</select>
							</div>
							
							<div class="form-group col-md-4">
								<label for="soluong">Số lượng</label>
								<input type="text" class="form-control" id="soluong" name="soluong" required>
							</div>
							<div class="form-group col-md-4">
								<label for="dongia">Đơn giá</label>
								<input type="text" class="form-control" id="dongia" name="dongia" readonly>
							</div>
						</div>
						
						<button type="submit"  class="btn btn-success mb-2">Thêm Mới</button>
					</form>
					<table id ="PhanTrang" class="table  table-bordered table-hover table-sm">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col" class="text-center">Mã phiếu</th>
							  <th scope="col" class="text-center">Tên thuốc</th>
							  <th scope="col" class="text-center">Số lượng</th>
							  <th scope="col" class="text-center">Đơn giá</th>
							  <th scope="col" class="text-center">Thành tiền (VND)</th>
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
		<?php
			if(isset ($_GET['id']))
			{
				$ma = $_GET['id'];
		?>
		<script>
		// hiển thị danh sách
		db.collection("CHITIETPHIEU").get().then((querySnapshot)=> {
				var stt = 1;
				var output = "";
				var tt =0;
				var test =0;
			  querySnapshot.forEach((doc)=>{
				if(doc.data().maphieu.id =="<?php echo $ma;?>")
				{
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
						if(doc.data().thanhtien=="")
						{
							tt=0;
						}
						tt+= doc.data().thanhtien;
						
						//output+='<td class="text-center"><a href="chitiet_them.php?id='+doc.id+'"><i class="fa fa-plus-square"></i></a></td>';
						output+='<td class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa chi tiết phiếu khám không ???\')" href="chitiet_xoa.php?id='+doc.id+'"><i class="fa fa-minus-square text-danger"></i></a></td>';
					output+='</tr>';
					stt++;
				}
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
		</script>
		<?php 
			}
		?>
		
		<script>
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
		
		<script>
		//đổ dữ liệu select
		db.collection("THUOC").orderBy("tenthuoc", "asc").get().then((querySnapshot)=> {
					var output = "";
				  querySnapshot.forEach((doc)=>{					 
					output+='<option value="'+doc.id+'">'+doc.data().tenthuoc+'</option>';					
				});
				$('#HienThiThuoc').html(output);
				
		});
		
		</script>
		<script>
		//sự kiện cập nhật đơn giá khi thuốc thay đổi
			function thuocChanged()
			{
				var x = document.getElementById("HienThiThuoc").value;
				var docRef = db.collection("THUOC").doc(x);
				docRef.get().then((doc) => {
					if (doc.exists) {
						//console.log("Document data:", doc.data());
						$('#dongia').val(doc.data().dongia);
						
					} else {
						// doc.data() will be undefined in this case
						console.log("No such document!");
					}
				}).catch((error) => {
					console.log("Error getting document:", error);
				});
			}

		</script>
		
		<?php
		//lấy id từ form phiếu khám sang form chi tiết
		if(isset ($_GET['id']))
		{
			?>
		<script>
		var docRef = db.collection("PHIEUKHAM").doc("<?php echo $_GET['id'];?>");

		docRef.get().then((doc) => {
			if (doc.exists) {
				//console.log("Document data:", doc.data());
				$('#id').val(doc.id);
				$('#maphieu').val(doc.data().maphieu);
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
		///thêm chi tiết phiếu khám
		if(isset ($_POST['id']) and ($_POST['mathuoc']))
		{
			?>
		<script>
		
		db.collection("CHITIETPHIEU").add({
			maphieu: db.doc("PHIEUKHAM/<?php echo $_POST['id'];?>"),
			mathuoc: db.doc("THUOC/<?php echo $_POST['mathuoc'];?>"),
			soluong: <?php echo $_POST['soluong'];?>,
			thanhtien:(<?php echo $_POST['soluong'];?> )* (<?php echo $_POST['dongia'];?>)
		})
		.then((docRef) => {
			///console.log("Document written with ID: ", docRef.id);
			location.href="phieukham.php";
		})
		.catch((error) => {
			console.error("Error adding document: ", error);
		});

		</script>
		<?php
		}
		?>
			
		
	</body>
</html>