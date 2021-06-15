<style>
    body{
        background-image: url("bg2.gif");
        background-size: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
<?php
    echo "<html><body><center><h1 style='color: red; font-size: 2300%; margin-bottom: 0%;'>Error<br><h1 style='color: red; font-size: 200%;'>You are not Allowed to Use this Function<br><h1 style='color: red; font-size: 100%;'>Redirecting...</h1></h1></h1></center></body></html>";
?>

<a href="javascript:history.go(-1);" id="ltc"></a>

<script>
	function click(){
  		document.getElementById("ltc").click();
  	}

	setTimeout(function () {    
	    click(); 
	},5000);
</script>