<?php
    echo "Wait Redirecting...";?>
    <a href="rvgraf.php" id="ltc"></a>
    <script>
        function click(){
            document.getElementById("ltc").click();
        }
        setTimeout(function () {    
            click(); 
        },2000);
    </script>
<?php

    /*session_start();
    $_SESSION['t'] = null;
    header("location: tsel.php");

    if($_SESSION['tname'] == null){
    	//$_SESSION['tname'] = $_POST['tname'];
    	$_SESSION['t'] = $_POST['tname'];
    	$_SESSION['tn'] = $_POST['tname'];
    	header('location: tsel.php');
    }*/
?>