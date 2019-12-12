<?php
session_start();
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //we need to add song to database
    $job = $_POST['jobName'];
    $category = $_POST['jobCategory'];
    $due = $_POST['jobDue'];
    $user_id = $_SESSION['id'];
    
    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO jobs (job, category, due, user_id)
                            VALUES (:job, :category, :due, :user_id)");
    $stmt->bindParam(':job', $job);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':due', $due);
    $stmt->bindParam(':user_id', $user_id);


    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: ../public/addNewJob.php');
} else {
    echo "That was not a POST, most likely GET";
}
?>