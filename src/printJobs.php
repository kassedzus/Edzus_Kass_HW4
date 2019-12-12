<?php
require_once 'db.php';
require_once "constants.php";

//we prepare a statement and execute it
$stmt = $conn->prepare("SELECT job, category, due FROM jobs  
                        WHERE (user_id = :user_id) ORDER BY due ASC");
$stmt->bindParam(':user_id', intval($_SESSION['id']));
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
        echo "<table class='row-column-names'>";
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<th class='table-head'> $key </th>";
        }
        $columnsPrinted = true;
        // echo "</table>"; 
        
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<td class='value-cell'>$value ";
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
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
?>