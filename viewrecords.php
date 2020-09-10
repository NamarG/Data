<?php
// to make navbar item active for current page set as below
$viewrecords = "active";
$index = "";
$title = "View Attendees";
require_once "includes/header.php";
require_once "includes/navbar.php";
// include check of authorisation code, in this we check if session id isset or not and if not then re-direct to login page
require_once "includes/auth_check.php";

// db config file setup of db and instantiation of classes to access db
require_once "Database/db_config.php";


$results = $crud->getattendees();

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
                <th scope="col">Profile Picture</th>
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
                <td><img class='avatarviewrecords' src='<?php echo empty($r["avatar_path"])? "img/defaultavatar.jpg":$r["avatar_path"] ?>' alt=''> </td>
                <td>
                    <a class="btn btn-primary" href="view.php?id=<?php echo $r["attendee_id"] ?>">View</a>
                    <a class="btn btn-warning" href="edit.php?id=<?php echo $r["attendee_id"] ?>">Edit</a>
                    <!-- alternate image not working as we have a path for image even when no image uploaded -->
                    <a onclick="return confirm('are you sure you want to delete this record')" class="btn btn-danger" href="delete.php?id=<?php echo $r["attendee_id"] ?>">Delete</a>
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