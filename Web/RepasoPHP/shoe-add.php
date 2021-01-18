<?php 
require_once "Config/Autoload.php";
use Model\Shoe as Shoe;
use Repository\ShoeRepository as ShoeRep;


if($_POST){
    $newShoe = new Shoe();
    $newShoe->setId($_POST['id']);
    $newShoe->setName($_POST['name']);
    $newShoe->setBrand($_POST['brand']);
    $newShoe->setCategory($_POST['category']);
    $newShoe->setPrice($_POST['price']);

    $repoShoe= new ShoeRep();
    $repoShoe->add($newShoe);

    header("location:add-form.php");

}
?>