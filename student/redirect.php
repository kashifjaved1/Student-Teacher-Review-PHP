<?php
    session_start();
    $_SESSION['tn']=null;
    header("location: tsel.php");

    if($_SESSION['tname'] == null){
    	//$_SESSION['tname'] = $_POST['tname'];
    	$_SESSION['tn'] = $_POST['tname'];
    	header('location: tsel.php');
    }
?>