<?php

require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //we need to delete a job from database
    $job_id = $_POST['delete'];

    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM `jobs` WHERE `jobs`.`id` = (:id)");
    $stmt->bindParam(':id', $job_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: ../public/addNewJob.php');
} else {
    echo "That was not a POST, most likely GET";
}