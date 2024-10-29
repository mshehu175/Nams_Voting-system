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
    <title>Administrator Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">

    <script>
        function getPos(val) {
            $.ajax({
                type: "POST",
                url: "get_pos.php",
                data: 'org=' + val,
                success: function(data) {
                    $("#pos-list").html(data);
                }
            });
        }
    </script>
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
                <li><a href="add_org.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Organization</a></li>
                <li><a href="add_pos.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Position</a></li>
                <li class="active"><a href="add_nominees.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Nominees</a></li>
                <li><a href="add_voters.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Voters</a></li>
                <li><a href="vote_result.php"><span class="glyphicon glyphicon-plus-sign"></span>Vote Result</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="process/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Header -->

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php
            if (isset($_POST['update'])) {
                $org = trim($_POST['organization']);
                $pos = trim($_POST['position']);
                $name = trim($_POST['name']);
                $course = trim($_POST['course']);
                $year = trim($_POST['year']);
                $stud_id = trim($_POST['stud_id']);
                $nominee_id = trim($_POST['nom_id']);

                $updateNominee = new Nominees();
                $rtnUpdateNominee = $updateNominee->UPDATE_NOMINEE($org, $pos, $name, $course, $year, $stud_id, $nominee_id);
            }
            ?>
            <h4>Edit Nominee</h4><hr>

            <?php
            if (isset($_GET['id'])) {
                $nom_id = trim($_GET['id']);

                $editNominee = new Nominees();
                $rtnEditNominee = $editNominee->EDIT_NOMINEE($nom_id);
            }
            ?>

            <?php if ($rtnEditNominee) { ?>
                <?php while ($rowNominee = $rtnEditNominee->fetch_assoc()) { ?>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
                        <?php
                        $readOrg = new Organization();
                        $rtnReadOrg = $readOrg->READ_ORG();
                        ?>
                        <div class="form-group">
                            <label for="organization">Organization</label>
                            <?php if ($rtnReadOrg) { ?>
                                <select required name="organization" class="form-control" id="org-list" onchange="getPos(this.value);">
                                    <option value="<?php echo $rowNominee['org']; ?>"><?php echo $rowNominee['org']; ?></option>
                                    <?php while ($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                                        <option value="<?php echo $rowOrg['org']; ?>"><?php echo $rowOrg['org']; ?></option>
                                    <?php } ?>
                                </select>
                                <?php $rtnReadOrg->free(); ?>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <select required name="position" class="form-control" id="pos-list">
                                <option value="<?php echo $rowNominee['pos']; ?>"><?php echo $rowNominee['pos']; ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input required type="text" name="name" class="form-control" value="<?php echo $rowNominee['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="course">Course</label>
                            <select required name="course" class="form-control">
                                <option value="<?php echo $rowNominee['course']; ?>"><?php echo $rowNominee['course']; ?></option>
                                <option value="B.Sc">B.Sc</option>
                                <option value="HND">HND</option>
                                <option value="ND">ND</option>
                                <option value="NCE">NCE</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <select required name="year" class="form-control">
                                <option value="<?php echo $rowNominee['year']; ?>"><?php echo $rowNominee['year']; ?></option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stud_id">Admission Number.</label>
                            <input required type="text" name="stud_id" class="form-control" value="<?php echo $rowNominee['stud_id']; ?>">
                        </div>
                        <hr/>
                        <div class="form-group">
                            <input type="hidden" name="nom_id" value="<?php echo $rowNominee['id']; ?>">
                            <input type="submit" name="update" value="Update" class="btn btn-info">
                        </div>
                    </form>
                <?php } ?>
                <?php $rtnEditNominee->free(); ?>
            <?php } ?>
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