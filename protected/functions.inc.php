<?php
function outputDiscs($discs){
    foreach($discs as $disc){
        echo $disc->outputCard();
    }
}

function outputCart($discs){

    foreach($discs as $disc){
        echo $disc->outputCart();
    }
}
?>