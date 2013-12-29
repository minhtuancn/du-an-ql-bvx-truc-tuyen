<?php

	
if(isset($_SESSION["obj"]))
{
	switch($_SESSION["obj"])
	{
		case "trangchu":								
			{
				include 'FormTrangChu.php';	
				break;
			}
		case "datve":								
			{
				include 'FormDatVe.php';								
				break;
			}
		case "chuyendi":								
			{
				include "ViewChuyenDi.php";
				break;
			}
		case "tuyendi":								
			{
				include "ViewTuyenDi.php";
				break;
			}
		case "gioithieu":								
			{			
				include 'GioiThieu.php';
				break;
			}
		case "tuyendung":								
			{
			echo '<table>
			<tr>
			<td class="gioithieu1">
				<img src="images/globe-icon.png" height="12px" />
            	Tuyển Dụng
			</td>
			</tr>
			</table>';
				SuKien::ViewTD();
				break;
			}
		case "lienhe":								
			{
				include 'FormLienHe.php';
				break;
			}
		case "quenmatkhau":
			{
				include "quenmatkhau.php";
				break;		
			}
		case "huongdandatve":
			{
				SuKien::ViewHuongDanDatVe();
				break;
			}
	    case "huongdanthanhtoan":
			{
				SuKien::ViewHuongDanThanhToan();
				break;
			}
		case "sukienmienphixetrungchuyen":
			{
				include "sukienmienphixetrungchuyen.php";
				break;
			}
		case "sukienmadrid":
			{
				include "sukienmadrid.php";
				break;
			}
		case "sukienbobienamalfi":
			{
				include "sukienbobienamalfi.php";
				break;
			}
		case "sukienkhuvuondepnhumo":
			{
				include "sukienkhuvuondepnhumo.php";
				break;
			}
		case "sukienvprovence":
			{
				include "sukienvprovence.php";
				break;
			}			
		case "sukiennhatrang":
			{
				include "sukiennhatrang.php";
				break;
			}
		case "sukiencodohue":
			{
				include "sukiencodohue.php";
				break;
			}
			case "sukiendiadaocuchi":
			{
				include "sukiendiadaocuchi.php";
				break;
			}
		case "sukiendalat":
			{
				include "sukiendalat.php";
				break;
			}
		case "sukienvinhhalong":
			{
				include "sukienvinhhalong.php";
				break;
			}
			case "sukienhanoi":
			{
				include "sukienhanoi.php";
				break;
			}
		case "sukienphocohoian":
			{
				include "sukienphocohoian.php";
				break;
			}
		case "ThongTinCaNhan":
			{
				include "View_CapNhat.php";
				break;
			}
		case "VeCuaBan":
			{
				include "View_Xoa_CapNhat.php";
				break;
			}		
	}
}

?>

         