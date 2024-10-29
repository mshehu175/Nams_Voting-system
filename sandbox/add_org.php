<?php
// Include authentication
require("process/auth.php");

// Include database connection
require("../config/db.php");

// Include class Organization
require("classes/Organization.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Organization - Voting System</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
    <style>
        /* Custom styles for better responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            .navbar-brand, .navbar-nav>li>a {
                font-size: 14px; /* Adjust navbar font size */
            }
            .form-control {
                font-size: 14px; /* Adjust form input font size */
            }
            .btn {
                width: 100%; /* Full-width buttons on smaller screens */
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">NAMS Voting System</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin_page.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active"><a href="add_org.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Organization</a></li>
                <li><a href="add_pos.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Position</a></li>
                <li><a href="add_nominees.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Nominees</a></li>
                <li><a href="add_voters.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Voters</a></li>
                <li><a href="vote_result.php"><span class="glyphicon glyphicon-plus-sign"></span> Vote Result</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="process/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- End Header -->

<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <h4>Add Organization</h4>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                // Sanitize user input
                $organization = trim($_POST['organization']);

                // Create an instance of the Organization class and insert the organization
                $insertOrg = new Organization();
                $rtnInsertOrg = $insertOrg->INSERT_ORG($organization);
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                <div class="form-group-sm">
                    <label for="organization">Organization</label>
                    <input required type="text" name="organization" class="form-control" placeholder="Enter organization name">
                </div>
                <hr>
                <div class="form-group-sm">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
        </div>

        <div class="col-md-8 col-sm-12">
            <h4>List of Organizations</h4>
            <hr>
            <?php
            $readOrg = new Organization();
            $rtnReadOrg = $readOrg->READ_ORG();
            ?>
            <div class="table-responsive">
                <?php if ($rtnReadOrg) { ?>
                    <table class="table table-bordered table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>Organization</th>
                                <th><span class="glyphicon glyphicon-edit"></span></th>
                                <th><span class="glyphicon glyphicon-remove"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($rowOrg['org']); ?></td>
                                    <td>
                                        <a href="edit_org.php?id=<?php echo htmlspecialchars($rowOrg['id']); ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="delete_org.php?id=<?php echo htmlspecialchars($rowOrg['id']); ?>">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php $rtnReadOrg->free(); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
    <div class="container">
        <div class="navbar-text text-center" style="font-weight: bold; color: white; width: 100%;">
            Copyright &copy; NAMS <span id="currentYear"></span>
        </div>
    </div>
</nav>
<!-- End Footer -->

<script>
    // Set the current year
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Close database connection
$db->close();