<?php
// Include authentication
require("process/auth.php");

// Include database connection
require("../config/db.php");

if (isset($_POST['submit'])) {
    $org = $_POST['organization'];
    $pos = $_POST['position'];
    $candidate = $_POST['candidate_name'];
    $votes = $_POST['votes'];

    // Insert the result into the election_results table
    $sql = "INSERT INTO election_results (org, pos, candidate_name, votes) 
            VALUES ('$org', '$pos', '$candidate', '$votes')";
    $result = $conn->query($sql);

    if ($result) {
        $successMsg = "Result uploaded successfully!";
    } else {
        $errorMsg = "Failed to upload result. Please try again.";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Election Results</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="index.php">Voting System</a>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="admin_page.php"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="upload_results.php">Upload Results</a></li>
            <li><a href="process/logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<!-- End Header -->

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Upload Election Results</h3><hr>

            <?php if (isset($successMsg)) { ?>
                <div class="alert alert-success"><?php echo $successMsg; ?></div>
            <?php } ?>
            <?php if (isset($errorMsg)) { ?>
                <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
            <?php } ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" name="organization" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" name="position" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="candidate_name">Candidate Name</label>
                    <input type="text" name="candidate_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="votes">Votes</label>
                    <input type="number" name="votes" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Upload Result</button>
            </form>
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


</body>
</html>
