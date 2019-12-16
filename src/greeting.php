<?php
session_start();
echo "<h1>Hi, " . $_SESSION['username'] . ". Take a look at your task list.</h1>";