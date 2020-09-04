<?php
require_once "includes/header.php";
require_once "includes/navbar.php";
// include check of authorisation code, in this we check if session id isset or not and if not then re-direct to login page
require_once "includes/auth_check.php";

require_once "Database/db_config.php";

if (!isset($_GET['id'])) {
    echo "<div class='pagecontentdiv'>";
    include "includes/errorMessage.php";
    echo "</div>";
} else {

    $id = $_GET['id'];
    $details = $crud->getattendeesdetails($id);
    $execute = $crud->deleteattendee($id);
?>
    <div class="pagecontentdiv">

        <?php
            if ($execute == TRUE) {
                include "includes/successMessage.php";
            } else {
                include "includes/errorMessage.php";
            }
        ?>
    </div>

<?php

}
?>