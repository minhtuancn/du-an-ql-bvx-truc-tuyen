<?php
class ThongTinKhachHang{
	// Cac thuoc tinh 
	var $ID;
	var $Ten;
	var $GioiTinh;
	var $email;
	var $CMND;
	var $DiaChi;
	var $DienThoai;
	var $TenDangNhap;
	//Chuyen du lieu sang kieu doi tuong
	function ConversToobject($array){
		$dv = new ThongTinKhachHang();
		$dv->ID = $array["ID"];
		$dv->Ten = $array["Ten"];
		$dv->GioiTinh = $array["GioiTinh"];
		$dv->email = $array["email"];
		$dv->CMND = $array["CMND"];
		$dv->DiaChi = $array["DiaChi"];
		$dv->DienThoai = $array["DienThoai"];
		$dv->TenDangNhap = $array["TenDangNhap"];
		return $dv;
		}
		// Lay du lieu trong co so du lieu
		static function GetAll(){
			$str = "select * from thongtin";
			$kq = Query($str);
			$arr=array();
			if($kq>0){
				$i=0;
				while($row=mysql_fetch_array($kq)){
					$arr[$i]= self:: ConversToobject($row);
					$i++;
					}
				}
		}
		
		static function ThemThongTin($ten,$gioitinh,$email,$cmnd,$diachi,$dienthoai,$tendn){
			$str = "insert into thongtin(Ten,GioiTinh,email,CMND,DiaChi,DienThoai,TenDangNhap) values ('".$ten."','".$gioitinh."','".$email."','".$cmnd."','".$diachi."','".$dienthoai."','".$tendn."')";
			$kq = Query($str);
			return $kq;
		}
		
		static function XoaThongTin($id){
			$str = "DELETE from thongtin WHere TenDangNhap = '".$id."'";
			$kq = Query($str);
			return $kq;
		}
	
		static function UpdateThongTin($ID ,$Ten,$GioiTinh,$email,$CMND,$DiaChi,$SoDienThoai){
		$str = "UPDATE thongtin set Ten = '".$Ten."', GioiTinh = '".$GioiTinh."', email = '".$email."', CMND = '".$CMND."', DiaChi = '".$DiaChi. "', SoDienThoai = '".$SoDienThoai."'  where ID = '".$ID."'";
		$kq = Query($str);
		return $kq;
		}
			//view doi thong tin ca nhan
	static function View_DoiThongTinCaNhan(){
		$tendn=$_SESSION['tennguoidung'];	
		$str = "select * From thongtin where TenDangNhap = '".$tendn."'"; 
		$kq = Query($str);
		if($row=mysql_fetch_array($kq))
		{		
		echo '
		<form action="index.php?obj=ThongTinCaNhan" method="get">
					<table width="100%">
					<tr>
						<td class="gioithieu1">
							<img src="images/globe-icon.png" height="12px" /> 
							Thông tin của bạn
						</td>
					</tr>								
					</table>
							
					<table width="100%">     
						<tr>
							<td align="right">
								ID
							</td>
							<td>
								<input type="text" name="id" value="'.$row["ID"].'" readonly="false">	
							</td>			
						</tr>	
						
						<tr>
							<td align="right">
								Ten
							</td>
							<td>
								<input type="text" name="Ten" value="'.$row["Ten"].'">	
							</td>			
						</tr>	
						
						<tr>
							<td align="right">
								Gioi Tinh
							</td>
							<td>
								<input type="text" name="GioiTinh" value="'.$row[2].'">	
							</td>			
						</tr>	
						
						<tr>
							<td align="right">
								email
							</td>
							<td>
								<input type="text" name="email" value="'.$row[3].'">	
							</td>			
						</tr>	
						
						<tr>
							<td align="right">
								CMND
							</td>
							<td>
								<input type="text" name="CMND" value="'.$row[4].'">	
							</td>			
						</tr>
						
						<tr>
							<td align="right">
								Dia Chi
							</td>
							<td>
								<input type="text" name="DiaChi" value="'.$row[5].'">	
							</td>			
						</tr>
						
						<tr>
							<td align="right">
								Dien Thoai
							</td>
							<td>
								<input type="text" name="DienThoai" value="'.$row[6].'">	
							</td>			
						</tr>				      
						
							<tr>
							<td colspan="2">	
								<input type="submit" name="ThayDoi" value="Thay Đổi"  value="Thêm" style="margin-left:150px;" class="button_xacnhan">	
							</td>			
						</tr>
					 </table>
					 </form>';	 
		}
	}
	
	
								
}

			
?>