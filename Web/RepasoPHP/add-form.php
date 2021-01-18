<?php
include('header.php');
include('nav.php');

session_start();
if(!isset($_SESSION['loggedUser'])){
     header("location: index.php");
}


?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <form method="post" action="shoe-add.php">
          <div class="container">
               <h3 class="mb-3">Agregar Calzado</h3>

               <div class="bg-light p-4">
                    <div class="row">
                         <div class="col-lg-4">
                              <label for="">Id</label>
                              <input type="number" name="id" class="form-control form-control-ml" required value="">
                         </div>                         

                         <div class="col-lg-4">
                              <label for="">Name</label>
                              <input type="text" name="name" class="form-control form-control-ml" required value="">
                         </div>

                         <div class="col-lg-4">
                              <label for="">Brand</label>
                              <select name="brand" id="brand">
                              <option value="nike">Nike</option>                        
                              <option value="adidas">Adidas</option>                        
                              <option value="reebok">Reebok</option>       
                              </select>                 
                         </div>

                         <div class="col-lg-4" >
                              <label for="">Category</label>
                              <input type="radio" id="deportivo" value="deportivo" name="category">
                              <label for="deportivo">Deportivo</label>
                              <input type="radio" id="urbano" value="urbano" name="category">
                              <label for="urbano">Urbano</label>
                              <input type="radio" id="formal" value="formal" name="category">
                              <label for="formal">Formal</label>
                         </div>                         

                         <div class="col-lg-4">
                              <label for="">Price</label>
                              <input type="number" name="price" min="100" max= "5000" class="form-control form-control-ml" required value="">
                         </div>

                         <div class="col-lg-4">
                              <span>&nbsp;</span>
                              <button type="submit" name="" class="btn btn-primary ml-auto d-block">Agregar</button>
                         </div>

                    </div>                    
               </div>
          </div>
          </form>
     </section>
</main>

<?php include('footer.php') ?>
