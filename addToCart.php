<?php
    require_once('protected/DB.php');
    $database = new DB;
    $item = $database->addToCart($_POST['discID']);
    header('Location: index.php');
?>