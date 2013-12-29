<?php
	if(isset($_POST["lienhe"]))
	{
				if(ereg("[a-zA-Z0-9\._]+@[a-zA-Z0-9]+\.[a-zA-Z]+",$_POST["Email"]))

		/*if(preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST["Email"]))*/		{
			$kq = lienhe::ThemLienHe($_POST["HoTen"],$_POST["Email"],$_POST["DienThoai"],$_POST["NoiDung"]);
			if($kq>0)
			{
				echo "<script>alert('Cảm ơn bạn đã góp ý.')</script>";
				echo'<script>window.location.assign("index.php");</script>';
			}
			else
			{
				echo "<script>alert('Xảy ra lỗi, vui lòng kiểm tra thông tin nhập vào')</script>";
			}
		}
		else
		{
			echo "<script>alert('Email không chính xác!')</script>";
		}
	}
	else if(isset($_POST["huy"]))
	{
		header("Location:index.php");
	}
?>


	<div style="width:765px; height:500px;">
    	<div id="trangcn">
        	<h3>Liên hệ</h3>
            <hr />
            <form method="post" action="index.php?obj=lienhe">
            <table id="canhan">
            	<tr>
                	<td>Họ Và Tên</td>
                    <td>
                    	<input type="text" name="HoTen" /> (*)
                    </td>
                </tr>
                <tr>
                	<td>Email</td>
                    <td>
                    <input type="text" name="Email" /> (*)
                    </td>
                </tr>
                <tr>
                	<td>Điện Thoại</td>
                    <td>
                    	<input type="text" name="DienThoai"/> (*)
                    </td>
                </tr>
                <tr>
                	<td>Nội Dung</td>
                    <td>
                    <textarea name="NoiDung" cols="45" rows="5"></textarea> 
                    </td>
                </tr>
                
                <tr>
                	<td></td>
                    <td >
                        <input type="submit" name="lienhe" value="Liên Hệ" class="btndn" 
                        style="height:20px; width:100px; background:#CCC; color:#000"/>
                       <input type="submit" name="huy" value="Hủy Bỏ" class="btndn" 
                        style="height:20px; width:100px; background:#CCC; color:#000"/>
                    </td>
                </tr>
            </table> 
            </form>
       </div>
       </div>

