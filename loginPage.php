<?php
include_once('navbar.php');

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
    <!-- Section-->
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="container px-4 px-lg-5">
                            <div class="container px-4 px-lg-5">
                                <!-- Pills navs -->
                                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tab-login" data-bs-toggle="pill"
                                            href="#pills-login" role="tab" aria-controls="pills-login"
                                            aria-selected="true">Login</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tab-register" data-bs-toggle="pill"
                                            href="#pills-register" role="tab" aria-controls="pills-register"
                                            aria-selected="false">Registration</a>
                                    </li>
                                </ul>
                                <!-- Pills navs -->

                                <!-- Pills content -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel"
                                        aria-labelledby="tab-login">
                                        <form action="protected/authenticate.inc.php" method="post">
                                            <p class="text-center">Existing profiles:</p>

                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" id="loginName" class="form-control"
                                                    name="loginEmail" />
                                                <label class="form-label" for="loginName">Email</label>
                                                <!-- ili korisničko ime -->
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <input type="password" id="loginPassword" class="form-control"
                                                    name="loginPass" />
                                                <label class="form-label" for="loginPassword">Password</label>
                                            </div>

                                            <!-- Submit button -->
                                            <div class="d-flex justify-content-between mb-4">
                                                <div class="p-2">
                                                    <button type="submit"
                                                        class="btn btn-danger btn-block mb-4">Login</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-register" role="tabpanel"
                                        aria-labelledby="tab-register">
                                        <form action="protected/register.inc.php" method="post" autocomplete="off">

                                            <p class="text-center">New profile:</p>

                                            <!-- Name input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="registerName" class="form-control"
                                                    name="registerName" />
                                                <label class="form-label" for="registerName">Name</label>
                                            </div>

                                            <!-- Username input -->
                                            <div class="form-outline mb-4">
                                                <input type="text" id="registerLastName" class="form-control"
                                                    name="registerLastName" />
                                                <label class="form-label" for="registerLastName">Last Name</label>
                                            </div>

                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" id="registerEmail" class="form-control"
                                                    name="registerEmail" />
                                                <label class="form-label" for="registerEmail">Email</label>
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <input type="password" id="registerPassword" class="form-control"
                                                    name="registerPassword" />
                                                <label class="form-label" for="registerPassword">Password</label>
                                            </div>

                                            <!-- Submit button -->
                                            <button type="submit"
                                                class="btn btn-danger btn-block mb-3">Register</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Pills content -->
                            </div>
                        </div>

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