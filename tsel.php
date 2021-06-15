<?php
    session_start();
    if($_SESSION['id'] == null or $_SESSION['n'] == null){
        header('location: index.php');
    }
    
    if($_SESSION['t'] != null){
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
</style>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Student | SignUp</title>

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
                        <h2 class="title">Teacher Selection</h2>
                    </div>
                    <button style="float: right; margin-right: 2%; margin-top: 1%; border-radius: 4px;" class="button btn--red"><a href="logout.php" style="color: white;">Logout</a></button>
                    <button style="float: right; margin-right: 1%; margin-top: 1%; border-radius: 4px;" class="button btn--red"><a href="scpass.php" style="color: white;">Settings</a></button>
                    <p style="float: right; margin-right: 2%; margin-top: 1%; border-radius: 4px; color: black;">Like to See What are Teachers Rating? Kindly, Click <a href="middleman.php">Here</a>.</p>
                    <div class="card-body">
                        <form method="POST" action="api.php">
                                <div class="form-row">
                            <div class="name">Teacher</div>
                                <div class="value">
                                    <div class="input-group">
                                    <input class="input--style-5" type="text" name="tname" required="" value="<?php echo $_SESSION['t']; ?>" disabled="disabled" style="cursor: not-allowed;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="name">Course</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="tc" required="">
                                                <option disabled="disabled" selected="selected">Select Teacher's Course</option>
                                            <?php
                                                $con=mysqli_connect("localhost", "root", "","wt");
                                                $sql = "SELECT `sem`, `course` FROM `ctt` WHERE `tname` = ?";
                                                $stmt=$con->prepare($sql);
                                                $stmt->bind_param("s",$_SESSION['t']);
                                                $stmt->bind_result($s, $cn);
                                                $stmt->execute();
                                                while($stmt->fetch()){?>
                                                    <option value="<?php echo $cn; ?>"><?php echo $cn; ?></option>
                                                <?php
                                                    $_SESSION['tfs'] = $s;
                                                }
                                            ?>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn--radius-2 btn--red" type="submit" name="grf">Generate Review Form</button>
                                </span>
                            </div>
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
<?php
}
    if($_SESSION['t'] == null){
        if(isset($_POST['tname'])){
            $_SESSION['t'] = $_POST['tname'];
            header('location: tsel.php');
        }
        else{?>
            <!DOCTYPE html>
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
            </style>
            <html lang="en">

            <head>
                <!-- Required meta tags-->
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Title Page-->
                <title>Student | Teacher Selection</title>

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
                                <h2 class="title">Teacher Selection</h2>
                            </div>
                            <button style="float: right; margin-right: 2%; margin-top: 1%; border-radius: 4px;" class="button btn--red"><a href="logout.php" style="color: white;">Logout</a></button>
                            <button style="float: right; margin-right: 1%; margin-top: 1%; border-radius: 4px;" class="button btn--red"><a href="scpass.php" style="color: white;">Settings</a></button>
                            <p style="float: right; margin-right: 2%; margin-top: 1%; border-radius: 4px; color: black;">Like to See What are Teachers Rating? Kindly, Click <a href="middleman.php">Here</a>.</p>
                            <div class="card-body">
                                <form method="POST" action="tsel.php">
                                <div class="form-row">
                                <div class="name">Teacher</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="tname" required="" onchange="form.submit();">
                                                <option disabled="disabled" selected="selected">Select Your Teacher</option>
                                            <?php
                                                $con=mysqli_connect("localhost", "root", "","wt");
                                                $sql = "SELECT DISTINCT `tname` FROM `ctt` WHERE 1";
                                                $stmt=$con->prepare($sql);
                                                $stmt->bind_result($n);
                                                $stmt->execute();
                                                while($stmt->fetch()){?>
                                                    <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                                                <?php
                                                }
                                            ?>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
<?php            
        }
    }
?>
