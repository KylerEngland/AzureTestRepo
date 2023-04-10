<?php
require_once('protected/database.php');
require_once('protected/functions.inc.php');

$database = new DB;
$discs = $database->getContent();
// $database = new database;
// $discs = $database->getDiscsUnfiltered();
// if($_GET == NULL){
// }else{
//     $discs = $database->getFilteredContent($_GET['type'], $_GET['brand'], $_GET['stability']);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>England Discs</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php include_once('navbar.php'); ?>
    <!-- Header-->
    <header class="card text-center text-white">
        <img src="assets/img/background.jpg" class="card-img" alt="">
        <div class="card-img-overlay my-5">
            <h1 class="display-4 fw-bolder">Only the best discs</h1>
            <p class="lead fw-normal text-white-50 mb-0">For all your disc golf needs</p>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?=outputDiscs($discs);?>

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; England Discs 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>