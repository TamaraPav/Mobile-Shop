<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<?php 
    if(isset($_GET['page'])){
        switch($_GET['page'])
        {
          case 'products':
            echo "<script src='assets/js/addToCart.js'></script>";
            break;
          case 'login':
            echo "<script src='assets/js/prijava.js'></script>
            <script src='assets/js/registracija.js'></script>";
            break; 
          case 'admin':
            echo "<script src='assets/js/admin.js'></script>";
            break;  
          case 'cart':
            echo "<script src='assets/js/cart.js'></script>";
            break;      
        }
      }
      else{
        echo "<script src='assets/js/form.js'></script>";
      }
?>









