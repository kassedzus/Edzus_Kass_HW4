<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TO-DO APP</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../public/scripts/register.js" defer></script>
</head>
<body>
<div id="page-container">
    <header class="header">
            <a href="../public/index.php"><div id="app-logo"></div></a>
            <h3 class="brand">Checklist<sup>&copy;</sup></h3>
            <div class="searcbar" style="display:none">
                <input type="text" name="seaarchbar" id="search-input" placeholder="Search..">
                <!-- <button type="submit" class="searchButton" onclick="myFunction()"><i class="fa fa-search"></i></button> -->
            </div>
            <div class="toolBtns" style="display:none">
            <a href="../public/addNewJob.php"><div class="new-job"></div></a>
            <a href="../src/processLogout.php"><div class="logoutBtn"></div></a>
            </div>
    </header>
   <div id="content-wrap">
        
