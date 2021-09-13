<?php zabeleziPristupStranici(); ?>
<div class="container-fluid p-0">
    <div class="row m-0 p-0">
        <div class="col-md-3 col-sm-12 pt-2" id="categories">
            <div class="row m-0 p-0">
            <div class="col-4 col-md-12 pt-2">
            <h5 class="pt-5"><a class="text-white" href="index.php?page=products">Brand</a></h5>
            <ul class="pt-3" id="brend">
                <?php 
                    include "views/parts/brend.php";
                ?>
            </ul>
        </div>
        <div class="col-4 col-md-12 pt-2">
            <h5 class="pt-5"><a class="text-white" href="index.php?page=products">OS</a></h5>
            <div id="os" class="pt-4">
            <?php 
                include "views/parts/os.php";
            ?>
            </div>
        </div>
        <div class="col-4 col-md-12 pt-2">
                <h5 class="pt-5"><a class="text-white" href="index.php?page=products">Memory</a></h5>
                <div id="memory" class="pt-4 pb-4">
                    <?php 
                        include "views/parts/memory.php";
                    ?>
                </div>
        </div>

    </div>
    </div>
        <div class="col-md-9 col-sm-12 pt-2">
        <div class="row m-0" id="products">
        <?php 
            include "models/proizvodi/product.php";
        ?>
        </div>
        </div>
    </div>
</div>

