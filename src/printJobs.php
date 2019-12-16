<?php
require_once 'db.php';
require_once "constants.php";

if(isset($_GET['filter'])){
    switch($_GET['filter']){
        case 'today':
            $filterFrom = Date('Y-m-d 00:00:00');
            $filterTo = Date('Y-m-d 23:59:59');
        break;
        case 'this-week':
            $filterFrom = Date('Y-m-d h:i:s', strtotime("last Monday"));
            $filterTo = Date('Y-m-d h:i:s', strtotime("this Sunday"));
        break;
        case 'this-month':
            $filterFrom = Date('Y-m-01 00:00:00');
            $filterTo = Date('Y-m-t 23:59:59');
        break;
        default : 
        $filterFrom = Date('1800-01-01 00:00:00');
        $filterTo = Date('3000-01-01 23:59:59');
    break;
}
}else{
    $filterFrom = Date('1800-01-01 00:00:00');
    $filterTo = Date('3000-01-01 23:59:59');
}

//we prepare a statement and execute it
$stmt = $conn->prepare("SELECT id, job, category, due, marked_done FROM jobs  
WHERE (user_id = :user_id) AND
due BETWEEN :filter_from AND :filter_to
ORDER BY due ASC") ;

$stmt->bindParam(':user_id', intval($_SESSION['id']));
$stmt->bindParam(':filter_from', $filterFrom, PDO::PARAM_STR);
$stmt->bindParam(':filter_to', $filterTo, PDO::PARAM_STR);
$stmt->execute();

$shownColumns = array("job", "category", "due");

// set the resulting array to associative
$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//we store the results in memory, might not be best for large results
$allRows = $stmt->fetchAll();

//finally we can print the results
echo BR;
echo "<h2>Current Jobs</h2>";
echo "<div class='filters'>
<a href='?' class='filter'>All</a>
<a href='?filter=today' class='filter'>Today</a>
<a href='?filter=this-week' class='filter'>This week</a>
<a href='?filter=this-month' class='filter'>This month</a>
</div>";
echo BR;
echo "<div class='job-container'>";
$columnsPrinted = false; //for column names
foreach ($allRows as $row) {
    if (!$columnsPrinted) {
        echo "<table class='row-column-names'>";
        echo "<tr>";
        foreach ($row as $key => $value) {
            if(in_array($key, $shownColumns)) {
                echo "<th class='table-head'> $key </th>";
            }
        }
        echo "<th></th>";
        $columnsPrinted = true;
        // echo "</table>"; 
        
    }
    if ($row['marked_done'] == 1) {
        $special = "job-style-done";
    } else {
        $special = "job-style-null";
    }
    
    
    
    if(strtotime($row['due']) < strtotime(Date('Y-m-d h:i:s'))){
        $special .= " job-style-past";
    }
    
    echo "</tr>";
    echo "<tr class='$special job-row' id='row_".$row['id']."'>";
    foreach ($row as $key => $value) {
        if (in_array($key, $shownColumns)) {
            echo "<td class='value-cell'><div class='value value-".$key."' attr-value='".$value."'>$value </div></td>";
        }
    }
    
    if($row['marked_done'] == 1){
        $buttonLabel = "Mark as undone";
    }else{
        $buttonLabel = "Mark as done";
    }
    echo "<td>";
    echo "<div class='action-buttons'>";
    echo "<form action='../src/updateJob.php' method='post'>";
    echo "<input name='job' type='hidden' value='".$row['job']."'>";
    echo "<input name='category' type='hidden' value='".$row['category']."'>";
    echo "<input name='due' type='hidden' value='".$row['due']."'>";
    echo "<button type='submit' name='update-job' class='updateBtn' value=".$row['id'].">Update</button> <br>";
    echo "<button value=".$row['id']." class='cancelBtn' value=''>Cancel</button> <br>";
    echo "</form>";
    echo "</div>";
    echo "<div class='dropdown'>";
    echo "<button class='dropbtn'><i class='fa fa-cog' aria-hidden='true'></i></button>";
    echo "<div class='dropdown-content'>";
    echo "<form action='../src/updateDone.php' method='post'>";
    echo "<input name='is-done' type='hidden' value='".$row['marked_done']."'>";
    echo "<button class='doneBtn' name='mark-done' value='" . $row['id'] . "'>".$buttonLabel."</button><br>";
    echo "</form>";
    echo "<button class='updateBtn' value=".$row['id'].">Update</button> <br>";
    echo "<form action='../src/deleteJob.php' method='post'>";
    echo "<button name='delete' value='" . $row['id'] . " 'class='deleteBtn'>Delete</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
    
}
echo "</table>";
echo "</div>";
?>