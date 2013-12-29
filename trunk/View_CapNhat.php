<?php


if(isset($_GET["ThayDoi"])){
	$kq=ThongTinKhachHang::UpdateThongTin($_GET["id"],$_GET["Ten"],$_GET["GioiTinh"],$_GET["email"],$_GET["CMND"],$_GET["DiaChi"],$_GET["DienThoai"]);
if($kq>0)
echo 'd';
else echo 's';
}
if(isset($_GET["act"])&&$_GET["act"]=="thongtin")
	ThongTinKhachHang::View_DoiThongTinCaNhan();
if(isset($_GET["act"])&&$_GET["act"]=="doimk"){
	$MKCuErr=$MKMoiErr="";	
	DangNhap::Form_ThayDoiMatKhau($MKCuErr,$MKMoiErr);
}
if(isset($_POST["doimk"])){	
	$str="select MatKhau from dangnhap where Ten='".$_SESSION['tennguoidung']."'";	
	if($kq=mysql_fetch_array(Query($str))){
		if($kq[0]==$_POST["mkcu"]){
			if($_POST["mkmoi"]==$_POST["mkmoi1"]){
				$MKCuErr="";
				$MKMoiErr = '';
				dangnhap::ThayDoiMatKhau($_SESSION['tennguoidung'],$_POST["mkmoi"]);
				DangNhap::Form_ThayDoiMatKhau($MKCuErr,$MKMoiErr);				
				}
			else{
				$MKCuErr="";
				$MKMoiErr = 'Mật khẩu mới không trùng nhau';
				DangNhap::Form_ThayDoiMatKhau($MKCuErr,$MKMoiErr);
				
				}
				
			}
		else{
			$MKCuErr = 'Mật khẩu cũ không đúng';
			$MKMoiErr="";	
			DangNhap::Form_ThayDoiMatKhau($MKCuErr,$MKMoiErr);
			}
		}	
}
if(isset($_GET["act"])&&$_GET["act"]=="dangki"){
	$TenDNErr=$MKErr=$emailErr=$ERR="";	
	dangnhap::ViewDangKi($TenDNErr,$MKErr,$emailErr,$ERR);
}
if(isset($_POST["dangky"])){
$TenDNErr=$MKErr=$emailErr=$ERR="";	
	if($_POST["tendn"]==""||$_POST["matkhau"]==""||$_POST["nhaplaiMK"]==""||$_POST["cmnd"]==""||$_POST["email"]=="")
		$ERR="Xin nhập thông tin bắt buộc đầu đủ";			
	else{
		$string="select Ten from dangnhap";	
		$kq=Query($string);
		while($row=mysql_fetch_array($kq)){
			if($row[0]==$_POST["tendn"]){
				$TenDNErr="Tên đăng nhập đã tồn tại";
				break;
			}
		}
			
		if($_POST["matkhau"]!=$_POST["nhaplaiMK"]){
			$MKErr="Mật khẩu không trùng nhau";
		}		
		else{
			if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST["email"])){
				$emailErr="email không hợp lệ";	
			}
			else{
				$kq1=dangnhap::ThemDangNhap($_POST["tendn"],$_POST["matkhau"]);
				$kq2=ThongTinKhachHang::ThemThongTin($_POST["ten"],$_POST["gioitinh"],$_POST["email"],$_POST["cmnd"],$_POST["diachi"],$_POST["dienthoai"],$_POST["tendn"]);
				if($kq1>0&&$kq2>0)
					$ERR="Bạn tạo tài khoảng thành công";
				else
					$ERR="Bạn hãy thử lại";
			}
		}
			
				
	}
	
	dangnhap::ViewDangKi($TenDNErr,$MKErr,$emailErr,$ERR);

}
?>