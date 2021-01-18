<?php
include('header.php');
include('nav.php');

session_start();

if(!isset($_SESSION['loggedUser'])){
     header("location:index.php");
}

require_once "Config/Autoload.php";

use Model\Shoe as Shoe;
use Repository\ShoeRepository as ShoeRep;

$repo= new ShoeRep();
$shoes= $repo->getAll();
asort($shoes);

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Calzados</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>Id</th>
                         <th>Name</th>
                         <th>Brand</th>
                         <th>Category</th>
                         <th>Price</th>
                    </thead>
                    <tbody>
                    <?php foreach($shoes as $shoe){?>
                         <tr>
                              <td><?php echo $shoe->getId();?></td>
                              <td><?php echo $shoe->getName();?></td>
                              <td><?php echo $shoe->getBrand();?></td>
                              <td><?php echo $shoe->getCategory();?></td>
                              <td><?php echo $shoe->getPrice();?></td>
                         </tr>    
                    <?php } ?>             
                    </tbody>
               </table>
          </div>
     </section>
</main>

<?php include('footer.php') ?>
