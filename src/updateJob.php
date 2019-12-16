<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $jobId = $_POST['update-job'];
    $job = $_POST['job'];
    $category = $_POST['category'];
    $due = $_POST['due'];
    

    // prepare and bind
    $stmt = $conn->prepare("UPDATE `jobs`
        SET `job` = (:job),
            `category` = (:category),
            `due` = (:due)
        WHERE `id` = (:id)");

    $stmt->bindParam(':job', $job);    
    $stmt->bindParam(':category', $category);    
    $stmt->bindParam(':due', $due);    
    $stmt->bindParam(':id', $jobId);

    $stmt->execute();
    header('Location: ../public/addNewJob.php');
} else {
    echo "That was not a POST, most likely GET";
}