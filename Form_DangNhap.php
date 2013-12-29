<?php

if(isset($_POST["dangnhap"])){	
	$kq ="select * from dangnhap where Ten = '".$_POST['username']."' and MatKhau = '".$_POST['password']."'";
	$str = Query($kq);
	if($_POST['username']=="admin"&&$_POST['password']=="123456")
	{
		header ("Location:Admin.php");
		//$_SESSION['username'] = $_POST['username'];
	}
	else{
		if(mysql_num_rows($str)>0)
		{	while($s=mysql_fetch_array($str))
				{
					$arr=DangNhap::ConversToObject($s);
					$_SESSION['tennguoidung']=$arr->Username;					
					DangNhap::DN_ThanhCong();	   			
				}
		}	
		else
		{
			DangNhap::Form_DN();	
			echo '<script>
				alert ("Sau mật khẩu hoặc tên người dùng")
				</script>';
		}
	}
}
else
{
	DangNhap::Form_DN();
}
if(isset($_GET['act']) && $_GET['act'] == "logout")
{
	DangNhap::DangXuat();
}


