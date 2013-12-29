<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Ký Tài Khoản</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<center>
<p style="margin-bottom:20px; font-size:12px; color:red;">
<?php

	if(isset($_GET['act']) && $_GET['act'] == "dangky")
	{
		$user = addslashes($_POST['username']);
		$pass = md5(addslashes($_POST['password']));
		$vpass = md5(addslashes($_POST['vpassword']));
		$email = addslashes($_POST['email']);
		$fname = addslashes($_POST['hodem']);
		$lname = addslashes($_POST['ten']);
		$address = addslashes($_POST['diachi']);
		$birthday = addslashes($_POST['ngaysinh']);
		$phone = addslashes($_POST['dienthoai']);				
			
		//Báo lỗi nhập thiếu thông tin.
		
		if( !$user || !$pass || !$vpass || !$email)
		{
			echo "(*) Vui lòng nhập đầy đủ thông tin bắt buộc";			
		}
		//Kiểm tra username có người dùng chưa
		else
		{
			if(mysql_num_rows(mysql_query("SELECT User FROM members WHERE User = '$user'")) > 0)
			{		
				echo "(*) Tên đăng nhập đã có người sử dụng!";				
			}			
			//Kiểm tra email có người dùng chưa
			else
			{
				if(mysql_num_rows(mysql_query("SELECT Email FROM members WHERE Email = '$email'"))>0)
				{
					echo "(*) Email này đã có người sử dụng!</a>";					
				}							
				//Kiểm tra nhập lại mật khẩu
				else
				{
					if($pass != $vpass)
					{
					
						echo "(*) Nhập lại mật khẩu chưa đúng!";	
?>
</p>
<?php					
					}
					else
					{
						$tk = mysql_query("INSERT INTO members(User, Pass, Email, FirstName, LastName, Address, Birthday, Phone) VALUES('{$user}','{$pass}','{$email}','{$fname}','{$lname}','{$address}','{$birthday}','{$phone}')");
						if($tk)
						{
							echo "Tài Khoản <b>{$user}</b> đã được tạo thành công.";
						}
					}
				}
			}
		}	

	}
?>	
</center>	

<!--Form đăng ký-->
<form id="form_dangky" action="index.php?act=dangky" method="post">
	<table width="450px">
   		<tr>
   			<p style="border-bottom:dotted 2px #FF0000; margin:0 0 5px 2px; font-weight:bold; font-style:italic; color:red; font-size:12px; width:475px;">Thông tin bắt buộc:</p>
        </tr>
    	<tr>
        	<td width="200px">Tên đăng nhập:</td>
            <td><input type="text" name="username" size="20"></td>
        </tr>
        
        <tr>
        	<td width="200px">Mật khẩu:</td>
            <td><input type="password" name="password" size="20"</td>
        </tr>
        
        <tr>
        	<td width="200px">Nhập lại mật khẩu:</td>
            <td><input type="password" name="vpassword" size="20"></td>
        </tr>
        
        <tr>
        	<td width="200px">Email:</td>
            <td><input type="text" name="email" size="40"></td>
        </tr>
        <td colspan="2"><p style="border-bottom:dotted 2px #FF0000; margin:10px 0 5px 0; font-weight:bold; font-style:italic; color:red; font-size:12px; width:475px;">Thông tin thêm:</p></td>
    	<tr>
        	<td width="200px">Họ đệm:</td>
            <td><input type="text" name="hodem" size="40"></td>
        </tr>
        
        <tr>
        	<td width="200px">Tên:</td>
            <td><input type="text" name="ten" size="40"></td>
        </tr>
        
        <tr>
        	<td width="200px">Địa chỉ:</td>
            <td><input type="text" name="diachi" size="40"></td>
        </tr>
                
        <tr>
        	<td width="200px">Ngày sinh:</td>
            <td><input type="date" name="ngaysinh" size="40"></td>
        </tr>
        
        <tr>
        	<td width="200px">Điện thoại:</td>
            <td><input type="text" name="dienthoai" size="20"></td>
        </tr>
		<tr>
		<td width="200px" colspan="2"><input style="margin-left:205px; width:100px; height:30px; padding-top:3px; background:#666; color:#FFF; font-size:16px; font-weight:bold;" type="submit" value="ĐĂNG KÝ" name="dangky" class="button_dangnhap" /></td>
        
		</tr>
    </table>
   
</form>	