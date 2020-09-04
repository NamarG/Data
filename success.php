<!-- includes header and nav -->
<?php

$title = "Submission";
require_once "includes/header.php";
require_once "includes/navbar.php";
require_once "Database/db_config.php";
require_once "send_email.php";

if (!isset($_POST["submit"])) {

    echo "<div class='pagecontentdiv'>";
    include "includes/errorMessage.php";
    echo "</div>";
} else {
    $mail= $_POST["email"];
    $fname= $_POST["firstname"];
    $lname=$_POST["lastname"];
    $dob=$_POST["datepicker"];
    $phone=$_POST["phone"];
    $speciality=$_POST["speciality"];


    $success = $crud->register($fname, $lname, $dob, $mail, $phone, $speciality);
    $specialityname = $crud->getSpecialityByID($speciality);
    

?>


    <div class="justify-content-md-center pagecontentdiv">



        <!-- php echo get from previous form -->
        <?php
        if ($success == TRUE) {
            SendEmail::SendMail($mail,"Successful Registration To Namars Site 2020","You Have Successfully Registered To Namar's Site for php tutorial");
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
        echo "<h2 class='gettext'>" . $specialityname["name"] . "</h2> <br> </div>";
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