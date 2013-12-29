<?php 
if(isset($_GET["Huy"])){	
		DatVe::DeleteVeXe($_GET["id"]);
		//header('location:index.php?obj=VeCuaBan');
		//DatVe::View_Huy();
}

if(isset($_GET["Doi"])){	
		echo '<form action="index.php?obj=VeCuaBan" method="get">';	
		DatVe::View_DoiVe();
		echo '</form>';
}
else
{
	DatVe::View_Huy();
}
if(isset($_GET["doive"])){
	$kq=DatVe::UpdateVeXe($_GET["id"],$_GET["tenkh"],$_GET["ngay"],$_GET["sodt"],$_GET["diachi"],$_GET["cmnd"],$_GET["giave"],$_GET["soluong"],$_GET["thanhtien"]);
	header('location:index.php?obj=VeCuaBan');	
}

?>
