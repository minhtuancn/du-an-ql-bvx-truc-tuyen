<?php
	session_start();  
	include "configs.php";
	include "DatVe.php";
	include "SuKien.php";
	include "TuyenDi.php";
	include "ChuyenDi.php";
	include "ThongTinKhachHang.php";
	include "dangnhap.php";
	include "lienhe.php";
	
	//if(isset($_SESSION['username']) && $_SESSION['username'] == "admin")
	{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bán vé xe trực tuyến</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="images/favicon.ico" rel="shortcut icon" />
</head>

<body>
<center>
<div id="tieude"></div>
<div id="container">
	<div id="Banner"><?php include 'Banner.php';?></div>
    <div id="menu1" style="box-shadow:0 5px 20px #666666;">
    	<ul style="margin-left:2px;">
        	<li><a title="Danh sách người dùng" href="Admin.php?obj=nguoidung">Người dùng</a></li>
            <li><a title="Quản lý đặt vé" href="Admin.php?obj=datve">Đặt vé</a></li>
            <li><a title="Quản lý các tuyến đi" href="Admin.php?obj=tuyendi">Tuyến đi</a>
			 <li><a title="Quản lý các chuyến đi" href="Admin.php?obj=chuyendi">Chuyến đi</a>
            <li><a title="Thêm liên kết Website" href="Admin.php?obj=sukien">Sự kiện</a></li>
            <li><a title="Y kiến khách hàng" href="Admin.php?obj=lienhe">Liên hệ</a></li>
			<li><a title="Thoát" href="index.php?obj=trangchu">Thoát</a></li>
        </ul>
    </div>
    
    <div style="width:884px; height:auto; float:right; margin-right:-1px; background:#FFF; text-align:center; padding:10px 0 0 0; border:#7f86b0 solid 2px; box-shadow:0 5px 20px #666666;">
    	<?php		
			if(isset($_GET["obj"]))
			{
				switch($_GET["obj"])
				{
					case "trangchu":						
					break;
					
					case "nguoidung":
						if(isset($_GET["act"]) && $_GET["act"]=='xoa'){	
							ThongTinKhachHang::XoaThongTin($_GET["id"]);
							dangnhap::XoaDangNhap($_GET["id"]);	
							header('location : Admin.php?obj=nguoidung');
							}
					echo "<h4 style='color:#7f86b0'>THÔNG TIN NGƯỜI DÙNG ĐĂNG KÝ WEBSITE </h4>";
					dangnhap::ViewDangNhapNguoiDung();
					break;
					
					case "datve":
					include "DatVeAdmin.php";							
					break;							
											
					case "tuyendi":
					{
						if(isset($_POST["them"])){
							$kq=TuyenDi::ThemTuyenDi($_POST["id"],$_POST["diemdi"],$_POST["diemden"],$_POST["soluong"]);
							if($kq<1)
							 	echo '<script>
											alert("Bạn xem mã ID đã tồn tại hay chưa?");
										</script>';							
						}
						if(isset($_GET["act"]) && $_GET["act"]=='themtuyendi'){
						echo "<h4 style='color:#6F56C6'>Thêm Tuyến Đi</h4></br>";
						echo '<form action="Admin.php?obj=tuyendi&act=tuyendi" method="Post">';
						TuyenDi::ViewThemTuyenDi();
						echo '</form>';							
						}
						echo "<h4 style='color:#7f86b0'>Tuyến Đi</h4></br>";
						TuyenDi::ViewTuyenDiAdmin();				
										  
						break;
					}
					
					case "chuyendi":
					{
						if(isset($_POST["them"])){
							$kq=ChuyenDi::ThemChuyenDi($_POST["id"],$_POST["tentuyen"],$_POST["giodi"],$_POST["loaixe"],$_POST["soghe"],$_POST["gia"]);
							if($kq<1)
							 	echo '<script>
											alert("Bạn xem mã ID đã tồn tại hay chưa?");
										</script>';							
						}						
						if(isset($_GET["act"]) && $_GET["act"]=='themchuyendi'){
						echo "<h4 style='color:#6F56C6'>Thêm Chuyến Đi</h4></br>";
						echo '<form action="Admin.php?obj=chuyendi&act=chuyendi" method="Post">';
						ChuyenDi::ViewThemChuyenDi();
						echo '</form>';							
						}
						if(isset($_POST["doichuyen"])){
							 ChuyenDi::UpdateChuyenDi($_POST["id"],$_POST["tentuyen"],$_POST["giodi"],$_POST["loaixe"],$_POST["soghe"],$_POST["giave"]);
							header('location:Admin.php?obj=chuyendi');	
						}
						if(isset($_GET["act"]) && $_GET["act"]=='sua'){
						echo "<h4 style='color:#6F56C6'>Sửa Chuyến Đi</h4></br>";
						echo '<form action="Admin.php?obj=chuyendi&act=chuyendi" method="Post">';
						ChuyenDi::ViewSuaChuyenDi();
						echo '</form>';							
						}
						echo "<h4 style='color:#7f86b0'>Chuyến Đi</h4></br>";
						ChuyenDi::ViewChuyenDiAdmin();
											  
					break;
					}
					
					case "sukien":
						if(isset($_GET["act"]) && $_GET["act"]=='ThemNoiDung'){
						echo "<h4 style='color:#6F56C6'>Thêm Nội Dung</h4></br>";
						echo '<form action="Admin.php?obj=sukien&act=tuyendung" method="Post">';
						SuKien::ViewThemTD();
						echo '</form>';	
						}	

						if(isset($_POST["them"])){
							if(isset($_GET["act"]) && $_GET["act"]=='tintuc')							
								$id='TinTuc'.$_POST["id"];
							if(isset($_GET["act"]) && $_GET["act"]=='tuyendung')							
									$id='TuyenDung'.$_POST["id"];
							if(isset($_GET["act"]) && $_GET["act"]=='lienket')	
								$id='LienKet'.$_POST["id"];
							$kq=SuKien::ThemSuKien($id,$_POST["ten"],$_POST["lienket"]);
							if($kq<1)
							 	echo '<script>
											alert("Bạn xem mã ID đã tồn tại hay chưa?");
										</script>';							
						}
						
						if(isset($_GET["act"]) && $_GET["act"]=='themtintuc'){
							echo "<h4 style='color:#6F56C6'>Thêm tin tức</h4></br>";
							echo '<form action="Admin.php?obj=sukien&act=tintuc" method="Post">';
							SuKien::ViewThem();
							echo '</form>';	
						}
						
						if(isset($_GET["act"]) && $_GET["act"]=='themlienket'){
							echo "<h4 style='color:#6F56C6'>Thêm liên kết</h4></br>";
							echo '<form action="Admin.php?obj=sukien&act=lienket" method="post">';
							SuKien::ViewThem();
							echo '</form>';	
						}
						
						echo "<h4 style='color:#7f86b0'>Tuyển Dụng</h4></br>";
						SuKien::ViewTuyenDung();
						echo "<h4 style='color:#7f86b0'>TIN TỨC</h4></br>";
						SuKien::ViewTinTuc();
						echo "<h4 style='color:#7f86b0'>LIÊN KẾT</h4></br>";
						SuKien::ViewLienKet();						
						break;
					
					case "lienhe":
						echo "<h4 style='color:#7f86b0'>CẬP NHẬT THÔNG TIN LIÊN HỆ</h4>";
						include "LienHeAdmin.php";
					break;					
					
					case "TrangChuAdminThemSKVHD":
					{
						include "TrangChuAdminThemSKVHD.php";
						break;
					}
					case "TrangChuAdminThemDiemDuLichNoiTiengTrenTheGioi":
					{
						include "TrangChuAdminThemDiemDuLichNoiTiengTrenTheGioi.php";
						break;
					}
					case "TrangChuAdminThemĐiemuLichNoiTiengCuaVietNam":
					{
						include "TrangChuAdminThemĐiemuLichNoiTiengCuaVietNam.php";
						break;
					}							
				}
			}
			else
			{
				echo "<h4 style='color:#7f86b0'>CHỈ CÓ ADMIN MỚI THẤY ĐƯỢC ĐIỀU NÀY!!!</h4>";
				?>
                   <img src="images/img_trang chu/admin.jpg">
                 <?php
			}			
		?>
    </div>
</div>
</body>
</html>
<?php
}datve::XuLyGia();
?>
