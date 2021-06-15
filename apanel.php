<?php
    session_start();
    if($_SESSION['id'] == null or $_SESSION['n'] == null){
        header('location: alogin.php');
    }
?>
<style>
    body{
        background-image: url("bg2.gif");
        background-size: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    a{
        text-decoration: none;
        color: green;
    }
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 2px 1px;
        cursor: pointer;
    }
    .btnMod {
        border-radius: 5px;
        border: none;
        color: white;
        padding: 13px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 2px 1px;
        cursor: pointer;
    }
    .button4 {border-radius: 8px;}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Admin | Dashboard</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Dashboard</h2>
                </div>
                    <button style="float: right; margin-right: 2%; margin-top: 1%; border-radius: 4px;" class="button btn--red"><a href="logout.php" style="color: white;">Logout</a></button>
                    <button style="float: right; margin-right: 1%; margin-top: 1%; border-radius: 4px;" class="button btn--red"><a href="acpass.php" style="color: white;">Settings</a></button>
                <div class="card-body">
                    <center>
                        <button class="btnMod btn--red"><a href="addt.php" style="color: white;">Add Teacher</a></button>
                        <button class="btnMod btn--radius-2 btn--red"><a href="addc.php" style="color: white;">Add Course</a></button>
                        <button class="btnMod btn--radius-2 btn--red"><a href="ac2t.php" style="color: white;">Assign Course</a></button>
                        <!--<br>
                        <button class="btnMod btn--radius-2 btn--red"><a href="mtt.php" style="color: white;">Write Message</a></button>
                        <button class="btnMod btn--radius-2 btn--red"><a href="aib.php" style="color: white;"></a>Inbox</button>-->
                        <button class="btnMod btn--radius-2 btn--red"><a href="middleman.php" style="color: white;">View Review</a></button><br>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->