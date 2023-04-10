<?php
require_once('protected/DB.php');

function outputDiscs($discs){
    $foundOne = false;
    $disc = '';
    while($row = $discs->fetch()){
        $foundOne = true;
        $disc .=    '<form name="newPost" action="addToCart.php" method="post">
                        <div class="col mb-5">
                            <div class="card h-100">
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem">' . $row['flightnums'] . '</div>
                                <img class="card-img-top" src="assets/img/' . $row['imgname'] . '.jpg" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">' . $row['name'] . '</h5>
                                        <p>' . $row['brandname'] . '</p>
                                        <h6>$' . $row['price'] . '</h6>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <button name="discID" class="btn btn-outline-dark mt-auto" type="submit" value="' . $row['id'] . '" >Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>';
    }
    if($foundOne){
        return $disc;
    }
    return 'No posts found';
}

function outputCart($items){
    $foundOne = false;
    $item = '';
    while($row = $items->fetch()){
        $foundOne = true;
        $item .= '
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="assets/img/' . $row['imagename'] . '.jpg" class="img-fluid rounded-3">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">' . $row['discname'] . '</p>
                                    <p>Brand: <span class="text-muted">' . $row['brandcode'] . '</span> Stability: <span class="text-muted">' . $row['stabilitycode'] . '</span></p>
                                </div>
                    
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">Quantity</p>
                                    <p class="text-muted">' . $row['quantity'] . '</p>
                                </div>
                    
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">$' . $row['price'] . '</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
    if($foundOne){
        return $item;
    }
    return 'Cart is currently empty.';
}
?>