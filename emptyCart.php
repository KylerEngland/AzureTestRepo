<?php
    require_once('protected/DB.php');
    $database = new DB;
    $item = $database->emptyCart();
    header('Location: thanks.php');
?>