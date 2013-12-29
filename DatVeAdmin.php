<?php
/*Session_register("alert");*/
if($_SESSION["alert"]){ 
	echo '<script>
			alert("'.$_SESSION["alert"].'")
		</script>'; 				
unset($_SESSION['alert']); 
}
if(isset($_POST["datve"])){
	if($_POST["matuyen"]!="" && $_POST["ngay"]!="" && $_POST["cmnd"]!="" && $_POST["tenkh"]!="" && $_POST["diachi"]!="" && $_POST["sodt"]!="")
	if($kk=1){
	$kq=DatVe::AddVeXe("",$_POST["matuyen"],$_POST["tenkh"],$_POST["ngay"],$_POST["sodt"],$_POST["diachi"],$_POST["cmnd"],$_POST["giave"],$_POST["soluong"],$_POST["thanhtien"]);
		if($kq>0){
			$_SESSION["alert"] = "Vé đã được lưu !"; 	
			header('location:Admin.php?obj=datve');	
		}
		else{
			$_SESSION["alert"] = "Đặt lại vé"; 	
			header('location:Admin.php?obj=datve');	
		}		
	}else{
		$_SESSION["alert"] = "Thông tin còn thiếu!"; 	
		header('location:Admin.php?obj=datve');				
	}
}
if(isset($_POST["doive"])){
	DatVe::UpdateVeXe($_POST["id"],$_POST["tenkh"],$_POST["ngay"],$_POST["sodt"],$_POST["diachi"],$_POST["cmnd"],$_POST["giave"],$_POST["soluong"],$_POST["thanhtien"]);
	header('location:Admin.php?obj=datve');	
}
if(isset($_GET["act"]) && $_GET["act"]=='datve'){			
		echo '<form action="Admin.php?obj=datve" method="post">';	
		DatVe::View_DatVe();
		echo '</form>';	
}
else{
if(isset($_GET["act"]) && $_GET["act"]=='sua'){			
		echo '<form action="Admin.php?obj=datve" method="post">';	
		DatVe::View_DoiVe();
		echo '</form>';	
		datve::XuLyGia();
}
else{
?>
<form action="Admin.php?obj=datve" method="post">
	<table>
		<tr>
			<td>Mã vé</td>
			<td><input type="text" name="mave" /></td>			
		</tr>
		<tr>
			<td>Mã chuyến</td>			
			<td><select name="tentuyen">				
                <?php 										
					$str = "select * from chuyendi";
					$kq = Query($str);					
					while($row = mysql_fetch_array($kq))
					{	?>
                    <option value="<?php echo $row[0]?>" name="<?php echo $row[0];?>">
						<?php echo $row[0]?>
					</option>
				<?php }?>
           		</select></td>			
		</tr>		
		<tr>
			<td>Ngày đi</td>
			<td><input type="text" name="ngaydi" /></td>			
		</tr>
		<tr>
			<td  colspan="2"><input type="submit" name="timkiem" value="Tìm Kiếm"  style="margin-left:150px;" class="button_xacnhan"/></td>			
		</tr>
	</table>	
	<h4 style="color:#7f86b0">Bảng danh sách thông tin khách hàng đặt vé:</h4>
	<table width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse;          		     margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
		 <tr style="color:#087a41">
			 <td width="4%">Mã vé</td>
			 <td width="8%">Tên đang nhập</td>			
			 <td width="10%">Mã chuyến</td>
			 <td width="10%">Tên khách hàng</td>
			 <td width="10%">Ngày đi</td>
			 <td width="5%">Số điện thoại</td>
			 <td width="10%">Địa chỉ</td>
			 <td width="10%">CMND</td>
			 <td width="8%">Gía vé</td>    
			 <td width="2%">Số lượng</td>
			 <td width="8%">Tổng tiền</td>	 
			 <td><a href="Admin.php?obj=datve&act=datve">Thêm vé</a></td>
		</tr>	
			<?php		
			if(isset($_POST['timkiem']))	
				$arr = DatVe::GetVeXe($_POST["mave"],$_POST["tentuyen"],$_POST["ngaydi"],"");				
			else
				$arr = DatVe::GetAll();
			
			for($i=0;$i<count($arr);$i++)						
			{
				echo '<tr>
					<td>
						'.$arr[$i]->id.'
					</td>
					<td name="tendn">
						'.$arr[$i]->tendn.'
					</td>
					<td name="tuyen">
						'.$arr[$i]->tuyendi.'						
					</td>
					<td name="tenkh">
						'.$arr[$i]->hoten.'
					</td>
					<td name="ngaydi">
						'.$arr[$i]->ngaydi.'
					</td>
					<td name="sodt">
						'.$arr[$i]->sodt.'
					</td>
					<td name="diachi">
						'.$arr[$i]->diachi.' 	
					</td>
					<td name="cmnd">
						'.$arr[$i]->cmnd.'			
					</td>
					<td name="giave">
						'.$arr[$i]->gia.'
					</td>
					<td name="soluong">
						'.$arr[$i]->soluong.'
					</td>
					<td name="thanhtien">
						'.$arr[$i]->thanhtien.'
					</td>						
					<td>							
						<a href="Admin.php?obj=datve&act=xoa&id='.$arr[$i]->id.'">Xóa</a>&nbsp;&nbsp;
						<a href="Admin.php?obj=datve&act=sua&id='.$arr[$i]->id.'&tendn='.$arr[$i]->tendn.'&tuyen='.$arr[$i]->tuyendi.'&tenkh='.$arr[$i]->hoten.'&ngaydi='.$arr[$i]->ngaydi.'&sodt='.$arr[$i]->sodt.'&diachi='.$arr[$i]->diachi.'&cmnd='.$arr[$i]->cmnd.'&giave='.$arr[$i]->gia.'&soluong='.$arr[$i]->soluong.'&thanhtien='.$arr[$i]->thanhtien.'">Cập Nhật</a>											
					</td>
				</tr>';			
			}				
 	
	echo '</table>
	</form>';
	}
}
if(isset($_GET["act"]) && $_GET["act"]=='xoa'){		
	DatVe::DeleteVeXe($_GET["id"]);
	header('location : Admin.php?obj=datve');
}
datve::XuLyGia();	
?>

