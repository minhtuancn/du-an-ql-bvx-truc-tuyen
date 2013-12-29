
<?php
	/*Session_register("alert");*/
	
	class DatVe{
	
		//cac thuoc tinh
		var $id;
		var $tuyendi;
		var $ngaydi;
		var $cmnd;
		var $hoten;
		var $sodt;		
		var $diachi;
		var $gia;
		var $soluong;
		var $thanhtien;
		var $tendn;	
		
		//chuyen du lieu sang kieu doi tuong
		function ConversToObject($array){
			$dv = new DatVe();
			$dv->id = $array["MaVe"];
			$dv->tendn = $array["TenDangNhap"];			
			$dv->tuyendi = $array["MaChuyen"];
			$dv->hoten = $array["TenKhachHang"];
			$dv->ngaydi = $array["NgayDi"];
			$dv->sodt = $array["SoDienThoai"];
			$dv->diachi = $array["DiaChi"];
			$dv->cmnd = $array["CMND"];			
			$dv->gia = $array["GiaVe"];
			$dv->soluong = $array["SoVe"];
			$dv->thanhtien = $array["TongTien"];
			return $dv;
		}
		
		//lay tat ca ve xe trong co so du lieu
		static function GetAll(){
			$str = "select * from datve";
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
		
		//lay ve xe theo dien kien trong co so du lieu
		static function GetVeXe($mave,$machuyen,$ngay,$tendn){
			$str = "select * from datve where MaVe = '".$mave."' or MaChuyen = '".$machuyen."' or NgayDi = '".$ngay."' or TenDangNhap = '".$tendn."'";
			$kq = Query($str);
			$arr = array();			
			if($kq>0){
				$i=0;
				while($row=mysql_fetch_array($kq)){					
					$arr[$i] = self:: ConversToObject($row);
					$i++;
				}
			}
			return $arr;
		}	
		
		
		//them mot ve xe moi
		static function AddVeXe($tendn,$cd,$ht,$ngay,$sdt,$dc,$cmnd,$gia,$sl,$tien){
		$str = "INSERT INTO datve (TenDangNhap, MaChuyen, TenKhachHang, NgayDi, SoDienThoai, DiaChi, CMND, GiaVe, SoVe, TongTien) VALUES ('".$tendn."','".$cd."','".$ht."','".$ngay."','".$sdt."','".$dc."','".$cmnd."','".$gia."','".$sl."','".$tien."')";
			$kq = Query($str);
			return $kq;
		}
		
		//huy mot ve xe
		static function DeleteVeXe($cd){
			$str = "DELETE from datve WHere MaVe = '".$cd."'";
			$kq = Query($str);
			return $kq;
		}
		
		//sua mot ve xe
		static function UpdateVeXe($mv,$ht,$ngay,$sdt,$dc,$cmnd,$gia,$sl,$tien){
			$str = "UPDATE datve set TenKhachHang = '".$ht."', NgayDi = '".$ngay."', SoDienThoai = '".$sdt."', DiaChi = '".$dc."', CMND = '".$cmnd. "', GiaVe = '".$gia."', SoVe = '".$sl."', TongTien = '".$tien."' where MaVe = '".$mv."'";
			$kq = Query($str);
			return $kq;
		}

//--------------------------------------view dat ve--------------------------------------------------
static function View_DatVe(){
	echo '
				<table width="80%">
				<tr>
					<td class="gioithieu1"><img src="images/globe-icon.png" height="12px" />Đặt Vé</td>
				</tr>
				<tr>
					<td><h3>Hãy điền đầy đủ mọi thông tin nha bạn!(*)</h3></td>
				</tr>
				</table>
				<table width="580px">            
					 <tr>
						 <td align="right">Mã Chuyến đi </td>
						 <td><select name="matuyen" id="tt" onChange="LayGiaVe(this.value)"> 	
							 	<option value="" id="0">---Chọn Tuyến Đi---</option>';																
								$list="select MaChuyen,GiaVe from chuyendi";
								$kq=Query($list);															
								 while($row=mysql_fetch_array($kq)) {								 
								echo '<option value="'.$row[0].'" id="'.$row[1].'" >'.$row[0].'							</option>';
							  	}
							echo '</select>								
						 </td> 
					 </tr>					  
					 <tr>
						 <td align="right">Họ tên </td>
						 <td><input type="text" name="tenkh" /> </td>  
					
					 </tr>
					 <tr>
						 <td align="right">Ngày đi </td>
						 <td><input type="date" name="ngay" /> </td>
					 </tr>					 
					 <tr>	 
						<td align="right">Số điện thoại</td>
						<td><input type="text" name="sodt" /></td> 
					 </tr>					 
					  <tr>
						 <td align="right">Địa chỉ  </td>
						 <td><input type="text" name="diachi" /> </td>
					 </tr>
					 <tr>
					    <td align="right">CMND</td>
						<td><input type="text" name="cmnd" /></td> 
					 </tr>
					<tr>			
					 <tr>
						 <td align="right">Gía vé </td>
						 <td><input id="txt1" type="text" name="giave"  readonly="false"/> </td>
					 </tr>
					 <tr>
						 <td align="right">Số lượng vé  </td>
						 <td><input value="1" id="txt2" type="text" name="soluong" onChange="TinhTien(this.value)" /></td>
					</tr>
					 <tr>
						 <td align="right">Tổng tiền</td>	 
						 <td><input id="txt3" type="text" name="thanhtien"  readonly="false"/>
						 </td>				
					 <tr>
						<td colspan="2"><input type="submit" name="datve" value="Đồng ý"  style="margin-left:205px;" class="button_xacnhan"/></td>
					 </tr>
				 </table>';			
}

//--------------------------------------view huy ve--------------------------------------------------
	static function View_Huy(){
		echo '<table width="100%">
					<tr>
						<td class="gioithieu1">
							<img src="images/globe-icon.png" height="12px" />
							Vé của bạn
						</td>
					</tr>
					<tr>
						<td>						
							<h3>Bảng danh sách thông tin đặt vé:</h3>
						</td>
					</tr>
			</table>';
		$tendn=$_SESSION['tennguoidung'];	
		$arr = DatVe::GetVeXe("","","",$tendn);	
		for($i=0;$i<count($arr);$i++)						
		{	
		echo '<p align="center">';
			$ve=$i+1;
			echo 'Vé số: '.$ve.'
			<form action="index.php?obj=VeCuaBan" method="get">
			<table width="100%" align="center" style="color:#3A3AFF">
			<tr>
				<td  align="right">Mã vé:</td>
				<td><input type="text" name="id" value="'.$arr[$i]->id.'" readonly="false">	</td>			
			</tr>
			<tr>
				<td  align="right">Mã chuyến:</td>
				<td><input type="text" name="tuyen" value="'.$arr[$i]->tuyendi.'" readonly="false"></td>			
			</tr>	
			<tr>
				<td align="right">Họ tên:</td>
				<td><input type="text" name="tenkh" value="'.$arr[$i]->hoten.'" readonly="false"></td>			
			</tr>			
			<tr>
				<td align="right">Ngày đi:</td>
				<td><input type="text" name="ngaydi" value="'.$arr[$i]->ngaydi.'" readonly="false"></td>			
			</tr>
			<tr>
				<td align="right">Số điện thoại:</td>
				<td><input type="text" name="sodt" value="'.$arr[$i]->sodt.'" readonly="false"></td>			
			<tr>
				<td align="right">Địa chị:</td>
				<td><input type="text" name="diachi" value="'.$arr[$i]->diachi.'" readonly="false"></td>			
			</tr>
				<tr>
				<td align="right">CMND</td>
				<td><input type="text" name="cmnd" value="'.$arr[$i]->cmnd.'" readonly="false"></td>			
			</tr>	
				<tr>
				<td align="right">Gía vé</td>
				<td><input type="text" name="giave" value="'.$arr[$i]->gia.'" readonly="false"></td>			
			</tr>
				<tr>
				<td align="right">Số vé</td>
				<td>
				<input type="text" name="soluong" value="'.$arr[$i]->soluong.'" readonly="false">
				</td>			
			</tr>
				<td align="right">Tổng tiền:</td>
				<td><input type="text" name="thanhtien" value="'.$arr[$i]->thanhtien.'" readonly="false"></td>			
			</tr>			
			<tr>
				<td colspan="2"><input type="submit" name="Huy" value="Hủy Vé"  style="margin-left:150px;" class="button_xacnhan"/><input type="submit" name="Doi" value="Đổi chuyến"  style="margin-left:150px;" class="button_xacnhan"/></td>			
			</tr>
			</table>
			</form>
			<p align="center">------------------oOo-------------------';			
		}
	}

//--------------------------------------view doi ve--------------------------------------------------
	static function View_DoiVe(){
		echo '
					<table width="100%">
					<tr>
						<td class="gioithieu1"><img src="images/globe-icon.png" height="12px" />Đổi Chuyến</td>
					</tr>
					<tr>
						<td><h3>Hãy điền đầy đủ mọi thông tin nha bạn!(*)</h3></td>
					</tr>
					</table>
					<table width="580px">     
						<tr>
							<td align="right">Mã vé</td>
							<td><input type="text" name="id" value="'.$_GET['id'].'" readonly="false"></td>			
						</tr>							
						<tr>
							<td align="right">Mã chuyến</td>
							<td><input type="text" name="matuyen" value="'.$_GET['tuyen'].'" readonly="false">
						</tr>					      
						  
						 </tr>					  
						 <tr>
						 <td align="right">Họ tên </td>
						 <td><input type="text" name="tenkh" value="'.$_GET['tenkh'].'"/> </td>   
					 </tr>
					 <tr>
						 <td align="right">Ngày đi </td>
						 <td><input type="date" name="ngay" value="'.$_GET['ngaydi'].'"/> </td>
					 </tr>					 
					 <tr>	 
						<td align="right">Số điện thoại</td>
						<td><input type="text" name="sodt" value="'.$_GET['sodt'].'"/></td>
					 </tr>					 
					  <tr>
						 <td align="right">Địa chỉ </td>
						 <td><input type="text" name="diachi" value="'.$_GET['diachi'].'"/> </td>
					 </tr>
					 <tr>
					    <td align="right">CMND</td>
						<td><input type="text" name="cmnd" value="'.$_GET['cmnd'].'"/></td>
					 </tr>
					<tr>			
					 <tr>
						 <td align="right">Gía vé </td>
						 <td><input id="txt1" readonly="false" type="text" name="giave" value="'.$_GET['giave'].'"/> </td>
					 </tr>
					 <tr>
						 <td align="right">Số lượng vé </td>
						 <td><input id="txt2" type="text" name="soluong"  value="'.$_GET['soluong'].'" onChange="TinhTien(this.value)" /></td>
					</tr>
					 <tr>
						 <td align="right">Tổng tiền </td>	 
						 <td><input id="txt3" readonly="false" type="text" name="thanhtien" value="'.$_GET['thanhtien'].'"/> </td>				
					 <tr>
						<td colspan="2"><input type="submit" name="doive" value="Đồng ý"  style="margin-left:205px;" class="button_xacnhan"/></td>
					 </tr>
					 </table>';
	}	
	
	static function XuLyGia(){
		echo "<script>
			var t1=document.getElementById('txt1');
			var t2=document.getElementById('txt2');
			var t3=document.getElementById('txt3');	
			function LayGiaVe()
			{	
				var x=document.getElementById('tt').selectedIndex+2;	
				t1.value= document.getElementsByTagName('option')[x].id;
				t2.value=1;	
				t3.value=t1.value*t2.value;	
			}
			function LayGiaVe2()
			{	
				var x=document.getElementById('ht').selectedIndex+2;	
				t1.value= document.getElementsByTagName('option')[x].id;
				t2.value=1;	
				t3.value=t1.value*t2.value;	
			}
			function TinhTien(value)
			{	
				value=t2.value;
				if(value>0)
					t3.value=t1.value*value;	
				else
					{
						t2.value=1;
						alert('Bạn phải nhập giá trị số  và giá tri nhập phải lớn hơn 0');						
					}				
			}
			
			</script>";
	
	}
} 

datve::XuLyGia();

?>


