<?php
	// ket noi toi server
	function ConnectStatic(){
		$conn = mysql_connect("localhost","root","") or die("Loi ket noi !");
		mysql_query("SET NAMES 'UTF8'",$conn);
		mysql_select_db("webvexe",$conn);
		return $conn;
	}	
	// truy van du lieu
	function Query($qString){
		$conn = ConnectStatic();
		$kq = mysql_query($qString,$conn);
		return $kq;
	}	
?>