
<table>
	<tr>
		<th>
			<a href="<?php echo "Admin.php?obj=".$_GET['obj']."&act=add";?>"></a>
		</th>
	</tr>
		<tr>
			<td>
				<table table width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse; margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
					<tr tr style="color:#087a41">
						<td>idLh</td>
                        <td>Họ Và Tên</td>
						<td>Email</td>
						<td>Điện Thoại</td>
						<td>Nội Dung</td>
						<td>Ngày Cập Nhật</td>
                        
                        
                        <td>Xóa</td>
					</tr>
					<?php
						$arr = lienhe::GetAll();
						for($i=0;$i<COUNT($arr);$i++)
						{
							echo '
							<tr>
								<td>'.$arr[$i]->idLh.'</td>
								<td>'.$arr[$i]->HoTen.'</td>
								<td>'.$arr[$i]->Email.'</td>
								<td>'.$arr[$i]->SoDT.'</td>
								<td>'.$arr[$i]->NoiDung.'</td>
								<td>'.$arr[$i]->NgayCapNhat.'</td>
								
								
							
								<td><a href="Admin.php?obj='.$_GET['obj'].'&act=delete&id='.$arr[$i]->idLh.'">Xóa</td>
							</tr>
							';
						}
						if(isset($_GET["act"]) && $_GET["act"]=='delete'){		
		lienhe::XoaLienHe($_GET["id"]);
		header('location : Admin.php?obj=lienhe');
	}
	
					?>
				</table>
			</td>
		</tr>
</table>
<p>&nbsp;</p>
						
						
							

