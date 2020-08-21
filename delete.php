<?php
require_once "includes/header.php";
require_once "includes/navbar.php";
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