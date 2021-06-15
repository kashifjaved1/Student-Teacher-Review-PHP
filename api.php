<?php
	session_start();
	mysqli_connect("localhost", "root", "","wt");
	$con = mysqli_connect("localhost", "root", "","wt");
	$connect = mysqli_connect("localhost","root","","wt");
	if ($connect==false) {
		echo "something went wrong, connection down.";
	}

	/////////////////////////////////////////////////// Sign Up /////////////////////////////////////////////////////

	if(isset($_POST['signup'])){
		$en=$_POST['sname'];
		$eg=$_POST['email'];
		$er=$_POST['pass'];
		$es=$_POST['sem'];
		if($en=="" || $eg=="" || $er=="" || $es==""){
			echo "<br><center><strong>Please Fill All the Fields.</strong></center>";
		}
		else if($es == 0 or $es == 9){
			echo "<strong><br>Plz Enter Semester Between 1 to 8</strong>";?>
			<a href="javascript:history.go(-1);" id="ltc"></a>
			<script>
				function click(){
			  		document.getElementById("ltc").click();
			  	}
				setTimeout(function () {    
				    click(); 
				},2000);
			</script>
		<?php	
		}
		else{
			$query="INSERT INTO `student`(`name`, `email`, `pass`, `sem_id`) VALUES (?,?,?,?)";
			$stmt=$connect->prepare($query);
			$stmt->bind_param("sssi", $en, $eg, $er, $es);
			$stmt->execute();
			echo "<script> window.open('index.php','_self')</script>";
		}
	}

	/////////////////////////////////////////////////// Log In /////////////////////////////////////////////////////

	if (isset($_POST['slogin'])) {
		$empid=$_POST['email'];
		$empnm=$_POST['pass'];
		if($empid=="" or $empnm==""){
			echo "Plz Fill all Fields.";
		}
		else{
			$con=mysqli_connect("localhost", "root", "","wt");
			$sql = "SELECT `email`, `pass` FROM `student` WHERE `email` = ? and `pass` = ?";
			$stmt=$con->prepare($sql);
			$stmt->bind_param("ss",$empid,$empnm);
			$stmt->bind_result($id,$n);
			$stmt->execute();
			$stmt->fetch();
			if($empid==$id and $empnm==$n){
				$_SESSION['id']=$id;
				$_SESSION['n']=$n;
				echo "<script> window.open('tsel.php','_self')</script>";
			}
			else{
				echo "<strong><br>Not Found.</strong>";?>
				<a href="javascript:history.go(-1);" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}

					setTimeout(function () {    
					    click(); 
					},2000);
				</script>
			<?php
			}
		}
	}

	//////////////////////////////////////////// Teacher Selection //////////////////////////////////////////////////

	if(isset($_POST['grf'])){
		header('location: review.php');
	}

	///////////////////////////////////////////// Teacher Log In ////////////////////////////////////////////////////

	if (isset($_POST['tlogin'])) {
		$empid=$_POST['email'];
		$empnm=$_POST['pass'];
		if($empid=="" or $empnm==""){
			echo "Plz Fill all Fields.";
		}
		else{
			$con=mysqli_connect("localhost", "root", "","wt");
			$sql = "SELECT `name`, `email`, `pass` FROM `teacher` WHERE `email` = ? and `pass` = ?";
			$stmt=$con->prepare($sql);
			$stmt->bind_param("ss",$empid, $empnm);
			$stmt->bind_result($displayname, $id, $n);
			$stmt->execute();
			$stmt->fetch();
			if($empid==$id and $empnm==$n){
				$_SESSION['id'] = $id;
				$_SESSION['n'] = $n;
				$_SESSION['displayname'] = $displayname;
				echo "<script> window.open('tarea.php','_self')</script>";
			}
			else{
				echo "<strong><br>Not Found. Redirecting...</strong>";?>
				<a href="javascript:history.go(-1);" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}

					setTimeout(function () {    
					    click(); 
					},100000);
				</script>
			<?php
			}
		}
	}

	///////////////////////////////////////// Teacher Change Password ////////////////////////////////////////////////

	if (isset($_POST['tcp'])) {
		$op = $_POST['op'];
		$np = $_POST['np'];
		$cnp = $_POST['cnp'];
		if($op=="" | $np=="" | $cnp==""){
			echo "Plz Fill all Fields.";
		}
		else{
			$con=mysqli_connect("localhost", "root", "","wt");
			$sql = "SELECT `pass` FROM `teacher` WHERE `email` = ?";
			$stmt=$con->prepare($sql);
			$stmt->bind_param("s", $_SESSION['id']);
			$stmt->bind_result($p);
			$stmt->execute();
			$stmt->fetch();
			if(($op == $p) and ($np == $cnp)){
				$query="UPDATE `teacher` SET `pass` = ?  WHERE `email` = ?";
				$stmt=$connect->prepare($query);
				$stmt->bind_param("ss", $np, $_SESSION['id']);
				$stmt->execute();
				echo "Password Changed Successfully. Redirecting...";?>
				<a href="tarea.php" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}

					setTimeout(function () {    
					    click(); 
					},3000);
				</script>
			<?php
			}
			else{
				echo "something went wrong...";?>
				<a href="tarea.php" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}

					setTimeout(function () {    
					    click(); 
					},4000);
				</script>
			<?php
			}
		}
	}

	////////////////////////////////////////// Admin Change Password /////////////////////////////////////////////////

	if (isset($_POST['acp'])) {
		$op = $_POST['op'];
		$np = $_POST['np'];
		$cnp = $_POST['cnp'];
		if($op=="" | $np=="" | $cnp==""){
			echo "Plz Fill all Fields.";
		}
		else{
			$con=mysqli_connect("localhost", "root", "","wt");
			$sql = "SELECT `pass` FROM `teacher` WHERE `email` = ?";
			$stmt=$con->prepare($sql);
			$stmt->bind_param("s", $_SESSION['id']);
			$stmt->bind_result($p);
			$stmt->execute();
			$stmt->fetch();
			if(($op == $p) and ($np == $cnp)){
				$query="UPDATE `teacher` SET `pass` = ?  WHERE `email` = ?";
				$stmt=$connect->prepare($query);
				$stmt->bind_param("ss", $np, $_SESSION['id']);
				$stmt->execute();
				echo "Password Changed Successfully. Redirecting...";?>
				<a href="apanel.php" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}

					setTimeout(function () {    
					    click(); 
					},5000);
				</script>
			<?php
			}
			else{
				echo "error";
			}
		}
	}

	///////////////////////////////////////// Student Change Password ////////////////////////////////////////////////
	
	if (isset($_POST['scp'])) {
		$op = $_POST['op'];
		$np = $_POST['np'];
		$cnp = $_POST['cnp'];
		if($op=="" | $np=="" | $cnp==""){
			echo "Plz Fill all Fields.";
		}
		else{
			$con=mysqli_connect("localhost", "root", "","wt");
			$sql = "SELECT `pass` FROM `student` WHERE `email` = ?";
			$stmt=$con->prepare($sql);
			$stmt->bind_param("s", $_SESSION['id']);
			$stmt->bind_result($p);
			$stmt->execute();
			$stmt->fetch();
			if(($op == $p) and ($np == $cnp)){
				$query="UPDATE `student` SET `pass` = ?  WHERE `email` = ?";
				$stmt=$connect->prepare($query);
				$stmt->bind_param("ss", $np, $_SESSION['id']);
				$stmt->execute();
				echo "Password Changed Successfully. Redirecting...";?>
				<a href="tsel.php" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}

					setTimeout(function () {    
					    click(); 
					},5000);
				</script>
			<?php
			}
			else{
				echo "error";
			}
		}
	}

	///////////////////////////////////////////// Teacher Review ///////////////////////////////////////////////

	if(isset($_POST['grf'])){
		$_SESSION['tc'] = $_POST['tc'];
		header('location: review.php');
	}

	//////////////////////////////////////////// Admin Log In //////////////////////////////////////////////////

	if (isset($_POST['alogin'])) {
		$empid=$_POST['aname'];
		$empnm=$_POST['pass'];
		if($empid=="" or $empnm==""){
			echo "Plz Fill all Fields.";
		}
		else{
			$con=mysqli_connect("localhost", "root", "","wt");
			$sql = "SELECT `name`, `pass` FROM `admin` WHERE `name` = ? and `pass` = ?";
			$stmt=$con->prepare($sql);
			$stmt->bind_param("ss",$empid,$empnm);
			$stmt->bind_result($id,$n);
			$stmt->execute();
			$stmt->fetch();
			if($empid==$id and $empnm==$n){
				$_SESSION['id'] = $id;
				$_SESSION['n'] = $n;
				echo "<script> window.open('apanel.php','_self')</script>";
			}
			else{
				echo "<strong><br>Not Found.</strong>";
			}
		}
	}

	//////////////////////////////////////////// Review Submition //////////////////////////////////////////////////

	$con=mysqli_connect("localhost", "root", "","wt");
	$flag = 0;
	if(isset($_POST['sr'])){
		$sql = "SELECT `sem`, `sem_id` FROM `ctt`, `student` WHERE `ctt`.`tname` = ? AND `student`.`email` = ?";
		$stmt=$con->prepare($sql);
		$stmt->bind_param("ss",$empid,$empnm);
		$stmt->bind_result($ts,$ss);
		$stmt->execute();
		$stmt->fetch();
		$sql1 = "SELECT `se`, `tn`, `cn` FROM `chk`";
		$stmt1 = $con->prepare($sql1);
		$stmt1->bind_result($se, $tn, $cn);
		$stmt1->execute();
		while($stmt1->fetch()){
			if($_SESSION['id'] == $se && $_SESSION['tn'] == $tn && $_SESSION['tc'] == $cn){
				$flag = 1;
				break;
			}
			else{
				continue;
			}
		}

			if(($flag == 0) && ($ts == $ss)){
								
				if($_POST['r'] == 1){
					$rt = $_POST['r'];
				}
				else if($_POST['r1'] == 2){
					$rt = $_POST['r1'];
				}
				else if($_POST['r2'] == 3){
					$rt = $_POST['r2'];
				}
				else if($_POST['r3'] == 4){
					$rt = $_POST['r3'];
				}
				else if($_POST['r4'] == 5){
					$rt = $_POST['r4'];
				}
				
				$query = "INSERT INTO `chk`(`se`, `tn`, `cn`, `r`) VALUES (?,?,?,?)";
				$stmt = $con->prepare($query);
				$stmt->bind_param("sssi", $_SESSION['id'], $_SESSION['tn'], $_SESSION['tc'], $rt);
				$stmt->execute();
				/*
				$sql = "SELECT `chk` FROM `student` WHERE `email` = ?";
				$stmt=$con->prepare($sql);
				$stmt->bind_param("i",$_SESSION['id']);
				$stmt->bind_result($r);
				$stmt->execute();
				$stmt->fetch();
				if($r == 1){
					echo "You Already given the Review";?>
					<a href="javascript:history.go(-2);" id="ltc"></a>
					<script>
						function click(){
					  		document.getElementById("ltc").click();
					  	}
						setTimeout(function () {    
						    click(); 
						},5000);
					</script>
					<?php
					}
				}*/
				$sql = "SELECT `rating` FROM `ctt` WHERE `tname` = ? and `course` = ?";
				$stmt=$con->prepare($sql);
				$stmt->bind_param("ss", $_SESSION['tn'], $_SESSION['tc']);
				$stmt->bind_result($r);
				$stmt->execute();
				$stmt->fetch();
				$r = $r + $rt;
				$query="UPDATE `ctt` SET `rating`= ? WHERE `tname` = ? AND `course` = ?";
				$stmt=$connect->prepare($query);
				$stmt->bind_param("iss", $r, $_SESSION['tn'], $_SESSION['tc']);
				$stmt->execute();
				header('location: rvgraf.php');
			}
			else{
				echo "You already Given Rating to this Teacher on this Subject.<br>Redirecting...";?>
				<a href="rvgraf.php" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}

					setTimeout(function () {    
					    click(); 
					},5000);
				</script>
			<?php
			}
	}

	//////////////////////////////////////////// Add Course //////////////////////////////////////////////////

	if (isset($_POST['cnsub'])) {
		$query = "INSERT INTO `course`(`name`) VALUES (?)";
		$stmt = $con->prepare($query);
		$stmt->bind_param("s", $_POST['cn']);
		$stmt->execute();
		echo "Course Added Successfully.<br>Redirecting...";?>
		<a href="addc.php" id="ltc"></a>
		<script>
			function click(){
		  		document.getElementById("ltc").click();
		  	}
		setTimeout(function () {    
		    click(); 
		},5000);
		</script>
	<?php
	}

	//////////////////////////////////////////// Assign C2T //////////////////////////////////////////////////

	if (isset($_POST['acsub'])) {
		//echo $_POST['semester'], $_POST['teacher'], $_POST['course'];
		$flag = 0;
		$sql = "SELECT `course`, `sem`, `tname` FROM `ctt`";
		$stmt = $con->prepare($sql);
		$stmt->bind_result($c, $s, $t);
		$stmt->execute();
		while($stmt->fetch()){
			if($_POST['semester'] == $s && $_POST['course'] == $c){
				$flag = 1;
				echo "This Course is Already Assigned to $t in Semester $s.<br>Redirecting...";
				?>
				<a href="ac2t.php" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}
					setTimeout(function () {    
					    click(); 
					},5000);
				</script><?php
			}
			else{
				continue;
			}
		}
		
		if($flag == 0){
			$query = "INSERT INTO `ctt`(`sem`, `tname`, `course`) VALUES (?, ?, ?)";
			$stmt = $con->prepare($query);
			$stmt->bind_param("iss", $_POST['semester'], $_POST['teacher'], $_POST['course']);
			$stmt->execute();
			echo "Course Assigned to Teacher Successfully.<br>Redirecting...";?>
			<a href="ac2t.php" id="ltc"></a>
			<script>
				function click(){
			  		document.getElementById("ltc").click();
			  	}
				setTimeout(function () {    
				    click(); 
				},5000);
			</script><?php
		}
	}

	//////////////////////////////////////////// Add Teacher //////////////////////////////////////////////////

	if (isset($_POST['addt'])) {
		$flag = 0;
		$sql = "SELECT `email` FROM `teacher`";
		$stmt = $con->prepare($sql);
		$stmt->bind_result($tem);
		$stmt->execute();
		while($stmt->fetch()){
			if($_POST['tem'] == $tem){
				$flag = 1;
				echo "This Teacher is Already Registered.<br>Redirecting...";
				?>
				<a href="addt.php" id="ltc"></a>
				<script>
					function click(){
				  		document.getElementById("ltc").click();
				  	}
					setTimeout(function () {    
					    click(); 
					},5000);
				</script><?php
			}
			else{
				continue;
			}
		}
		
		if($flag == 0){
			$query = "INSERT INTO `teacher`(`name`, `edu`, `email`, `pass`) VALUES (?, ?, ?, ?)";
			$stmt = $con->prepare($query);
			$stmt->bind_param("ssss", $_POST['tnm'], $_POST['tedu'], $_POST['tem'], $_POST['tpwd']);
			$stmt->execute();
			echo "Teacher Added Successfully.<br>Redirecting...";?>
			<a href="addt.php" id="ltc"></a>
			<script>
				function click(){
			  		document.getElementById("ltc").click();
			  	}
				setTimeout(function () {    
				    click(); 
				},5000);
			</script><?php
		}
	}