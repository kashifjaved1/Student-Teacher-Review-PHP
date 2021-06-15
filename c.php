<?php
require_once("pcl/conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Basic Chart</title>
</head>
<body>
    
<?php
	$pc = new C_PhpChartX(array(array()),'basic_chart');
	$pc->draw();
?>

</body>
</html>