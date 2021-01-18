<?php 

    require_once "Config/Autoload.php";
    use Model\User as User;

    $email = "user@myapp.com";
    $pass = "123456";


    if($_POST){
        if($_POST["username"] == $email){
            if($_POST['password'] == $pass){
                session_start();
                $loggedUser=new User();
                $loggedUser->setEmail($email);
                $loggedUser->setPassword($pass);
                $_SESSION['loggedUser']=$loggedUser;

                header("location:add-form.php");

            }else{
                echo "<script> if(confirm('Password incorrecto'));";
                echo "window.location = 'index.php';
                </script>";
            }

        }else{
            echo "<script> if(confirm('Email incorrecto'));";
            echo "window.location = 'index.php';
                </script>";
        }

    }else{
        echo "<script> if(confirm('Error en el método de envio de datos'));";
            echo "window.location = 'index.php';
            </script>";
    }
     
?>