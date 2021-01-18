<?php 

namespace Repository;
use Model\Shoe as Shoe;

interface IShoeRepository{

    function add(Shoe $student);
    function getAll();
    
}
?>