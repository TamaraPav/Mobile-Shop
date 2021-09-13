<div class="container-fluid navbar navbar-expand-sm navbar-dark bg-dark white-text">
        <a class="navbar-brand" href="index.php"><i class="fas fa-mobile-alt mr-1"></i>Mobile Shop</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#meni" aria-controls="meni" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="meni">
            <?php 
                require_once "config/connection.php";
                

                $upit = "select * from menu";
                $rezultat = $konekcija->query($upit);

                if($rezultat) {
                    $rez = $rezultat->fetchAll();
                    //var_dump($rez);
                    $ispis = "<ul class='navbar-nav ml-auto'>";
                     foreach($rez as $red){
                        $ispis .="<li class='nav-item'>
                        <a class='nav-link' href=".$red->href.">".$red->text."</a>
                    </li>";
                    }
                    if(isset($_SESSION['korisnik'])) {
                            $ispis.="<li class='nav-item'><a
                        class='nav-link' href='index.php?page=cart'>Cart</a></li>";
                        if($_SESSION['korisnik']->idRole == "1"){
                            $ispis.="<li class='nav-item'><a
                        class='nav-link' href='index.php?page=admin'>Admin</a></li>";
                        }
                        $ispis.="<li class='nav-item'><a
                        class='nav-link' href='index.php?page=user'>".$_SESSION['korisnik']->firstName."</a></li>";
                        $ispis.="<li class='nav-item'><a
                        class='nav-link' href='models/log_reg/logout.php'>Log Out</a></li>";

                    } else {
                        $ispis.="<li class='nav-item'><a
                        class='nav-link' href='index.php?page=login'>Log In</a></li>";
                    }
                    $ispis.="</ul>";
                    echo $ispis;

                       
                }
            ?>  
        </div>
    </div>
