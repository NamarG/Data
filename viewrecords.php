<?php
// to make navbar item active for current page set as below
$viewrecords = "active";
$index = "";


$title = "View Attendees";
require_once "includes/header.php";
require_once "includes/navbar.php";
require_once "Database/db_config.php";


$results = $crud->getattendees();
$speciality = $crud->getspecialities();

?>

<div class="pagecontentdiv">
    <table class="table">
        <!-- table headings -->
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Speciality</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <!-- actual rows -->
        <?php
        while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

            <tr>
                <th><?php echo $r["attendee_id"] ?></th>
                <td><?php echo $r["firstname"] ?></td>
                <td><?php echo $r["lastname"] ?></td>
                <td><?php echo $r["name"] ?></td>
                <td>
                    <a class="btn btn-primary" href="view.php?id=<?php echo $r["attendee_id"] ?>">View</a>
                    <a class="btn btn-warning" href="edit.php?id=<?php echo $r["attendee_id"] ?>">Edit</a>
                    <a onclick="return confirm('are you sure you want to delete this record')" class="btn btn-danger" href="Delete.php?id=<?php echo $r["attendee_id"] ?>">Delete</a>
                </td>
            </tr>





        <?php
        }
        ?>



    </table>




</div>





<?php
require_once "includes/footer.php";
?>