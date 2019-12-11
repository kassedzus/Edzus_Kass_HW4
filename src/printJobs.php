<?php
require_once 'db.php';
require_once "constants.php";

//we prepare a statement and execute it
$stmt = $conn->prepare("SELECT id, job, category, due FROM jobs ORDER BY due ASC");
$stmt->execute();

// set the resulting array to associative
$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//we store the results in memory, might not be best for large results
$allRows = $stmt->fetchAll();

//finally we can print the results
echo BR;
echo BR;
echo "<h2>Current Jobs</h2>";
echo "<div class='job-container'>";
$columnsPrinted = false; //for column names
foreach ($allRows as $row) {
    if (!$columnsPrinted) {
        echo "<div class='row-column-names'>";
        foreach ($row as $key => $value) {
            echo "<span class='column-name'> $key </span>";
        }
        $columnsPrinted = true;
        echo "</div>";
        echo HR;
    }
    echo "<div class='row-job'>";
    foreach ($row as $key => $value) {
        echo "<div class='value-cell'>$value </div>";

    }
    echo "<div class='dropdown'>";
        echo "<button class='dropbtn'><i class='fa fa-cog' aria-hidden='true'></i></button>";
            echo "<div class='dropdown-content'>";
                echo "<button id='doneBtn' value='" . $row['id'] . "'>Mark as done</button><br>";
                echo "<button id='updateBtn'>Update</button> <br>";
                echo "<form action='../src/deleteJob.php' method='post'>";
                echo "<button name='delete' value='" .$row['id'] . " 'id='deleteBtn'>Delete</button>";
                echo "</form>";
            echo "</div>";
    echo "</div>";


    // echo "<form action='../src/deleteJob.php' method='post'>";
    // echo "<button name='delete' value='" . $row['id'] . "'>Delete</button>";
    // echo "</form>";
    echo "</div>";
    echo HR;
}
echo "</div>";
?>