<?php

namespace Model;

class Shoe{

    private $id;
    private $name;
    private $brand;
    private $category;
    private $price;

    public function _construct (){}

    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getBrand(){return $this->brand;}
    public function getCategory(){return $this->category;}
    public function getPrice(){return $this->price;}
    public function setId($id){$this->id=$id;}
    public function setName($name){$this->name=$name;}
    public function setBrand($brand){$this->brand=$brand;}
    public function setCategory($category){$this->category=$category;}
    public function setPrice($price){$this->price=$price;}

}
?>