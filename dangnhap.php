<style>
.error {color: #FF0000;}
</style>
<?php

class DangNhap{

	var $Username;
	var $password;
	
	function ConversToObject($array){
		$dn = new DangNhap();
		$dn->Username=$array['Ten'];	
		$dn->password=$array['MatKhau'];
		return $dn;	
	}
	
	static function GetAll(){
			$str = "select * from dangnhap";
			$kq = Query($str);	
			$arr=array();		
			if($kq>0){
				$i=0;
				while($row=mysql_fetch_array($kq)){
					$arr[$i] = self:: ConversToObject($row);
					$i++;
				}
			}
			return $arr;
	}
	
	static function ThayDoiMatKhau($id,$mk){
			$str = "update dangnhap set MatKhau=$mk WHere Ten = '".$id."'";
			$kq = Query($str);
			return $kq;
	}
	
	static function XoaDangNhap($id){
			$str = "DELETE from dangnhap WHere Ten = '".$id."'";
			$kq = Query($str);
			return $kq;
	}	
	
	static function ThemDangNhap($ten,$matkhau){
			$str = "insert into dangnhap(Ten,MatKhau) values ('".$ten."','".$matkhau."')";
			$kq = Query($str);
			return $kq;
	}
	
	static function ViewDangNhapNguoiDung(){
		echo '<form action="Admin.php?obj=sukien" method="get">	
	<table width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse;          		     margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000" align="center">
		 <tr style="color:#087a41">
			 <td width="10%">Tên đang nhập</td>
			 <td width="10%">Mật khẩu</td>			
			 <td width="17%">Họ Tên</td>	
			 <td width="5%">Giới tính</td>
			 <td width="17%">Email</td>			
			 <td width="10%">CMND</td>
			 <td width="17%">Địa chỉ</td>
			 <td width="10%">Số điện thoại</td>		 
			 <td></td>
		</tr>';
			$rr=dangnhap::GetAll();
			for($i=0;$i<count($rr);$i++)
			{
				$str='select * from thongtin where TenDangNhap="'.$rr[$i]->Username.'"';
				$kq=Query($str);	
				while($row=mysql_fetch_array($kq)){				
			echo '<tr>
				<td>'.$rr[$i]->Username.'</td>
				<td>'.$rr[$i]->password.'</td>
				<td>'.$row["Ten"].'</td>
				<td>'.$row["GioiTinh"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["CMND"].'</td>
				<td>'.$row["DiaChi"].'</td>			
				<td>'.$row["DienThoai"].'</td>
				<td>						
					<a href="Admin.php?obj=nguoidung&act=xoa&id='.$rr[$i]->Username.'">Xóa</a>													
				</td>
			</tr>';		
				}
			}
			
			
		}
	static function Form_ThayDoiMatKhau($MKCuErr,$MKMoiErr){		
		  echo  '<center><H3>ĐỔI MẬT KHẨU</H3>
				<center><hr></hr></center>
		  <form action="index.php?obj=ThongTinCaNhan" method="post" id="form_quenmatkhau">
				<table width="500px">
			<tr>
				<td align="right">Tên Đang Nhập:</td>
				<td><input type="text" name="ten" value="'.$_SESSION['tennguoidung'].'" readonly="false"></td>				
			</tr>
			
			<tr>
				<td align="right">Mật khẩu cũ:</td>
				<td><input type="password" name="mkcu"></td>
				<td align="left" class="error">'.$MKCuErr.'</td>
			</tr>
			
			<tr>
				<td align="right">Mật khẩu mới:</td>
				<td><input type="password" name="mkmoi"></td>
			</tr>
			
			<tr>
				<td align="right">Nhập lại mật khẩu mới:</td>
				<td><input type="password" name="mkmoi1"></td>
				<td align="left" class="error">'.$MKMoiErr.'</td>
			</tr>
	</table>
			<input type="submit" value="THAY ĐỔI" name="doimk" style="margin-left:205px;" class="button_xacnhan" />
	</form>';
	}
		
	static function Form_DN(){
		if(!isset($_SESSION['tennguoidung']))
		  echo  '<form class="form_dangnhap" action="index.php" method="post">
			  <h1>Username:</h1><input type="text" name="username" style="width:150px; margin-left:45px; margin-top:-8px;" /><br />
			  <h1>Password:</h1><input type="password" name="password" style="width:150px; margin-left:45px; margin-top:-8px;" /><br />
				<input type="submit" value="ÐĂNG NHẬP" name="dangnhap" class="button_dangnhap" /><br />
			  <h2><a href="index.php?obj=ThongTinCaNhan&act=dangki">Ðăng ký</a> | <a href="index.php?obj=quenmatkhau">Quên mật khẩu</a></h2>
		 	 </form>';
		 else
		 	 DangNhap::DN_ThanhCong();
	}
	
	static function DN_ThanhCong(){
		echo 'Xin Chào'.$_SESSION['tennguoidung'].'<br/>
		<a href="index.php?obj=ThongTinCaNhan&act=thongtin">Thông Tin Cá Nhân</a><br/>
		<a href="index.php?obj=ThongTinCaNhan&act=doimk">Thay đổi mật khẩu</a><br/>	
		<a href="index.php?obj=VeCuaBan">Vé của tôi</a><br/>
		<a href="index.php?act=logout">Thoát</a><br/>';			
	}

    static function DangXuat(){		
			session_destroy();
			header("location:index.php?obj=trangchu");
	}
	
	static function ViewDangKi($TenDNErr,$MKErr,$emailErr,$ERR)
	{
		echo '</br></br><form id="form_dangky" action="index.php?obj=ThongTinCaNhan" method="post">
		<table width="560px">
			<tr>
				<p style="border-bottom:dotted 2px #FF0000; margin:0 0 5px 2px; font-weight:bold; font-style:italic; color:red; font-size:12px; width:475px;">Thông tin bắt buộc:</br></p>
				'.$ERR.'
				
			</tr>
			<tr>
				<td width="50px" align="right">Tên đăng nhập:</td>
				<td width="100px"><input type="text" name="tendn"></td>
				<td width="200px" align="left" class="error" >'.$TenDNErr.'</td>
			</tr>			
			<tr>
				<td width="50px" align="right">Mật khẩu:</td>
				<td width="100px"><input type="password" name="matkhau"></td>
				<td width="200px"></td>
			</tr>			
			<tr>
				<td width="50px" align="right">Nhập lại mật khẩu:</td>
				<td width="100px"><input type="password" name="nhaplaiMK"></td>
				<td width="200px" align="left" class="error">'.$MKErr.'</td>
			</tr>
			<tr>
				<td width="50px" align="right">CMND:</td>
				<td width="100px"><input type="text" name="cmnd"></td>
				<td width="200px" align="left" class="error"></td>
			</tr>
			<tr>
				<td width="50px" align="right">Email:</td>
				<td width="100px"><input type="text" name="email"></td>
				<td width="200px" align="left" class="error">'.$emailErr.'</td>
			</tr>
		
			<td colspan="2"><p style="border-bottom:dotted 2px #FF0000; margin:10px 0 5px 0; font-weight:bold; font-style:italic; color:red; font-size:12px; width:475px;">Thông tin thêm:</p></td>
			
			<tr>
				<td width="50px" align="right">Họ và Tên:</td>
				<td width="100px"><input type="text" name="ten"></td>
				<td width="200px"></td>
			</tr>
			<tr>
				<td width="50px" align="right">Giới tính:</td>
				<td width="100px"><input type="text" name="gioitinh"></td>
				<td width="200px"></td>
			</tr>
			
			<tr>
				<td width="50px" align="right">Địa chỉ:</td>
				<td width="100px"><input type="text" name="diachi"></td>
				<td width="200px"></td>
			</tr>
			<tr>
				<td width="50px" align="right">Điện thoại:</td>
				<td width="100px"><input type="text" name="dienthoai"></td>
				<td width="200px"></td>
			</tr>
			<tr>
			<td width="200px" colspan="2"><input type="submit" value="ĐĂNG KÝ" name="dangky" style="margin-left:205px;" class="button_xacnhan"/></td>
			</tr>
		</table>
	</form>';
	}
	
	
}

	
?>




