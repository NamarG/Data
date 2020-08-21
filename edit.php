<?php
// to make navbar item active for current page set as below
$viewrecords = "";
$index = "active";


$title = "Index";
require_once "includes/header.php";
require_once "includes/navbar.php";
require_once "Database/db_config.php";
if(!isset($_GET['id'])){
    echo "<h1>Error</h1>";
}else{
$result = $crud->getspecialities();
$attendee = $crud->getattendeesdetails($_GET['id']);
?>



<div class="pagecontentdiv">

    <h1 class="text-center">Registration </h1>


    <form method="post" action="editpost.php">
        <!-- hidden input of attendee id to send to update page -->
        <input name="id"  type="hidden" value="<?php echo $attendee['attendee_id'] ?>"></input>
        <!-- firstname -->
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" value="<?php echo $attendee['firstname'] ?>" name="firstname">
        </div>

        <!-- lastname -->
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendee['lastname'] ?>" placeholder="Enter Last Name">
        </div>

        <!-- dob -->
        <div class="form-group">
            <label for="DOB">Date Of Birth</label>
            <input type="text" class="form-control" id="datepicker" name="datepicker" value="<?php echo $attendee['dateofbirth'] ?>" placeholder="Select DOB">
        </div>

        <!-- speciality -->
        <div class="form-group">
            <label for="Speciality">Speciality</label>
            <select class="form-control" id="speciality" name="speciality"  >
                <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $r["speciality_id"] ?>" <?php if($r['speciality_id'] == $attendee['speciality_id']){echo 'selected';} ?>><?php echo $r["name"]?></option>
                <?php
                }
                ?>
            </select>

        </div>

        <!-- email -->

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailhelp" placeholder="Enter Email Address" value="<?php echo $attendee['email'] ?>">
            <small id="emailhelp" class="form-text text-muted">We will never share your email with anyone else.</small>
        </div>

        <!-- contact number -->
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailhelp" placeholder="Enter Contact Number" value="<?php echo $attendee['phone'] ?>">
            <small id="phonehelp" class="form-text text-muted">We will never share your contactnumber with anyone else.</small>
        </div>


        <!-- button to submit -->
        <button name="save" type="submit" class="btn btn-success btn-block">Save Changes</button>

    </form>

   
</div>


<?php
}
require_once "includes/footer.php";
?>