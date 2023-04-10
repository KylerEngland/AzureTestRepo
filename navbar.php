<?php
require_once('protected/DB.php');
require_once('protected/functions.inc.php');

$database = new DB;
$types = $database->getTypes();
$brands = $database->getBrands();
$stabilities = $database->getStabilities();

$inCartQuantity = $database->getInCartQuantity();
$quantity = mysqli_fetch_assoc($inCartQuantity);
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
                <img src="assets/img/logo2.png" alt="">
                <a class="navbar-brand" href="index.php">England Discs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            
                        <form action="index.php" method="get">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index.php">All Products</a>
                                    <li><hr class="dropdown-divider" /></li>

                                    <select class="dropdown-item form-select" name="type" onchange="this.form.submit()">
                                        <li><option value="" class="dropdown-item" href="#!">Types</option></li>
                                        <?php

                                        while($type = mysqli_fetch_assoc($types)){
                                            ?>
                                            <option value="<?=$type['typecode']?>"><?=$type['typename']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <li><hr class="dropdown-divider" /></li>
                                    <select class="form-select dropdown-item" name="brand" onchange="this.form.submit()">
                                        <li class="dropdown-item"><option value="" href="#!">Brands</option></li>
                                        <?php
                                        while($brand = mysqli_fetch_assoc($brands)){
                                            ?>
                                            <option value="<?=$brand['brandcode']?>"><?=$brand['brandname']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                    <li><hr class="dropdown-divider" /></li>
                                    <select class="form-select dropdown-item" name="stability" onchange="this.form.submit()">
                                        <li class="dropdown-item"><option value="" href="#!">Stability</option></li>
                                        <?php
                                        while($stability = mysqli_fetch_assoc($stabilities)){
                                            ?>
                                            <option value="<?=$stability['stabilitycode']?>"><?=$stability['stabilityname']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </ul>
                            </li>
                        </form>

                    </ul>
                    <div class="d-flex">
                        <a class="btn btn-outline-dark" href="cart.php">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?=$quantity['quantity']?></span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>