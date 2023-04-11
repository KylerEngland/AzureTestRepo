<?php

class Disc
{
    private $id;
    private $name;
    private $imageName;
    private $brandName;
    private $brandCode;
    private $stabilityCode;
    private $quantity;
    private $prices;
    private $flightNumbers;

    function __construct($id, $name, $imageName, $brandName, $brandCode, $stabilityCode, $quantity, $prices, $flightNumbers)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageName = $imageName;
        $this->brandName = $brandName;
        $this->brandCode = $brandCode;
        $this->stabilityCode = $stabilityCode;
        $this->quantity = $quantity;
        $this->prices = $prices;
        $this->flightNumbers = $flightNumbers;
    }

    public function getID()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getImageName()
    {
        return $this->imageName;
    }
    public function getBrandName()
    {
        return $this->brandName;
    }

    public function getBrandCode()
    {
        return $this->brandCode;
    }
    public function getStabilityCode()
    {
        return $this->stabilityCode;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getPrice()
    {
        return $this->prices;
    }
    public function getFlightNums(){
        return $this->flightNumbers;
    }

    public function outputCard()
    {
        $card .= '<form name="newPost" action="addToCart.php" method="post">
                        <div class="col mb-5">
                            <div class="card h-100">
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem">' . $this->getFlightNums() . '</div>
                                <img class="card-img-top" src="assets/img/' . $this->getImageName() . '.jpg" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">' . $this->getName() . '</h5>
                                        <p>' . $this->getBrandName() . '</p>
                                        <h6>$' . $this->getPrice() . '</h6>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <button name="discID" class="btn btn-outline-dark mt-auto" type="submit" value="' . $this->getID() . '" >Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>';
        return $card;
    }

    public function outputCart(){
        $discs .= '
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="assets/img/' . $this->getImageName(). '.jpg" class="img-fluid rounded-3">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">' . $this->getName(). '</p>
                                    <p>Brand: <span class="text-muted">' . $this->getBrandCode() . '</span> Stability: <span class="text-muted">' . $this->getStabilityCode() . '</span></p>
                                </div>
                    
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">Quantity</p>
                                    <p class="text-muted">' . $this->getQuantity() . '</p>
                                </div>
                    
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">$' . $this->getPrice() . '</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>';
        return $discs;
    }
}
?>