<?php
    session_start();
    require_once "../src/templates/header2.php";

    echo "<div class='main-cont'>";

    require_once "../src/greeting.php";
    // require_once "../src/addJob.php";
    require_once "../src/printJobs.php";

    echo "</div>";

    require_once "../src/templates/footer.php";
?>