
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php 
    if(isset($_GET['page'])){
        switch($_GET['page'])
        {
          
          case 'products':
            echo "<title>Products - Mobile Shop</title>
                  <meta name='description' content='See the list of all products available in our store!'>
                  <meta name='keywords' content='mobile, shop, phone, products'>";
            break;
          case 'aboutus':
            echo "<title>About Us - Mobile Shop</title>
            <meta name='description' content='Meet our shop crew who will help you with any problem!'>
            <meta name='keywords' content='mobile, shop, phone, about us'>";
            break;  
          case 'login':
            echo "<title>Login - Mobile Shop</title>
            <meta name='description' content='Login and enjoy your shopping!'>
            <meta name='keywords' content='mobile, shop, phone, login'>";
            break; 
          case 'admin':
            echo "<title>Admin - Mobile Shop</title>
            <meta name='description' content='Admin page!'>
            <meta name='keywords' content='mobile, shop, phone, admin'>";
            break;  
          case 'cart':
            echo "<title>Cart - Mobile Shop</title>
            <meta name='description' content='Here you can see products in your cart, ready for purchase!'>
            <meta name='keywords' content='mobile, shop, phone, cart'>";
            break;    
          case 'user':
            echo "<title>".$_SESSION['korisnik']->firstName." - Mobile Shop</title>
            <meta name='description' content='Here you can see your past purchases!'>
            <meta name='keywords' content='mobile, shop, phone, purchases'>";
            break;  
          case 'autor':
            echo "<title>Author - Mobile Shop</title>
            <meta name='description' content='Find out something about author of this site.'>
            <meta name='keywords' content='about me, autor'>";
            break;    
        }
      } else {
          echo "<title>Mobile Shop</title>
          <meta name='description' content='Welcome to Mobi Shop!'>
          <meta name='keywords' content='mobile, shop, phone, index'>";
      }

?>

    
    
    <meta name="robots" content="index, follow" />
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Calligraffitti|Ruda&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6a571d5020.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
</head>