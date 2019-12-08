<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //we need to add song to database
    $job = $_POST['jobName'];
    $category = $_POST['jobCategory']; //FIXME when no artist exists
    $due = $_POST['jobDue'];

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO jobs (job, category, due)
                            VALUES (:job, :category, :due)");
    $stmt->bindParam(':job', $job);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':due', $due);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: ../public/addNewJob.php');
} else {
    echo "That was not a POST, most likely GET";
}