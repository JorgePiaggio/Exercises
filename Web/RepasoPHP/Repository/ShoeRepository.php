<?php

namespace Repository;

use Model\Shoe as Shoe;
use Repository\IShoeRepository as IShoeRepository;

class ShoeRepository implements IShoeRepository{

    private $shoeList;
    private $fileName;

    public function __construct(){
        $this->fileName= dirname(__DIR__)."/Data/shoes.json";
    }

    public function add(Shoe $shoe){
        $this->retrieveData();
        array_push($this->shoeList, $shoe);
        $this->saveData();
    }

    public function getAll(){
        $this->retrieveData();
        return $this->shoeList;
    }

    private function saveData(){
        $arrayToEncode = array();

        foreach($this->shoeList as $shoe){
            $valuesArray['id']=$shoe->getId();
            $valuesArray['name']=$shoe->getName();
            $valuesArray['brand']=$shoe->getBrand();
            $valuesArray['category']=$shoe->getCategory();
            $valuesArray['price']=$shoe->getPrice();
            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent= json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);

    }


    private function retrieveData(){
        $this->shoeList=array();

        if(file_exists($this->fileName)){
            $jsonContent = file_get_contents($this->fileName);
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $valuesArray){
                $shoe = new Shoe();
                $shoe->setId($valuesArray['id']);
                $shoe->setName($valuesArray['name']);
                $shoe->setBrand($valuesArray['brand']);
                $shoe->setCategory($valuesArray['category']);
                $shoe->setPrice($valuesArray['price']);
                array_push($this->shoeList, $shoe);
            }
        }
    }

}
?>