<form action="index.php?obj=trangchu" method="get">
	<table width="100%">
	<tr width="100%" height="10%">
          <td colspan="2" align="left" bgcolor="#6F56C6"><b><u>Tìm kiếm tuyến đi</u></b></td>
     </tr>
		<tr>
			<td>
				Tuyến đi:
			</td>
			<td><select name="td" class="textbox" style="width: 198px;">
                    <?php
				
					$timkiem = "select Ten from tuyendi";	
					$kq=Query($timkiem);
						while($row = mysql_fetch_array($kq))
						{				
					?>
                    <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                    <?php
						}
					?>
            </select>				
			</td>			
		</tr>
		
		<tr>
			<td>&nbsp;
				
			</td>
			<td>					
				<input type="submit" name="timkiem" value="Tìm Kiếm" style="margin-left:150px;" class="button_xacnhan"/>			
			</td>			
		</tr>
	</table>
</form>


<?php
if(isset($_GET["timkiem"]))
				{
					echo '<h4 style="color:#7f86b0">Kết quả tìm kiếm:</h4>
						<table width="100%" border="1px" cellpadding="1px"                       																		                         style="border-collapse:collapse; margin-bottom:10px;                         background-color:#e7e7e7" bordercolor="#000000">
					 <tr height="7%" style="color:#087a41">
						 <td width="15%">Mã chuyến</td>
						 <td width="25%">Tên tuyến </td>
						 <td width="15%">Thời gian đi</td>
						 <td width="20%">Loại xe</td>
						 <td width="10%">Số ghế</td>						 
						 <td width="13%">Giá vé</td>
					</tr>';						
					$timkiem="select * from chuyendi where TenTuyen = '".$_GET['td']."'";
					$kq=Query($timkiem);					
								
					while($row=mysql_fetch_array($kq))
					{
					
							?><tr><?php
								 for($i=0;$i<6;$i++)					
									{?>
									 <td>
									<a href="#"></a><?php			  
									echo $row[$i]; ?>
									</td>
									<?php					
									 }
							}		
							?>
							 </tr>
							</table>
							<?php
					
				}
?>
<form>
<table width="100%" height="200px">
     <tr width="100%" height="10%">
          <td colspan="2" align="left" bgcolor="6F56C6"><b><u>Sự kiện-Hoạt động</u></b></td>
     </tr>
     <tr width="100%" height="90%">
          <td width="40%"><img src="images/img_trang chu/Sự kiện.jpg" />
          </td>
          <td width="60%">
              <div><a href="index.php?obj=sukienmienphixetrungchuyen">MIỄN PHÍ XE TRUNG CHUYỂN ĐẾN CÁC BỆNH VIỆN NỘI THÀNH HCM</a></div>
              <div><br /></div>
              <div>Nhằm tạo thuận tiện cho khách hàng khu vực Miền Tây đi HCM khám chữa bệnh, Công ty Phương Trang đã tổ chức và triển khai đội xe trung chuyển chở miễn phí đến 13 bệnh viện trong TP HCM, áp dụng chính thức từ ngày 15/06/2013.
              </div>
              <div align="right">
              <a href="index.php?obj=sukienmienphixetrungchuyen"><h6><u>Xem tiếp</u></h6></a>
              </div>
          </td>
     </tr>
</table>
</form>
<form>
<table width="100%" height="200px">
     <tr width="100%" height="10%">
          <td colspan="2" align="left" bgcolor="6F56C6"><b><u>Điểm du lịch nổi tiếng trên thế giới</u></b>
          </td>
     </tr>
     <tr width="100%" height="90%">
          <td width="40%"><img src="images/img_trang chu/madridsk.jpg" />
          </td>
          <td width="60%">
              <div><a href="index.php?obj=sukienmadrid">Madrid-Sức lôi cuốn mạnh mẽ</a></div>
              <div><br /></div>
              <div>Nhắc tới thành phố Madrid – thủ đô của Vương quốc Tây Ban Nha, điều đầu tiên và đơn giản nhất người ta hay nghĩ tới là bóng đá – với “dải ngân hà” Real Madrid cùng “thánh địa” Bernabéu.
              </div>
              <div align="right">
              <a href="index.php?obj=sukienmadrid"><h6><u>Xem tiếp</u></h6></a>
              </div>
          </td>
     </tr>
</table>
</form>
<form>
<table width="100%" height="200px">
     <tr width="100%" height="10%">
          <td colspan="2" align="left" bgcolor="6F56C6"><b><u>Điểm du lịch nổi tiếng của Việt Nam</u></b>
          </td>
     </tr>
     <tr width="100%" height="90%">
          <td width="40%"><img src="images/img_trang chu/NhaTrangsk.jpg" />
          </td>
          <td width="60%">
              <div><a href="index.php?obj=sukiennhatrang">Nha Trang</a></div>
              <div><br /></div>
              <div>Nha Trang là thành phố nghỉ mát ven biển nổi tiếng nhất của Việt Nam nằm dọc theo bờ vịnh đẹp thứ hai trong cả nước. Nha Trang sở hữu những bãi biển tuyệt đẹp với cát mịn và nước biển xanh trong với nhiệt độ ấm.
              </div>
              <div align="right">
              <a href="index.php?obj=sukiennhatrang"><h6><u>Xem tiếp</u></h6></a>
              </div>
          </td>
     </tr>
</table>
</form>