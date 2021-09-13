<?php zabeleziPristupStranici(); ?>
<div id="welcome" class="p-5">
        <div id="welcometext">
            <h1 class="p-5">Welcome</h1>
            <h2 class="p-1">to</h2>
            <h1 class="p-5">Mobi Shop</h1>
         </div>
</div>
<div class="container-fluid" id="topProizvodi">
  <h3 class="text-center text-white pt-2">Our most selled products</h3>

    <?php 
      include "models/proizvodi/showTopProducts.php";
    ?>

  <p class="text-center p-2 m-0"><a class="text-white" href="index.php?page=products">See All</a></p>
</div>

<div class="container-fluid p-0" id="us" > 
  <div class="row m-0">
    <div class="col-sm-12 col-md-6 col-lg-6">
      <h3 class="p-3 text-center">About Us</h3>
      <p class="text-center">We are a small local store placed in the center of Delridge, Seattle</p>
      <p class="text-center">Meet Our Team</p>
      <ul class="text-center p-2 mt-2 list-inline" id="crew1">
        <?php 
          include "views/parts/showCrew.php";
        ?>
      </ul>
      <a class="text-white" href="index.php?page=aboutus">See more</a>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
      <h3 class="p-3 text-center">In our shop you can buy</h3>
      <ul class="text-center p-4 mt-2"id="buy">
        <?php 
          include "views/parts/showBrand.php";
        ?>  
      </ul>
    </div>   
  </div>
</div>  

<div class="container-fluid" id="services">
  <div class="row m-0">
    <div class="col-md-6 col-sm-12 pt-2">
      <h4 class="text-center p-3">We also provide phone repair services</h4>
      <p class="text-center p-3">If your phone has a broken screen, silly virus who won't leave you alone or you simply can't turn it on, come by our store and we can help you!</p>
      <p class="text-center p-1">Our Adress: 7712 Delridge Way SW</p>
      <p class="text-center p-3">Or if you don't have time to stop by, fill up the form and send us a message. We will do our best to help you as soon as possible!</p>
      <p class="text-center">
        <a class="text-white p-3 icons" href="#"><i class="fab fa-facebook fa-2x"></i></a>
        <a class="text-white p-3 icons" href="#"><i class="fab fa-instagram fa-2x"></i></a>	
        <a class="text-white p-3 icons" href="#"><i class="fas fa-at fa-2x"></i></a>
        <a class="text-white p-3 icons" href="#"><i class="fab fa-whatsapp fa-2x" ></i></a>
      </p>
    </div>
    <div class="col-md-6 col-sm-12 pt-2">
    <?php 
          include "models/kontakt/kontaktForma.php";
        ?>  
    </div>
  </div>
  <div class="row m-0 justify-content-end">
    <div class="col-md-6 col-sm-12 pt-2" id="err"> 
        
    </div>
  </div>
</div>


