<?php
function outputDiscs($discs){
    foreach($discs as $disc){
        echo $disc->outputCard();
    }
}

function outputCart($items){
    $foundOne = false;
    $item = '';
    while($row = mysqli_fetch_assoc($items)){
        
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