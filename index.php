<!DOCTYPE html>
<html lang="en">
  <?php
    require_once "config/connection.php";
    
    include "views/fixed/head.php";
  ?>
<body>
  <?php
    include "views/fixed/menu.php";

    if(isset($_GET['page'])){
      switch($_GET['page'])
      {
        case 'products':
          include "views/pages/products.php";
          break;
        case 'aboutus':
          include "views/pages/aboutus.php";
          break;  
        case 'login':
          include "views/pages/login.php";
          break; 
        case 'admin':
          include "views/pages/admin.php";
          break;  
        case 'cart':
          include "views/pages/cart.php";
          break;    
        case 'user':
          include "views/pages/user.php";
          break;  
        case 'autor':
          include "views/pages/autor.php";
          break;   
        case '403':
          include "views/pages/403.php";
          break;   
      }
    } else {
      include "views/pages/pocetna.php";
    }

    include "views/fixed/futer.php";
    include "views/fixed/scripts.php";
  ?>
</body>
</html>

      