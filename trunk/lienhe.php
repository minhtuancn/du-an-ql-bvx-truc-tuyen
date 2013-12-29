<?php
	class lienhe
	{
		var $idLh;
		var $HoTen;
		var $Email;
		var $SoDT;
		var $NoiDung;
		var $NgayCapNhat;
		
		
		static function ConvertToObject($array)
		{
			$lh = new lienhe;
			$lh->idLh = $array["idLh"];
			$lh->HoTen = $array["HoTen"];
			$lh->Email = $array["Email"];
			$lh->SoDT = $array["SoDT"];
			$lh->NoiDung = $array["NoiDung"];
			$lh->NgayCapNhat = $array["NgayCapNhat"];
			
			return $lh;
		}
		static function GetAll()
		{
			$str = "select * from lienhe";
			$kq = Query($str);
			$arr = array();
			if($kq>0)
			{
				$i=0;
				while($row=mysql_fetch_array($kq))
				{
					$arr[$i] = self::ConvertToObject($row);
					$i++;
				}
				return $arr;
			}
		}
		static function GetOneById($id)
		{	
			$str = "select * from lienhe where idLh=".$id;
			$kq = Query($str);
			if($kq>0)
			{
				while($row=mysql_fetch_array($kq))
				{
					$kq = self::ConvertToObject($row);
					return $kq;
				}
				return null;
			}
		}
		static function XoaLienHe($id)
		{
			$str="delete from lienhe where idLh=$id";
			$kq= Query($str);
			return $kq;
		}
		static function ThemLienHe($ht, $em, $dt, $nd)
		{	
			$ngay=date("Y/m/d");
			$str = "insert into lienhe(HoTen,Email,SoDT,NoiDung,NgayCapNhat) values('".$ht."','".$em."','".$dt."','".$nd."','".$ngay."')";
			$kq = Query($str);
			return $kq;
		}
	}
?>