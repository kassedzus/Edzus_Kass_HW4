<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $jobId = $_POST['mark-done'];

    if($_POST['is-done'] == 1){
        $markedDone = 0;
    }elseif($_POST['is-done'] == 0){
        $markedDone = 1;
    }

    //$markedDone = ($_POST['is-done'] === 1)?0:1;

    // prepare and bind
    $stmt = $conn->prepare("UPDATE `jobs`
        SET `marked_done` = (:marked_done)
        WHERE `id` = (:id)");

    $stmt->bindParam(':marked_done', $markedDone);    
    $stmt->bindParam(':id', $jobId);

    $stmt->execute();
    header('Location: ../public/addNewJob.php');
} else {
    echo "That was not a POST, most likely GET";
}