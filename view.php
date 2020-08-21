<?php
$title = "View Record";
require_once "includes/header.php";
require_once "includes/navbar.php";
require_once "Database/db_config.php";


if (!isset($_GET['id'])) {
    echo "<h1 id='errormessage'>Please Check Details And Try Again</h1>";
} else {

    $id = $_GET['id'];
    $details = $crud->getattendeesdetails($id);


?>
    <div class="pagecontentdiv">

        <div class="row justify-content-md-center">

            <div class="card col-4" style="width: 18rem;">
                <div class="card-body v">
                    <h5 class="card-title"><?php echo $details["firstname"] . " " . $details['lastname'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $details["name"] ?></h6>
                    <p class="card-text"><?php echo $details["dateofbirth"] . "<br>" . $details["email"] . "<br>" . $details['phone'] ?></p>
                    <a class="btn btn-warning" href="edit.php?id=<?php echo $details["attendee_id"] ?>">Edit</a>
                    <a onclick="return confirm('are you sure you want to delete this record')" class="btn btn-danger" href="delete.php?id=<?php echo $details["attendee_id"] ?>">Delete</a>
                </div>
                <a class="btn btn-primary" href="viewrecords.php">Back To List</a>
            </div>


        </div>

    </div>


<?php
}
require_once "includes/footer.php";
?>