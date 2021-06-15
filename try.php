<?php
	$con = mysqli_connect("localhost", "root", "","wt");
	$sql = "SELECT `se`, `tn`, `cn` FROM `chk`";
	$stmt = $con->prepare($sql);
	$stmt->bind_result($se, $tn, $cn);
	$stmt->execute();
	while($stmt->fetch()){
		
	}
?>