<?php
class SuKien{
	var $id;
	var $ten;
	var $noidung;
	function ConversToObject($array){
		$sk = new SuKien();
		$sk->id = $array["ID"];
		$sk->id = $array["Ten"];
		$sk->id = $array["NoiDung"];
		return $sk;
	}
	static function GetAll(){
			$str = "select * from sukien";
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
	static function Xoa($id){
		$str = "DELETE from sukien WHere ID = '".$id."'";
			$kq = Query($str);
			return $kq;
	}
	
	static function ThemSuKien($id,$ten,$lienket){
		$str = "INSERT INTO sukien (ID, Ten, NoiDung) VALUES ('".$id."','".$ten."','".$lienket."')";
			$kq = Query($str);
			return $kq;
	}
		
	static function ViewTinTuc(){		 
		$str='select * from sukien where ID like "TinTuc%"';
		$kq=Query($str);
		echo '<form action="Admin.php?obj=sukien" method="get">	
	<table width="90%" border="1px" cellpadding="1px" style="border-collapse:collapse;          		     margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000" align="center">
		 <tr style="color:#087a41">
			 <td width="10%">ID</td>
			 <td width="35%">Tên tiêu đề</td>			
			 <td width="50%">Liên kết web</td>		 
			 <td><a href="Admin.php?obj=sukien&act=themtintuc">Thêm</a></td>
		</tr>';
		while($row=mysql_fetch_array($kq)){				
		echo '<tr>
			<td>'.$row[0].'</td>
			<td>'.$row[1].'</td>
			<td>'.$row[2].'</td>
			<td>							
				<a href="Admin.php?obj=sukien&act=xoa&id='.$row[0].'">Xóa</a>													
			</td>
		</tr>';		
			}				
 	
	echo '</table>
	</form>';
	}
	static function ViewLienKet(){		 
		$str='select * from sukien where ID like "LienKet%"';
		$kq=Query($str);
		echo '<form action="Admin.php?obj=sukien" method="get">	
	<table width="90%" border="1px" cellpadding="1px" style="border-collapse:collapse;          		     margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000" align="center">
		 <tr style="color:#087a41">
			 <td width="10%">ID</td>
			 <td width="35%">Tên tiêu đề</td>			
			 <td width="50%">Trang liên kết</td>		 
			 <td><a href="Admin.php?obj=sukien&act=themlienket">Thêm</a></td>
		</tr>';
		while($row=mysql_fetch_array($kq)){				
		echo '<tr>
			<td>'.$row[0].'</td>
			<td>'.$row[1].'</td>
			<td>'.$row[2].'</td>
			<td>							
				<a href="Admin.php?obj=sukien&act=xoa&id='.$row[0].'">Xóa</a>															
			</td>
		</tr>';		
			}				
 	
	echo '</table>
	</form>';
	}
	
	static function ViewThem(){			
		echo '
	<table align="center">
		<tr>
			 <td>ID</td>
			 <td><input type="text" name="id"></td>
		 </tr>
		 <tr>
		 	<td>Tên tiêu đề</td>
			<td><input type="text" name="ten"></td>	
		 </tr>
		<tr> 		
			 <td>Trang liên kết</td>
			 <td><input type="text" name="lienket"></td>
		</tr>
		<tr>  
			 <td colspan="2"><input type="submit" name="them" value="Thêm" style="margin-left:150px;" class="button_xacnhan"></td> 			 
		</tr>
		</table>';
	}
	
	static function GetTinTuc(){
		 
		$str='select Ten,NoiDung from sukien where ID like "TinTuc%"';
		$kq=Query($str);
		echo '<marquee height="100px" style="margin-top:0px;" scrollamount="3" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
		<div class="tintuc">
			<ul>';		
			while($row = mysql_fetch_array($kq))
			{	
				echo '<li><img src="images/bulletarrow.gif"><a href="'.$row[1].'">'.$row[0].'</a></li><hr style="width:193px; margin-right:2px;"></hr>';
			}
		echo '</ul>
		</div>
		</marquee>';
	}
	
	static function GetLienKet(){		
		$str='select Ten,NoiDung from sukien where ID like "LienKet%"';
		$kq=Query($str);
		echo '<form>
        	<select name="trang" onChange="window.open(this.value,"_blank")" class="textbox" style="width: 198px;">';                    
					while($row = mysql_fetch_array($kq))
						{				
					
                    echo '<option value='.$row[1].'>'.$row[0].'</option>';
                    
						}
					
           echo '</select>
        </form>';
	}
	
	static function ViewTD(){		 
		$str='select * from sukien where ID like "TuyenDung%"';
		$kq=Query($str);
		while($row=mysql_fetch_array($kq)){				
		echo '</br><table width="400px">
		
		<tr>
			<td>'.$row[1].'</td>
		</tr>
		<tr>
			<td>'.$row[2].'</td>		
		</tr>
		</table>';	
		}
		echo '	<br/><br/><br/>Hồ sơ xin việc gửi về địa chỉ:<br/>
						---------<br/>
						Địa chỉ: 01 Phù Đổng Thiên Vương, TP Đà Lạt, Lâm Đồng<br/>
						Tel: (012) 345 6789 - 012 345 987<br/>
						Email: vexe24h@gmail.com<br/>
						©2013 Vexe24h<br/>';
	}			

static function ViewTuyenDung(){		 
		$str='select * from sukien where ID like "TuyenDung%"';
		$kq=Query($str);
		echo '<form action="Admin.php?obj=sukien" method="get">	
	<table width="90%" border="1px" cellpadding="1px" style="border-collapse:collapse; margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000" align="center">
		 <tr style="color:#087a41">
			 <td width="10%">ID</td>
			 <td width="35%">Tên tiêu đề</td>			
			 <td width="50%">Nội dung</td>		 
			 <td><a href="Admin.php?obj=sukien&act=ThemNoiDung">Thêm</a></td>
		</tr>';
		while($row=mysql_fetch_array($kq)){				
		echo '<tr>
			<td>'.$row[0].'</td>
			<td>'.$row[1].'</td>
			<td>'.$row[2].'</td>
			<td>							
				<a href="Admin.php?obj=sukien&act=xoa&id='.$row[0].'">Xóa</a>															
			</td>
		</tr>';		
			}		echo '</table>
	</form>';
	}

//Them Tuyen dung
	static function ViewThemTD(){			
		echo '
	<table align="center">
		<tr>
			 <td>ID</td>
			 <td><input type="text" name="id"></td>
		 </tr>
		 <tr>
		 	<td>Tên tiêu đề</td>
			<td><input type="text" name="ten"></td>	
		 </tr>
		<tr> 		
			 <td>Thêm tuyển dụng</td>
			 <td><textarea name = "lienket" cols=" 40" rows = "20"></textarea></td>
		</tr>
		<tr> 		
			 <td colspan="2"><input type="submit" name="them" value="Thêm" style="margin-left:150px;" class="button_xacnhan"></td> 			 
		</tr>
		</table>';
	}
	
	static function ViewHoTroTrucTuyen(){
		echo '
        	<ul>
            	<li><img style="float:left;" src="images/hotline.jpg"><h5>(012) 3456 789</h5></li>
                <li><img style="float:left;" src="images/hotline.jpg"><h5>(012) 3456 789</h5></li>
            </ul>
            <table width="208px">
            	<tbody><tr>
                	<td colspan="2">
                    <a href="ymsgr:sendIM?lucthanhloan"><img width="90px" src="http://opi.yahoo.com/online?u=lucthanhloan&amp;m=g&amp;t=2" alt="Gửi tin nhắn cho Ms. Loan"></a>
                    
						
                        <h5 style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#666; text-align:center;">Ms. Loan</h5>
                    </td>
                    <td colspan="2">
                    <a href="ymsgr:sendIM?quang"><img width="90px" src="http://opi.yahoo.com/online?u=quang&amp;m=g&amp;t=2" alt="Gửi tin nhắn cho Mr. Quang"></a>
                    
						
                        <h5 style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#666; text-align:center;">Mr. Quang</h5>
                    </td>
                </tr>
                
                <tr>
                	<td colspan="2">
                    <a href="ymsgr:sendIM?hoamauxanh_thanhhuyen"><img width="90px" src="http://opi.yahoo.com/online?u=huyen&amp;m=g&amp;t=2" alt="Gửi tin nhắn cho Ms. Huyền"></a>
                    
						
                        <h5 style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#666; text-align:center;">Ms. Huyền</h5>
                    </td>
                    <td colspan="2">
                    <a href="ymsgr:sendIM?nguyenthanh_ntn_34"><img width="90px" src="http://opi.yahoo.com/online?u=dung&amp;m=g&amp;t=2" alt="Gửi tin nhắn cho Mr. Thanh"></a>
                    
						
                        <h5 style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#666; text-align:center;">Mr. Thành</h5>
                    </td>
                </tr>
            </tbody></table>';
	}
	
	static function ViewHuongDanDatVe(){
		echo '<table>
			<tr>
				<td class="gioithieu1">
					<img src="images/globe-icon.png" height="12px" />
					Hướng dẫn đặt vé
				</td>
			</tr>
			</table>
			<h4>Để đặt vé có hiệu quả các bạn hãy làm theo hướng dẫn sau đây nhé:</h4>   
		<table align="center" width="560px" style="width:100%; font-size:16px">
			Bước 1: Click vào phần <b>Đặt vé</b> để website mở ra giao diện đặt vé cho bạn.<br><br>
			<img src="images/Hướng dẫn đặt vé/B1.png" width="500px"/><br><br><br>
			Bước 2 : Chọn Tuyến đi:<br><br><br>      
			<img src="images/Hướng dẫn đặt vé/B2.png" width="500px" /><br><br><br>
			Bước 3 : Điền thông tin đầy đủ và bấm <b>Đồng ý</b><br><br><br>         
			<img src="images/Hướng dẫn đặt vé/B3.png"  width="500px"/><br>
			Bước 4 : Sau khi bấm đồng ý sẽ quay về lúc chưa điền thông tin và có dòng thông báo "Chúng tôi đã lưu vé của bạn vào cơ sở dữ liệu". Vậy là bạn đã đặt vé thành công.
			<img src="images/Hướng dẫn đặt vé/B4.png"  width="500px"/><br>
			<h4>Mọi thắc xin liên hệ với bộ phận chăm sóc khách hàng của công ty với số điện thoại </h4><b style="color:#00F">0933967608</b>.<br>
			<h5>Trân trọng.</h5>
			</table>';
		}
		
		static function ViewHuongDanThanhToan(){
			echo '
	 		<table>
			<tr>
				<td class="gioithieu1">
					<img src="images/globe-icon.png" height="12px" />
					Hướng dẫn thanh toán
				</td>
			</tr>
			</table>		
		 <div style="font-size:16px">
			Có 2 hình thức thanh toán, bạn có thể chọn 1 trong 2 hình thức thanh toán sau đây:<br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hình thức thanh toán thứ nhất: Bạn hãy đến địa chỉ của công ty để thanh toán trực tiếp <b style="color:#00F">01 Phù Đổng Thiên Vương, TP Đà Lạt, Lâm Đồng</b>.<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hình thức thanh toán thứ hai: Bạn hãy chuyển tiền vào số tài khoản ngân hàng của công ty <b style="color:#00F">3803 205 208 799</b>.<br>
			Mọi thắc xin liên hệ với bộ phận chăm sóc khách hàng của công ty với số điện thoại <b style="color:#00F">01648519404</b>.<br>
			Trân trọng.
		  </div>';
	}
}
	
				
if(isset($_GET["act"]) && $_GET["act"]=='xoa'){		
		SuKien::Xoa($_GET["id"]);
		header('location : Admin.php?obj=sukien');
}
	
						
?>
