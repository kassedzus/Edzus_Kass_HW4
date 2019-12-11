<?php
session_start();
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // prepare and bind
    $stmt = $conn->prepare("SELECT id, hash FROM users
            WHERE (username = :username)");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //we store the results in memory, might not be best for large results
    $allRows = $stmt->fetchAll();
    // var_dump($allRows);
    // print_r(count($allRows));
    if (count($allRows) > 0) {
        $hash = $allRows[0]['hash'];
        // print_r($hash);

        if (password_verify($password, $hash)) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = (int) $allRows[0]['id'];
            header('Location: ../public/addNewJob.php');
        } else {
            echo "<br>Login Failed";
        }
    }

    // header('Location: ../public/addNewJob.php');

}
?>