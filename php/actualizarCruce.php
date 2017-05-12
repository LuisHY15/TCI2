<?php 
	include '../db.php';
	$InvCruDateCrossing = $_GET["InvCruDateCrossing"];
	$InvCruTrailerNumber = $_GET["InvCruTrailerNumber"];
	$InvCruDescription = $_GET["InvCruDescription"];
	$InvCru = $_GET["InvCru"];
	$sql = "UPDATE invcruce SET InvCruDateCrossing='".$InvCruDateCrossing."',InvCruTrailerNumber=".$InvCruTrailerNumber.",InvCruDescription='".$InvCruDescription."' WHERE InvCru=".$InvCru;
	$stmt = $db->prepare($sql);
    $stmt->execute(); 

 ?>