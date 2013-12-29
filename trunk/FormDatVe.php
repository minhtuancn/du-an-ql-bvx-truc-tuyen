	  
<?php
echo '<form action="index.php?obj=datve" method="get">';
DatVe::View_DatVe();		
echo '</form>';
/*Session_register("alert");*/
if($_SESSION["alert"]){ 
	echo $_SESSION["alert"]; 				
unset($_SESSION['alert']); 
}
if(isset($_GET["datve"])){
	if($_GET["matuyen"]!="" && $_GET["ngay"]!="" && $_GET["cmnd"]!="" && $_GET["tenkh"]!="" && $_GET["diachi"]!="" && $_GET["sodt"]!=""){
		
	if(isset($_SESSION['tennguoidung']))
		$tendn=$_SESSION['tennguoidung'];
	else 
		$tendn=""; 
		$kq=DatVe::AddVeXe($tendn,$_GET["matuyen"],$_GET["tenkh"],$_GET["ngay"],$_GET["sodt"],$_GET["diachi"],$_GET["cmnd"],$_GET["giave"],$_GET["soluong"],$_GET["thanhtien"]);
		if($kq>0){
			$_SESSION["alert"] = "Chúng tôi đã lưu vé của bạn vào cơ sỡ dự liêu !"; 	
			header('Location: index.php?obj=datve');
		}
		else{
			$_SESSION["alert"] = "Xin bạn hãy đặt vế lại !"; 	
			header('Location: index.php?obj=datve');
		}		
	}else{
		$_SESSION["alert"] = "Xin bạn nhập thông tin đầy đủ !"; 	
		header('Location: index.php?obj=datve');			
	}	
}
datve::XuLyGia();
?>




