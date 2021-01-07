<?php

	$con = mysqli_connect("localhost","root","","db_elearning");

	function call_var($id,$val){
		$con = mysqli_connect("localhost","root","","db_elearning");
		$qry = $con->query("SELECT * FROM `tbl_user` WHERE `ID` = '$ID'");
		$row = $qry->fetch_assoc();
		echo $row[$val];
	}
?>