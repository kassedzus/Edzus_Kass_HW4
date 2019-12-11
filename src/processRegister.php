<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['regUsername'];
    if (strlen($_POST['regPassword']) < 2) {
        echo "Password too short";
        die("Too short!");
    }
    if ($_POST['regPassword'] != $_POST['regPassword2']) {
        echo "Password mismatch";
    }
    // you could check if password matches certain format
    $hash = password_hash($_POST['regPassword'], PASSWORD_DEFAULT);
    //TODO add real users

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, hash)
                            VALUES (:username, :hash)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':hash', $hash);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: ../public/index.php');
} else {
    echo "That was not a POST, most likely GET";
}
?>