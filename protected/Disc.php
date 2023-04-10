<?php

class Disc
{
    private $id;
    private $name;
    private $imageName;
    private $brandCode;
    private $stabilityCode;
    private $quantity;
    private $price;
    private $flightNums;

    function __construct($id, $name, $imageName, $brandCode, $stabilityCode, $quantity, $price, $flightNums)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageName = $imageName;
        $this->brandCode = $brandCode;
        $this->stabilityCode = $stabilityCode;
        $this->quantity = $quantity;
        $this->$price = $price;
        $this->$flightNums = $flightNums;
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
        return $this->price;
    }
    public function getFlightNums(){
        return $this->flightNums;
    }

    public function outputCard()
    {
        $card .= '<form name="newPost" action="addToCart.php" method="post">
                        <div class="col mb-5">
                            <div class="card h-100">
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem">' . $this->getFlightNums() . '</div>
                                <img class="card-img-top" src="assets/img/' . $this->getImagename() . '.jpg" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">' . $this->getName() . '</h5>
                                        <p>' . $this->getBrandCode() . '</p>
                                        <h6>$' . $this->getPrice() . '</h6>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <button name="discID" class="btn btn-outline-dark mt-auto" type="submit" value="' . $this->getFlightNums() . '" >Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>';
        return $card;
    }
}
?>