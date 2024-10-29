<?php
//Include authentication
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
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Voting System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="admin_page.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="add_org.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Organization</a></li>
                <li><a href="add_pos.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Position</a></li>
                <li><a href="add_nominees.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Nominees</a></li>
                <li><a href="add_voters.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Voters</a></li>
                <li><a href="vote_result.php"><span class="glyphicon glyphicon-plus-sign"></span>Vote Result</a></li>
                <li><a href="notice.php"><span class="glyphicon glyphicon-plus-sign"></span>Notice</a></li>
                <li><a href="manage_vote.php"><span class="glyphicon glyphicon-plus-sign"></span>Manage Vote</a></li>

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

<?php
// Database connection details
$host = "localhost"; // or "127.0.0.1"
$user = "root"; // MySQL username (usually 'root' for local development)
$password = ""; // MySQL password (usually empty for local development)
$database = "voting"; // Your database name

// Create the connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize a variable for the success message
$successMessage = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notice = mysqli_real_escape_string($conn, $_POST['notice']);

    // Update query for the notice
    $query = "UPDATE settings SET notice='$notice' WHERE id=1";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        $successMessage = "Notice updated successfully.";
    } else {
        echo "Error updating notice: " . mysqli_error($conn);
    }
}
?>

<title>Update Notice</title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<!-- Form to update the notice -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3"><br><br><br><br>
            <h2>Update Notice</h2>
            <form method="POST" action="notice.php">
                <div class="form-group">
                    <label for="notice">Notice</label>
                    <textarea name="notice" id="notice" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<?php if (!empty($successMessage)): ?>
    <script>
        // JavaScript to show the success message as a pop-up
        alert("<?php echo $successMessage; ?>");
    </script>
<?php endif; ?>

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

</body>
</html>
