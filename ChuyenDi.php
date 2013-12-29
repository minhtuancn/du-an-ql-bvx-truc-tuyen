<?php
class ChuyenDi{
	
		//cac thuộc tính
		var $MaChuyen;
		var $TenTuyen;
		var $GioDi;
		var $LoaiXe;
		var $SoGhe;
		var $GiaVe;
	
		
		//chuyen du lieu sang kieu doi tuong
		function ConversToObject($array){
			$td = new TuyenDi();
			$td->MaChuyen = $array["MaChuyen"];
			$td->TenTuyen = $array["TenTuyen"];			
			$td->GioDi = $array["GioDi"];
			$td->LoaiXe = $array["LoaiXe"];
			$td->SoGhe = $array["SoGhe"];
			$td->GiaVe = $array["GiaVe"];
			return $td;
		}
		
		//lay tat ca Chuyen di trong co so du lieu
		static function GetAll(){
			$str = "select * from chuyendi";
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
		static function GetChuyenDi($ten){
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
		
		static function ThemChuyenDi($id,$ten,$giodi,$loaixe,$soghe,$giave){
			$str = "INSERT INTO chuyendi (MaChuyen, TenTuyen, GioDi, LoaiXe, SoGhe, GiaVe) VALUES ('".$id."','".$ten."','".$giodi."','".$loaixe."','".$soghe."','".$giave."')";
			$kq = Query($str);
			return $kq;
		}
		
		static function Xoa($id){
			$str = "DELETE from chuyendi WHere MaChuyen = '".$id."'";
			$kq = Query($str);
			return $kq;
		}
		
		static function UpdateChuyenDi($id,$tentuyen,$giodi,$loaixe,$soghe,$giave){
			$str = "UPDATE chuyendi set TenTuyen = '".$tentuyen."', GioDi = '".$giodi."', LoaiXe = '".$loaixe."', SoGhe = '".$soghe. "', GiaVe = '".$giave."' where MaChuyen = '".$id."'";
			$kq = Query($str);
			return $kq;
		}
		
		//hien thi tuyen di
		static function View_ChuyenDi(){
		echo '<table width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse;          		     margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
		 <tr style="color:#087a41">
			 <td width="20%">Mã Chuyến</td>
			 <td width="20%">Tên Chuyến</td>			
			 <td width="15%">Giờ Đi</td>
			 <td width="20%">Loại Xe</td>	
			  <td width="10%">Số Ghế</td>
			 <td width="15%">Gía Vé</td>	
		</tr>';		
			$row=ChuyenDi::GetAll();	
			for($i=0;$i<count($row);$i++)						
			{
			echo '<tr>
					<td>
						'.$row[$i]->MaChuyen.'
					</td>
					<td>
						'.$row[$i]->TenTuyen.'
					</td>
					<td>
						'.$row[$i]->GioDi.'						
					</td>
					<td>
						'.$row[$i]->LoaiXe.'
					</td>						
					<td>
						'.$row[$i]->SoGhe.'						
					</td>
					<td>
						'.$row[$i]->GiaVe.'
					</td>';
			}	 	
	echo '</table>
	</form>';
		}
		
		//hien thi tuyen di trong Admin
		static function ViewChuyenDiAdmin(){
		echo '<table align="center" width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse; margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
		 <tr style="color:#087a41">
		     <td width="15%">Mã Chuyến</td>
			 <td width="15%">Tên Tuyến</td>
			 <td width="15%">Giờ Đi</td>			
			 <td width="15%">Loại Xe</td>
			 <td width="10%">Số Ghế</td>	
			 <td width="15%">Gía Vé</td>
			 <td><a href="Admin.php?obj=chuyendi&act=themchuyendi">Thêm</a></td>
		</tr>';		
			$row=ChuyenDi::GetAll();
			for($i=0;$i<count($row);$i++)						
			{
			echo '<tr>
					<td>
						'.$row[$i]->MaChuyen.'
					</td>
					<td>
						'.$row[$i]->TenTuyen.'
					</td>
					<td>
						'.$row[$i]->GioDi.'						
					</td>
					<td>
						'.$row[$i]->LoaiXe.'
					</td>						
					<td>
						'.$row[$i]->SoGhe.'						
					</td>
					<td>
						'.$row[$i]->GiaVe.'
					</td>
					<td>							
					<a href="Admin.php?obj=chuyendi&act=xoa&id='.$row[$i]->MaChuyen.'">Xóa</a>&nbsp;
					<a href="Admin.php?obj=chuyendi&act=sua&id='.$row[$i]->MaChuyen.'&tentuyen='.$row[$i]->TenTuyen.'&giodi='.$row[$i]->GioDi.'&loaixe='.$row[$i]->LoaiXe.'&soghe='.$row[$i]->SoGhe.'&giave='.$row[$i]->GiaVe.'">Cập Nhật</a>													
					</td>
				</tr>';		
			}	 	
	echo '</table>
	</form>';
		}
		
		//ham them tuyen trong admin
		static function ViewThemChuyenDi(){			
		echo '
	<table align="center">
		<tr>
			 <td>Mã chuyến</td>
			 <td><input type="text" name="id"></td>
		</tr>
		<tr>
			 <td>Tên tuyến</td>
			 <td><input type="text" name="tentuyen"></td>
		 </tr>
		 <tr>
		 	<td>Giờ đi</td>
			<td><input type="text" name="giodi"></td>	
		 </tr>
		<tr> 		
			 <td>Loại xe</td>
			 <td><input type="text" name="loaixe"></td>	
		</tr>
		<tr> 		
			 <td>Số ghế</td>
			 <td><input type="text" name="soghe"></td>	
		</tr>
		<tr> 		
			 <td>Gía</td>
			 <td><input type="text" name="gia"></td>	
		</tr>
		<tr> 
			 <td colspan="2"><input type="submit" name="them" value="Thêm" style="margin-left:150px;" class="button_xacnhan"></td> 			 
		</tr>
		</table>';
		}
		
		static function ViewSuaChuyenDi(){
		echo '
					<table align="center">     
						<tr>
							<td align="right">Mã chuyến</td>
							<td><input type="text" name="id" value="'.$_GET['id'].'" readonly="false"></td>			
						</tr>					      										  
						 <tr>
						 <td align="right">Tên tuyến</td>
						 <td><input type="text" name="tentuyen" value="'.$_GET['tentuyen'].'" readonly="false"/> </td>   
					 </tr>
					 <tr>
						 <td align="right">Giờ đi</td>
						 <td><input type="text" name="giodi" value="'.$_GET['giodi'].'"/> </td>
					 </tr>					 
					 <tr>	 
						<td align="right">Loại xe</td>
						<td><input type="text" name="loaixe" value="'.$_GET['loaixe'].'"/></td>
					 </tr>					 
					  <tr>
						 <td align="right">Số ghế </td>
						 <td><input type="text" name="soghe" value="'.$_GET['soghe'].'"/> </td>
					 </tr>
					 <tr>
					    <td align="right">Gía vé</td>
						<td><input type="text" name="giave" value="'.$_GET['giave'].'"/></td>
					 </tr>
					<tr>
					 <tr>
						<td colspan="2" align="center"><input type="submit" name="doichuyen" value="Đồng ý" /></td>
					 </tr>
					 </table>';
	}	
		
}
if(isset($_GET["act"]) && $_GET["act"]=='xoa'){		
		ChuyenDi::Xoa($_GET["id"]);
		header('location : Admin.php?obj=chuyendi');
}
?>