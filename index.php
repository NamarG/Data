<?php
// index
// to make navbar item active for current page set as below
$viewrecords = "";
$index = "active";


$title = "Index";
require_once "includes/header.php";
require_once "includes/navbar.php";
require_once "Database/db_config.php";

$result = $crud->getspecialities();
?>



<div class="pagecontentdiv">

    <h1 class="text-center">Registration </h1>


    <form method="post" action="success.php" enctype="multipart/form-data">
        <!-- firstname -->
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
        </div>

        <!-- lastname -->
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
        </div>

        <!-- dob -->
        <div class="form-group">
            <label for="DOB">Date Of Birth</label>
            <input required type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Select DOB">
        </div>

        <!-- speciality -->
        <div class="form-group">
            <label for="Speciality">Speciality</label>
            <select class="form-control" id="speciality" name="speciality">
                <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r["speciality_id"] ?>"><?php echo $r["name"]?></option>
                <?php
                }
                ?>
            </select>

        </div>

        <!-- email -->

        <div class="form-group">
            <label for="email">Email Address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailhelp" placeholder="Enter Email Address">
            <small id="emailhelp" class="form-text text-muted">We will never share your email with anyone else.</small>
        </div>

        <!-- contact number -->
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailhelp" placeholder="Enter Contact Number">
            <small id="phonehelp" class="form-text text-muted">We will never share your contactnumber with anyone else.</small>
        </div>

        <!-- Profile Picture-->
        <label>Upload Image(Optional)</label>
        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" name="avatar">
            <label class="custom-file-label" for="Avatar">Choose File</label>
        </div>


        <!-- button to submit -->
        <div class="form-group indexsubmitbutton">
        <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>

    </form>


</div>


<?php
require_once "includes/footer.php";
?>
