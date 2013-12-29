<?php
session_start();

/*Liên kết phương thức kết nối*/
include "configs.php";

/*Liên kết trang đặt vé*/
include "DatVe.php";

/*Liên kết trang sự kiện*/
include "SuKien.php";

/*Liên kết trang thông tin khách hàng*/
include "ThongTinKhachHang.php";

/*Liên kết trang đăng nhập*/
include "dangnhap.php";

/*Liên kết trang tuyến đi*/
include "TuyenDi.php";

/*Liên kết trang chuyến đi*/
include "ChuyenDi.php";

/*Liên kết trang liên hệ*/
include "lienhe.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bán vé xe trực tuyến</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="images/favicon.ico" rel="shortcut icon" />
<script type="text/javascript" src="js/Counter.js"></script>
</head>

<body onload="GetClock()">
<center>
    <!--Phần tiêu đề-->
	<div id="tieude">
	<ul>
    <li><a href="index.php?obj=trangchu">Website đặt vé xe khách Thanh Thủy</a></li><p>|</p>
    <li><a href="index.php?obj=huongdandatve">Cách đặt vé</a></li><p>|</p>
    <li><a href="index.php?obj=huongdanthanhtoan">Cách thanh toán</a></li>
    </ul>
    </div>

<!--Bố cục tổng thể-->
<div id="container">
	<!--Phần banner-->
    <div id="banner">    	
		<?php include 'Banner.php'; ?>
    </div>
    
    <!--Nội dung menu-->
    <div id="menu">
    	<div id="clockbox"></div>
    	<ul>
        	<a href="index.php?obj=trangchu"><li class="trangchu"></li></a>
            <a href="index.php?obj=datve"><li class="datve"></li></a>
            <a href="index.php?obj=chuyendi"><li class="chuyendi"></li></a>
            <a href="index.php?obj=gioithieu"><li class="gioithieu"></li></a>
            <a href="index.php?obj=tuyendung"><li class="tuyendung"></li></a>
            <a href="index.php?obj=lienhe"><li class="lienhe"></li></a>
        </ul>
    </div>
    
    <!--Bố cục cột trái(Left)-->
    <div id="left">    
    
    	<!--Chuyên mục Hướng dẫn-->
        <div class="danhmuc">
        <p>HƯỚNG DẪN</p>
        	<ul>
            	<li><a href="index.php?obj=huongdandatve">Cách đặt vé</a></li>
                <li><a href="index.php?obj=huongdanthanhtoan">Cách thanh toán</a></li>
            </ul>
        </div>
        
        <!--Chuyên mục Tuyến đi-->
        <div class="danhmuc">
        <p>TUYẾN ĐI</p>
			<?php $row=TuyenDi::GetAll();
			for($i=0;$i<count($row);$i++)						
				{
				echo '
				<ul>
					<li><a href="index.php?obj=tuyendi&ten='.$row[$i]->Ten.'&act=tentd">'.$row[$i]->Ten.'</a></li>                
				</ul>';
				}
			?>
        </div>
		
        <!--Chuyên mục Liên kết website-->
        <div class="danhmuc">
        <p>LIÊN KẾT WEBSITE</p>
		<?php SuKien::GetLienKet(); ?>
        </div>  
		
        <!--Chuyên mục view Số lượng truy cập-->
        <div class="danhmuc">
        <p>SỐ LƯỢNG TRUY CẬP</p>		
			<div class="thongke_website">
				<?php include 'SoLuongTruyCap.php'; ?>	
			</div>	
			</div>
			<div>
			<img src="images/quangcao.gif" width="208" height="180" />
			</div> 
   		 </div>
    
    <!--Chuyên mục nội dung chính-->
    <div id="center">
    	<?php
				
		if(isset($_GET["obj"]))
		{	
			$_SESSION["obj"]=$_GET["obj"]; 
		}
		else $_SESSION["obj"]="trangchu";
		include 'NoiDung.php';
		 ?> 
    </div>    
    
    <!--Bố cục cột trái(Left)-->
    <div id="right">
    
		<!--Chuyên mục đăng nhập-->
        <div class="danhmuc">
			<p>ÐĂNG NHẬP</p>
			<?php include 'Form_DangNhap.php' ?>
		</div>
        
        <!--Chuyên mục Tin tức-->
		<div class="danhmuc">
			<p>TIN TỨC</p>
			<?php SuKien::GetTinTuc();?>
		</div>
        
        <!--Chuyên mục hỗ trợ trực tuyến-->
		<div class="danhmuc">
			<p>HỘ TRỢ TRỰC TUYẾN</p>
			<?php SuKien::ViewHoTroTrucTuyen(); ?>
		</div> 
	</div>       
    <div class="clear"></div> 
    
    <!--Phần cuối(footer)-->   
    <div id="footer">
    		<img src="images/logo.png" width="40" height="40"/><h3>WEBSITE ĐẶT VÉ XE TRỰC TUYẾN</h3>
        Địa chỉ: 109/1 Nguyễn Công Trứ, Pường 8, TP Đà Lạt, Lâm Đồng<br />
        Tel: (012) 345 6789 - 012 345 987<br />
        Email: vexethanhthuy@gmail.com<br />
        ©2013 Vexe24h<br />
        <hr class="duongthang" width="1016px" size="1px" color="#FFFFFF" />
        <h4>Xem tốt nhất trên trình duyệt Google Chrome</h4>
    </div>

</div>
</center>
</body>
</html>
