<?php
// Include authentication
require("process/auth.php");

// Include database connection
require("../config/db.php");

// Include class Organization
require("classes/Organization.php");

// Include class Position
require("classes/Position.php");

// Include class Nominees
require("classes/Nominees.php");

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Election Results</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
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
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="active"><a href="student_results.php"><span class="glyphicon glyphicon-list-alt"></span> View Results</a></li>
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

<div class="container" style="margin-top: 60px;">
    <h2>Election Results</h2>

    <?php
    if (!isset($_GET['organization'])) {
        echo "<div class='alert alert-warning'>Please select an organization to show the vote result.</div>";
    } else {
        $org = trim($_GET['organization']);

        // Fetch positions for the selected organization
        $readPos = new Position();
        $rtnReadPos = $readPos->READ_POS_BY_ORG($org);

        if ($rtnReadPos) {
            while ($rowPos = $rtnReadPos->fetch_assoc()) {
                echo "<h5>" . htmlspecialchars($rowPos['pos']) . "</h5>";

                // Fetch nominees for the current position
                $readNomOrgPos = new Nominees();
                $rtnReadNomOrgPos = $readNomOrgPos->READ_NOM_BY_ORG_POS($org, $rowPos['pos']);

                echo "<div class='table-responsive'>";
                if ($rtnReadNomOrgPos) {
                    echo "<table class='table table-condensed table-striped'>";
                    echo "<tr><th>ID</th><th>Name</th><th>Votes</th></tr>";
                    
                    while ($rowCountVotes = $rtnReadNomOrgPos->fetch_assoc()) {
                        // Count votes for each nominee
                        $countVotes = new Nominees();
                        $rtnCountVotes = $countVotes->COUNT_VOTES($rowCountVotes['id']);
                        
                        echo "<tr>";
                        echo "<td style='width: 20%;'>" . htmlspecialchars($rowCountVotes['id']) . "</td>";
                        echo "<td style='width: 70%;'>" . htmlspecialchars($rowCountVotes['name']) . "</td>";
                        echo "<td style='width: 10%;'>" . ($rtnCountVotes ? $rtnCountVotes->num_rows : 0) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    $rtnReadNomOrgPos->free();
                } else {
                    echo "<p>No nominees found for this position.</p>";
                }
                echo "</div>";
            }
            $rtnReadPos->free();
        } else {
            echo "<div class='alert alert-danger'>No positions found for the selected organization.</div>";
        }
    }
    ?>
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
<?php
// Close database connection
$db->close();
?>
