<!-- includes header and nav -->
<?php

$title = "Edit Successful";
require_once "includes/header.php";
require_once "includes/navbar.php";
require_once "Database/db_config.php";

if (!isset($_POST["save"])) {
    echo "<div class='pagecontentdiv'>";
    include "includes/errorMessage.php";
    echo "</div>";
}else {
    // extract posts
    $id = $_POST["id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["datepicker"];
    $speciality_id = $_POST["speciality"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];


    $update = $crud->update($id, $firstname, $lastname, $dob, $email, $phone, $speciality_id);
?>


    <div class="pagecontentdiv">



        <!-- php echo get from previous form -->
        <?php
        if ($update == TRUE) {
            include "includes/successMessage.php";
        } else {
            include "includes/errorMessage.php";
        }



        echo "<div class='getline'><h2 class='gettext'> First Name: </h2>";
        echo "<h2 class='gettext'>" . ucwords($_POST["firstname"]) . "</h2> <br> </div>";
        echo "<div class='getline'> <h2 class='gettext'> Last Name: </h2> ";
        echo "<h2 class='gettext'>" .  ucwords($_POST["lastname"]) . "</h2> <br> </div>";
        echo "<div class='getline'> <h2 class='gettext'> Date Of Birth: </h2>";
        echo "<h2 class='gettext'>" . $_POST["datepicker"] . "</h2> <br> </div>";
        echo "<div class='getline'> <h2 class='gettext'> Speciality: </h2>";
        echo "<h2 class='gettext'>" . $_POST["speciality"] . "</h2> <br> </div>";
        echo "<div class='getline'> <h2 class='gettext'> Email Address: </h2>";
        echo "<h2 class='gettext'>" . $_POST["email"] . "</h2> <br> </div>";
        echo "<div class='getline'> <h2 class='gettext'> Contact Number: </h2>";
        echo "<h2 class='gettext'>" . $_POST["phone"] . "</h2> <br> </div>";

        ?>
    </div>


    <!-- includes footer -->
<?php
}
require_once "includes/footer.php";
?>