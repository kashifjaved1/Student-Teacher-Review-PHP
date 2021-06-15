<?php
    session_start();
    if($_SESSION['id'] == null or $_SESSION['n'] == null){
        header('location: index.php');
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
    .button4 {border-radius: 8px;}
    
    /* /////////////////////////////////////////////////// Tool Tip Design ///////////////////////////////////////////////// */
    
    .tooltip {
      position: relative;
      display: inline-block;
    }

    .tooltip .tooltiptext {
      width: 120px;
      top: 130%;
      left: 48%; 
      margin-left: -60px;
      visibility: hidden;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      /* Position the tooltip */
      position: absolute;
      z-index: 5;
    }

    .tooltip:hover .tooltiptext {
      visibility: visible;
    }

    .tooltip .tooltiptext::after {
        content: " ";
        position: absolute;
        margin-top: 5%;
        bottom: 100%;  /* At the top of the tooltip */
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent black transparent;
    }

    /* /////////////////////////////////////////////////// Tool Tip Design ///////////////////////////////////////////////// */

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Student | Teacher Review</title>

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
                    <h2 class="title">Teacher Review Form</h2>
                </div>
                    <button style="float: right; margin-right: 2%; margin-top: 1%; border-radius: 4px;" class="button btn--red"><a href="logout.php" style="color: white;">Logout</a></button>
                    <button style="float: right; margin-right: 1%; margin-top: 1%; border-radius: 4px;" class="button btn--red"><a href="logout.php" style="color: white;">Settings</a></button>
                <div class="card-body">
                    <form method="POST" action="api.php">
                        <?php
                          //echo $_SESSION['tn']." & ".$_SESSION['tc']." & ".$_SESSION['tfs'];
                          $_SESSION['t'] = null;
                        ?>
                        <div class="tooltip" style="margin-right: 3%;">Hated<br>
                          <input type="radio" value="1" style="margin-top: 2px;" name="r">
                          <span class="tooltiptext"><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                        </div>
                        <div class="tooltip" style="margin-right: 3%;">DisAgree<br>
                          <input type="radio" value="2" style="margin-top: 2px;" name="r1">
                          <span class="tooltiptext"><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                        </div>
                        <div class="tooltip" style="margin-right: 3%;">Not Sure<br>
                          <input type="radio" value="3" style="margin-top: 2px;" name="r2">
                          <span class="tooltiptext"><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                        </div>
                        <div class="tooltip" style="margin-right: 3%;">Agree<br>
                          <input type="radio" value="4" style="margin-top: 2px;" name="r3">
                          <span class="tooltiptext"><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star"></i></span>
                        </div>
                        <div class="tooltip" style="margin-right: 3%;">Love<br>
                          <input type="radio" value="5" style="margin-top: 2px;" name="r4">
                          <span class="tooltiptext"><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i></span>
                        </div>
                        <br><br><br>
                        <button style="border-radius: 4px;" class="button btn--red" type="submit" name="sr">Submit</button>
                    </form>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->