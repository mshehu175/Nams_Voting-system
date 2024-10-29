<?php
session_start();
unset($_SESSION['ID']);
unset($_SESSION['NAME']);
unset($_SESSION['COURSE']);
unset($_SESSION['YEAR']);
unset($_SESSION['STUD_ID']);

// Database connection details
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "voting"; 

// Create the connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch notice from the database
$query = "SELECT notice FROM settings WHERE id=1";
$result = mysqli_query($conn, $query);

// Initialize variables
$notice = "";

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $notice = $row['notice'];
} else {
    echo "No notice found.";
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style_voter.css">
    <style>
        /* Flexbox for layout */
        .container-flex {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: stretch;
            gap: 20px;
            margin-top: 50px;
        }

        /* For larger screens, arrange in a row */
        @media (min-width: 768px) {
            .container-flex {
                flex-direction: row;
            }
        }

        /* Flexbox child for notice board */
        .notice-board {
            flex: 1;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
        }

        /* Flexbox child for login form */
        .login-box {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Adjust margin for larger screens */
        @media (min-width: 768px) {
            .login-box {
                margin-top: 105px;
            }
        }

        /* Styling for h2 headers */
        h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Center text inside notice and login */
        .alert-info, .login-con {
            text-align: center;
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
            <a class="navbar-brand" href="index.php" style="font-weight: bold; color: white;">NAMS Voting System</a>
        </div>
    </div>
</nav>
<!-- End Header -->

<!-- Flexbox Layout: Notice Board and Login -->
<div class="container container-flex">
    <!-- Notice Board -->
    <div class="notice-board">
        <h2>News</h2>
        <div class="alert alert-info">
            <?php echo $notice; ?>
        </div>
    </div>

    <!-- Login Form -->
    <div class="login-box">
        <h2>Student Log-in</h2>
        <div class="login-con">
            <?php
            if(isset($_SESSION['ERROR_MSG_ARRAY']) && is_array($_SESSION['ERROR_MSG_ARRAY']) && COUNT($_SESSION['ERROR_MSG_ARRAY']) > 0) {
                foreach($_SESSION['ERROR_MSG_ARRAY'] as $msg) {
                    echo "<div class='alert alert-danger'>";
                    echo $msg;
                    echo "</div>";
                }
                unset($_SESSION['ERROR_MSG_ARRAY']);
            }
            ?>
            <form method="post" action="process/login.php" role="form">
                <div class="form-group has-warning has-feedback">
                    <label for="stud_id">Student ID</label>
                    <input type="text" name="stud_id" id="stud_id" class="form-control" autocomplete="off" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <button type="submit" name="submit" id="submitButton" class="btn btn-info">Submit</button>
            </form>
            <div class="form-group">
                <a href="#" class="btn btn-secondary btn-block">Check Election Results</a> <!-- New button for checking results -->
            </div>
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

<script>
// JavaScript to set the current year
document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

<script>
// Pop-up message for welcome and voting instructions
window.onload = function() {
    alert("Kindly Check the Instructions for Casting Vote\n\nKindly note that you can only vote once");
};
</script>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
