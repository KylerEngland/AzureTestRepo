<?php
session_start();
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
    <!-- Section-->
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <h1 class="justify-content-start fw-normal mb-0 text-black">Inventory Management System</h1>
                <div class="col-10">
                    <?php if (!isset($_SESSION['loggedin'])): ?>
                        <div>
                            <p>Unable to access due to inclomplete permissions.</p>
                        </div>
                    <?php else: ?>
                        <div class="text-center">
                            <p>Welcome to our inventory management system!</p>
                        </div>
                        <div class="text-center">
                            <form action="protected/logout.inc.php" method="post">
                                <button type="submit" class="btn btn-danger btn-block btn-lg">Logout</button>
                            </form>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                    </div>
                </div>
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