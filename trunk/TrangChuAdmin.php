<form action="TrangChuAdminXoa1.php" method="get">
<div>
    <div style="background-color:#99FF00">
       <table width="100%">
           <tr width="80%">
               <td align="left" width="60%">
                   Sự kiện-Hoạt động:
               </td>
               <td align="right" width="40%"><a href="Admin.php?obj=TrangChuAdminThemSKVHD"><u>Thêm Sự kiện-Hoạt động</u></a>
               </td>
           </tr>
    </table>
    </div>
    <div>
        <table width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse; margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
            <tr style="color:#F0F">
                 <td width="80%">
                    Tên sự kiện-hoạt động
                 </td>                
                 <td width="20%">
                    Xóa				
                </td>
            </tr>								
            <?php
            mysql_connect("localhost", "root", "") or die("Khong the ket noi toi database");
	mysql_select_db("banvexe") or die("Khong the chon database");
	mysql_query("SET NAMES 'UTF8'");
            $list=mysql_query("SELECT * FROM banvexe.hoatdongvasukien");	
            while($row=mysql_fetch_array($list))
            {
                //if($row[3]=="1")
                ?>
                    <tr>
                        <td width="80%"><?php
                         echo $row[0];?>
                         </td>
                         
                        <td>
                        <a href="TrangChuAdminXoa1.php?TenHDVSK=<?php echo $row[0] ?>">Xóa</a>									
                        </td>
                    </tr>
              <?php } ?>
        </table>
    </div>
</div>
</form>
<form action="TrangChuAdminXoa2.php" method="get">
<div>
    <div style="background-color:#99FF00">
       <table width="100%">
           <tr width="80%">
               <td align="left" width="60%">
                   Điểm du lịch nổi tiếng trên thế giới:
               </td>
               <td align="right" width="40%"><a href="Admin.php?obj=TrangChuAdminThemDiemDuLichNoiTiengTrenTheGioi"><u>Thêm Điểm du lịch nổi tiếng trên thế giới</u></a>
               </td>
           </tr>
    </table>
    </div>
    <div>
        <table width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse; margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
            <tr style="color:#F0F">
                 <td width="80%">
                    Tên điểm du lịch
                 </td>
                
                 <td width="10%">
                    Xóa				
                </td>
            </tr>								
            <?php
            mysql_connect("localhost", "root", "") or die("Khong the ket noi toi database");
	mysql_select_db("banvexe") or die("Khong the chon database");
	mysql_query("SET NAMES 'UTF8'");
            $list=mysql_query("SELECT * FROM banvexe.diemdulichnoitiengtrenthegioi");	
            while($row=mysql_fetch_array($list))
            {
                //if($row[3]=="1")
                ?>
                    <tr>
                        <td width="80%"><?php
                         echo $row[0];?>
                         </td>
                       
                        <td>
                        <a href="TrangChuAdminXoa2.php?TenDiemDuLich=<?php echo $row[0] ?>">Xóa</a>									
                        </td>
                    </tr>
             <?php } ?>   
        </table>
    </div>
</div>
</form>
<form action="TrangChuAdminXoa3.php" method="get">
<div>
    <div style="background-color:#99FF00">
       <table width="100%">
           <tr width="80%">
               <td align="left" width="60%">
                   Điểm du lịch nổi tiếng của Việt Nam:
               </td>
               <td align="right" width="40%"><a href="Admin.php?obj=TrangChuAdminThemSKVHD"><u>Thêm Điểm du lịch nổi tiếng của Việt Nam</u></a>
               </td>
           </tr>
    </table>
    </div>
    <div>
        <table width="100%" border="1px" cellpadding="1px" style="border-collapse:collapse; margin-bottom:150px; background-color:#e7e7e7" bordercolor="#000000">
            <tr style="color:#F0F">
                 <td width="80%">
                    Tên điểm du lịch
                 </td>
               
                 <td width="10%">
                    Xóa				
                </td>
            </tr>								
            <?php
            mysql_connect("localhost", "root", "") or die("Khong the ket noi toi database");
	mysql_select_db("banvexe") or die("Khong the chon database");
	mysql_query("SET NAMES 'UTF8'");
            $list=mysql_query("SELECT * FROM banvexe.diemdulichnoitiengcuavietnam");	
            while($row=mysql_fetch_array($list))
            {
                //if($row[3]=="1")
                ?>
                    <tr>
                        <td width="80%"><?php
                         echo $row[0];?>
                         </td>
                        
                        <td>
                       <a href="TrangChuAdminXoa3.php?TenDiemDuLich=<?php echo $row[0] ?>">Xóa</a>									
                        </td>
                    </tr>
          <?php }?>
        </table>
    </div>
</div>
</form>