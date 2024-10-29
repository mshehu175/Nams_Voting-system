<?php
// Include authentication
require("process/auth.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
    <style>
        /* Custom media queries for responsiveness */
        
        /* For devices with a width less than 768px (tablets and smaller) */
        @media (max-width: 768px) {
            .jumbotron {
                padding: 20px;
            }
            .navbar {
                font-size: 14px; /* Smaller font size for the navbar */
            }
            .navbar-brand, .navbar-nav > li > a {
                padding: 10px; /* Increase padding for better touch targets */
            }
            button.btn-info {
                width: 100%; /* Full width button on smaller devices */
                margin-top: 10px; /* Margin on top */
            }
        }

        /* For devices with a width less than 576px (mobile phones) */
        @media (max-width: 576px) {
            .jumbotron {
                text-align: center; /* Center align text */
            }
            h2 {
                font-size: 1.5rem; /* Smaller font size for h2 */
            }
            h1 {
                font-size: 2rem; /* Smaller font size for h1 */
            }
            button.btn-info {
                font-size: 16px; /* Adjust button font size */
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">NAMS Voting System</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="admin_page.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="add_org.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Organization</a></li>
                <li><a href="add_pos.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Position</a></li>
                <li><a href="add_nominees.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Nominees</a></li>
                <li><a href="add_voters.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Voters</a></li>
                <li><a href="vote_result.php"><span class="glyphicon glyphicon-plus-sign"></span>Vote Result</a></li>
                <li><a href="notice.php"><span class="glyphicon glyphicon-plus-sign"></span>Notice</a></li>
                <li><a href="upload_results.php"><span class="glyphicon glyphicon-plus-sign"></span>Upload esults</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="process/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
<!-- End Header -->

<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-12 jumbotron text-center">
            <h2>Computerized National Association of Maradun Student </h2>
            <h1>Voting System</h1><br />
            <button class="btn btn-info" onclick="alert('This feature is under construction.')">About the System</button>
        </div>
    </div>
</div>

<!-- Footer -->
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
    <div class="container">
        <div class="navbar-text text-center" style="font-weight: bold; color: white; width: 100%;">
            Copyright @ NAMS <span id="currentYear"></span>
        </div>
    </div>
</nav>
<!-- End Footer -->

<script>
    // JavaScript to set the current year
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>