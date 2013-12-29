<?php
class TuyenDi{
	
		//cac thuoc tinh
		var $Ten;
		var $DiemDi;
		var $DiemDen;
		var $SoLuong;
	
		
		//chuyen du lieu sang kieu doi tuong
		function ConversToObject($array){
			$td = new TuyenDi();
			$td->Ten = $array["Ten"];
			$td->DiemDi = $array["DiemDi"];			
			$td->DiemDen = $array["DiemDen"];
			$td->SoLuong = $array["SoLuongXe"];
			return $td;
		}
		
		//lay tat ca tuyen di trong co so du lieu
		static function GetAll(){
			$str = "select * from tuyendi";
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
		
		//lay tuyen di theo ten
		static function GetTuyenDi($ten){
			$str = "select * from tuyendi where Ten='".$ten."'";
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
		//them tuyen di
		static function ThemTuyenDi($id,$diemdi,$diemden,$soluong){
			$str = "INSERT INTO tuyendi (Ten, DiemDi, DiemDen, SoLuongXe) VALUES ('".$id."','".$diemdi."','".$diemden."','".$soluong."')";
			$kq = Query($str);
			return $kq;
		}
		//Xoa
		static function Xoa($id){
			$str = "DELETE from tuyendi WHere Ten = '".$id."'";
			$kq = Query($str);
			return $kq;
		}
	
		//hien thi tuyen di
		static function View_TuyenDi(){
		echo '<table width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse;          		     margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
		 <tr style="color:#087a41">
			 <td width="25%">Tên Tuyến</td>
			 <td width="20%">Điểm Đi</td>			
			 <td width="20%">Điểm Đến</td>
			 <td width="35%">Số Lượng Chuyến Trong 1 Ngày</td>	
		</tr>';		
			$row=TuyenDi::GetTuyenDi($_GET["ten"]);	
			for($i=0;$i<count($row);$i++)						
			{
			echo '<tr>
					<td>
						'.$row[$i]->Ten.'
					</td>
					<td>
						'.$row[$i]->DiemDen.'
					</td>
					<td>
						'.$row[$i]->DiemDi.'						
					</td>
					<td>
						'.$row[$i]->SoLuong.'
					</td>
				</tr>';		
			}	 	
	echo '</table>
	</form>';
		}
		
		//hien thi tuyen di trong Admin
		static function ViewTuyenDiAdmin(){
		echo '<table align="center" width="80%" border="1px" cellpadding="1px" style="border-collapse:collapse; margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
		 <tr style="color:#087a41">
			 <td width="25%">Tên Tuyến</td>
			 <td width="20%">Điểm Đi</td>			
			 <td width="20%">Điểm Đến</td>
			 <td width="25%">Số Lượng Chuyến Trong 1 Ngày</td>	
			 <td><a href="Admin.php?obj=tuyendi&act=themtuyendi">Thêm</a></td>
		</tr>';		
			$row=TuyenDi::GetAll();
			for($i=0;$i<count($row);$i++)						
			{
			echo '<tr>
					<td>
						'.$row[$i]->Ten.'
					</td>
					<td>
						'.$row[$i]->DiemDen.'
					</td>
					<td>
						'.$row[$i]->DiemDi.'						
					</td>
					<td>
						'.$row[$i]->SoLuong.'
					</td>
					<td>							
					<a href="Admin.php?obj=tuyendi&act=xoa&id='.$row[$i]->Ten.'">Xóa</a>													
					</td>
				</tr>';		
			}	 	
	echo '</table>
	</form>';
		}
		
		//ham them tuyen trong admin
		static function ViewThemTuyenDi(){			
		echo '
	<table align="center">
		<tr>
			 <td>Tên tuyến</td>
			 <td><input type="text" name="id"></td>
		 </tr>
		 <tr>
		 	<td>Điểm đi</td>
			<td><input type="text" name="diemdi"></td>	
		 </tr>
		<tr> 		
			 <td>Điểm đến</td>
			 <td><input type="text" name="diemden"></td>	
		</tr>
		<tr> 		
			 <td>Số lượng chuyến trong ngày </td>
			 <td><input type="text" name="soluong"></td>	
		</tr>
		<tr> 	
			 <td colspan="2"><input type="submit" name="them" value="Thêm" style="margin-left:150px;" class="button_xacnhan"></td> 			 
		</tr>
		</table>';
	}
}

if(isset($_GET["act"]) && $_GET["act"]=='xoa'){		
		TuyenDi::Xoa($_GET["id"]);
		header('location : Admin.php?obj=tuyendi');
}
?>