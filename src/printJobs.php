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
        echo "<span class='value-cell'>$value </span>";

    }
    echo "<form action='../src/deleteJob.php' method='post'>";
    echo "<button name='delete' value='" . $row['id'] . "'>Delete</button>";
    echo "</form>";
    echo "</div>";
    echo HR;
}
echo "</div>";