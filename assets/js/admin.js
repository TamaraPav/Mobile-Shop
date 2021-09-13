$(document).ready(function(){
    $("#admin").removeClass("full");
    $("#allUsers").click(showUsers);
    $("#addUser").click(addUsers);
    $("#allProducts").click(showProducts);
    $("#addProd").click(addProducts);
    $("#allPurchases").click(showPurchases);
    
});
function showUsers() {
    $("#logovi").empty();
    $("#izmena").empty();
    var id=$(this).data("id");

    //console.log(id);
    $.ajax({
        url: "models/admin/users/allUsers.php",
        method: "post",
        dataType: "json",
        data: {
            id: id
        },
        success: function (users) {
            //console.log(users);
            userCreation(users);
            
        },
        error: function (err) {
            console.log(err);
    }
    });
}

function userCreation(users){

   let ispis = `
   <a href="models/admin/downloadExcel.php">Download Excel File</a>
   <div class="row m-0 p-2">
   <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">First Name</div>
   <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Last Name</div>
   <div class="col-lg-3 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Email</div>
   <div class="col-lg-4 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Address</div>
   <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Role</div>
   <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Change</div>
   <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Delete</div>
   </div>`;
    for(let u of users) {
        ispis += `<div class="row m-0 p-2">
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">First Name</span>${u.firstName}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Last Name</span>${u.lastName}</div>
                  <div class="col-lg-3 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Email</span>${u.email}</div>
                  <div class="col-lg-4 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Address</span>${u.address}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Role</span>${u.idRole}</div>
                  <div class="col-lg-1 col-md-12 pt-2">
                    <button data-id="${u.idUser}"  class="changeUser">Change</button>
                  </div>
                  <div class="col-lg-1 col-md-12 pt-2">
                    <form action="models/admin/users/deleteUser.php" name="brisanje" method="POST">
                    <input type="hidden" value="${u.idUser}" name="idUser"/>
                    <button type="submit" class="deleteUser">Delete</button>
                    </form>
                  </div>
                  </div>`;
    }
    $("#adminIspis").html(ispis);
    $(".changeUser").click(izmeniKorisnika);
    //$(".deleteUser").click(obrisiKorisnika);

}

function showProducts() {
    $("#logovi").empty();
    $("#izmena").empty();
    $("#admin").removeClass("full");
    var id=$(this).data("id");

    //console.log(id);
    $.ajax({
        url: "models/admin/products/allProducts.php",
        method: "post",
        dataType: "json",
        data: {
            idProduct: id
        },
        success: function (products) {
            console.log(products);
            productCreation(products);
            
        },
        error: function (err) {
            console.log(err);
    }
    });
}

function productCreation(products){

    let ispis = `<div class="row m-0 p-2">
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Name</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Price</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Camera</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Ram</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Memory</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">OS</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Brand</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Image</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Top</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Available</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Change</div>
    <div class="col-lg-1 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Delete</div>
    </div>`;
    for(let p of products) {
        
        ispis += `<div class="row m-0 p-2">
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Name</span>${p.name}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Price</span>${p.price}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Camera</span>${p.camera}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Ram</span>${p.ram}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Memory</span>${p.size}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">OS</span>${p.osName}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Brand</span>${p.brName}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Image</span><img width="25px" src="${p.srcMala}"/></div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Top</span>${p.top}</div>
                  <div class="col-lg-1 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Available</span>${p.naStanju}</div>
                  <div class="col-lg-1 col-md-12 pt-2">
                    <div class="p-1"><button data-id="${p.idProduct}" class="change">Change</button></div>
                  </div>
                  <div class="col-lg-1 col-md-12 pt-2">
                    <form action="models/admin/products/deleteProduct.php" name="brisanje" method="POST">
                    <input type="hidden" value="${p.idProduct}" name="idProduct"/>
                    <button type="submit">Delete</button>
                    </form>
                  </div>
                  </div>`;
    }
    
    $("#adminIspis").html(ispis);
    $(".change").click(izmeniProizvod);

}

function addUsers(){
    $("#logovi").empty();
    $("#izmena").empty();
    $("#admin").removeClass("full");
    createUserForm();
}


function createUserForm(){
    var ispis="";

    ispis=`<div class="row m-0 p-2">
            <div class="col">
            <form id="addUser" action="models/admin/users/addNewUser.php" method="POST" class="text-left py-5" onsubmit="return checkUserData()">
                <div class="form-group">
                    <label for="tbFirstName">First Name</label>
                    <input id="tbFirstName" type="text" class="form-control" name="tbFirstName" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="tbLastName">Last Name</label>
                    <input id="tbLastName" type="text" class="form-control" name="tbLastName" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="tbEmailC">Email</label>
                    <input id="tbEmailC" type="text" class="form-control" name="tbEmailC" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="tbPass">Password</label>
                    <input id="tbPass" type="password" class="form-control" name="tbPass" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="tbAdresaC">Address</label>
                    <input id="tbAdresaC" type="text" class="form-control" name="tbAdresaC" placeholder="Enter address">
                </div>
                <div class="form-group">
                    <label for="tbRole">Role</label>
                    <input id="tbRole" type="text" class="form-control" name="tbRole" placeholder="1-Admin, 2-User">
                </div>
                <button name="userButton" type="submit" class="btn bg-dark text-light right mb-2">Submit</button>
            </form>  
            </div>
    </div>`;
    $("#adminIspis").html(ispis);
}

function addProducts(){
    $("#logovi").empty();
    $("#izmena").empty();
    $("#admin").removeClass("full");

/*     var id=$(this).data("id");


    $.ajax({
        url: "models/admin/spec/getOs.php",
        method: "post",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data){
            //console.log(data);
            createProductForm(data);
        },
        error: function (err) {
            console.log(err);
    }
    });

     */
    createProductForm();
}


function createProductForm(){

/*     let ispis =`<div class="row m-0 p-4">
            <div class="col">
            <form id="addProduct" action="models/admin/addNewProduct.php" method="POST" class="text-left py-5" onsubmit="return checkProductData()">
                <div class="form-group">
                    <label for="tbPrName">Name</label>
                    <input id="tbPrName" type="text" class="form-control" name="tbPrName" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="tbPrPrice">Price</label>
                    <input id="tbPrPrice" type="text" class="form-control" name="tbPrPrice" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="tbPrCamera">Camera</label>
                    <input id="tbPrCamera" type="text" class="form-control" name="tbPrCamera" placeholder="Camera">
                </div>
                <div class="form-group">
                    <label for="tbPrRam">Ram</label>`;

            ispis += `<select name='tbPrRam'><option value="0">Choose</option>`;

            for(let d of data) {
                //console.log(d.idRam);
                if(d.idRam){
                    ispis +=  `<option value='${d.idRam}'>${d.RamName}</option>`;
                }
                
            }

            ispis += `
                    </select>
                </div>
                <div class="form-group">
                    <label for="tbPrMemory">Memory</label>`;

            ispis += `<select name='tbPrMemory'>`;

            for(let d of data) {
                if(d.idMemory){
                    ispis +=  `<option value='${d.idMemory}'>${d.MemoryName}</option>`;
                }
            }

            ispis += `
                    </select>
                </div>
                <div class="form-group">
                    <label for="tbPrOs">OS</label>`;

            ispis += `<select name='tbPrOs'>`;

            for(let d of data) {
                if(d.idOs){
                    ispis +=  `<option value='${d.idOs}'>${d.OsName}</option>`;
                }
            }

            ispis += `
                    </select>
                </div>
                <div class="form-group">
                    <label for="tbPrBrand">Brand</label>`;

            ispis += `<select name='tbPrBrand'>`;

            for(let d of data) {
                if(d.idBrand){
                    ispis+=  `<option value='${d.idBrand}'>${d.BrandName}</option>`;
                }
            }

            ispis += `        
                    </select>
                </div>
                <div class="form-group">
                    <label for="tbPrImage">Image</label>
                    <input id="tbPrImage" type="text" class="form-control" name="tbPrImage" placeholder="Image's ID">
                </div>
                <div class="form-group">
                    <label for="tbPrTop">Is it a top product?</label>
                    <input id="tbPrTop" type="text" class="form-control" name="tbPrTop" placeholder="1-Yes, 0-No">
                </div>
                <div class="form-group">
                    <label for="tbPrAvailable">Is it available for selling?</label>
                    <input id="tbPrAvailable" type="text" class="form-control" name="tbPrAvailable" placeholder="1-Yes, 0-No">
                </div>
                <button name="productButton" type="submit" class="btn bg-dark text-light right mb-2">Submit</button>
            </form>  
            </div>
    </div>`; */


    let ispis=`<div class="row m-0 p-4">
            <div class="col">
            <form id="addProduct" action="models/admin/products/addNewProduct.php" method="POST" class="text-left py-5" onsubmit="return checkProductData()" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tbPrName">Name</label>
                    <input id="tbPrName" type="text" class="form-control" name="tbPrName" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="tbPrPrice">Price</label>
                    <input id="tbPrPrice" type="text" class="form-control" name="tbPrPrice" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="tbPrCamera">Camera</label>
                    <input id="tbPrCamera" type="text" class="form-control" name="tbPrCamera" placeholder="Camera">
                </div>
                <div class="form-group">
                    <label for="tbPrRam">Ram</label>
                    <input id="tbPrRam" type="text" class="form-control" name="tbPrRam" placeholder="1-2GB, 2-2GB, 3-4GB, 4-8GB, 5-16GB">
                </div>
                <div class="form-group">
                    <label for="tbPrMemory">Memory</label>
                    <input id="tbPrMemory" type="text" class="form-control" name="tbPrMemory" placeholder="1-256GB, 2-128GB, 3-64GB, 4-32GB">
                </div>
                <div class="form-group">
                    <label for="tbPrOs">OS</label>
                    <input id="tbPrOs" type="text" class="form-control" name="tbPrOs" placeholder="1-iOs, 2-Android">
                </div>
                <div class="form-group">
                    <label for="tbPrBrand">Brand</label>
                    <input id="tbPrBrand" type="text" class="form-control" name="tbPrBrand" placeholder="1-Apple, 2-Honor, 3-Huawei, 4-Samsung, 5-Xiaomi,">
                </div>
                <div class="form-group">
                    <label for="tbPrImage">Image</label>
                    <input id="tbPrImage" type="file" class="form-control" name="tbPrImage">
                </div>
                <div class="form-group">
                    <label for="tbPrTop">Is it a top product?</label>
                    <input id="tbPrTop" type="text" class="form-control" name="tbPrTop" placeholder="1-Yes, 0-No">
                </div>
                <div class="form-group">
                    <label for="tbPrAvailable">Is it available for selling?</label>
                    <input id="tbPrAvailable" type="text" class="form-control" name="tbPrAvailable" placeholder="1-Yes, 0-No">
                </div>
                <button name="productButton" type="submit" class="btn bg-dark text-light right mb-2">Submit</button>
            </form>  
            </div>
    </div>`;

    $("#adminIspis").html(ispis);
    
}

function checkUserData() {
    var  fName= document.querySelector("#tbFirstName");
    var  lName= document.querySelector("#tbLastName");
    var  email= document.querySelector("#tbEmailC");
    var  pass= document.querySelector("#tbPass");
    var  address= document.querySelector("#tbAdresaC");
    var  role= document.querySelector("#tbRole");

    var reName = /^[A-Z][a-z]{2,20}$/;
    var reAddress = /^[a-zA-Z0-9\s,.]{3,}$/;
    var reEmail = /^([a-z0-9]+\.*)+@(gmail|hotmail|yahoo|ict\.edu)\.(com|rs)$/;
    var rePass = /^[a-z0-9]{6,20}$/;
    var reRole =/^(1|2)$/;

    if(!reName.test(fName.value)){
        $("#tbFirstName").addClass("error");
        return false
    }
    else{
        $("#tbFirstName").removeClass("error");
        //console.log("bla");
    }

    if(!reName.test(lName.value)){
        $("#tbLastName").addClass("error");
        return false
    }
    else{
        $("#tbLastName").removeClass("error");
    }

    if(!reEmail.test(email.value)){
        $("#tbEmailC").addClass("error");
        return false
    }
    else{
        $("#tbEmailC").removeClass("error");
    }

    if(!rePass.test(pass.value)){
        $("#tbPass").addClass("error");
        return false
    }
    else{
        $("#tbPass").removeClass("error");
    }
    
    if(!reAddress.test(address.value)){
        $("#tbAdresaC").addClass("error");
        return false
    }
    else{
        $("#tbAdresaC").removeClass("error");
    }
    

    if(!reRole.test(role.value)){
        $("#tbRole").addClass("error");
        return false
    }
    else{
        $("#tbRole").removeClass("error");
    }
    
    return true
}
function checkProductUpdateData() {
    var  pName= document.querySelector("#tbPrName");
    var  pPrice= document.querySelector("#tbPrPrice");
    var  pTop= document.querySelector("#tbPrTop");
    var  pAvailable= document.querySelector("#tbPrAvailable");
 
    var reName = /^[a-zA-Z0-9\s,.]{3,}$/;
    var rePrice = /^[1-9][0-9]{1,}$/;
    var reTop = /^(1|0)$/;
    var reAvailable = /^(1|0)$/;

    if(!reName.test(pName.value)){
        $("#tbPrName").addClass("error");
        return false
    }
    else{
        $("#tbPrName").removeClass("error");
    }

    if(!rePrice.test(pPrice.value)){
        $("#tbPrPrice").addClass("error");
        return false
    }
    else{
        $("#tbPrPrice").removeClass("error");
    }

    if(!reCamera.test(pCamera.value)){
        $("#tbPrCamera").addClass("error");
        return false
    }
    else{
        $("tbPrCamera").removeClass("error");
    }

    if(!reTop.test(pTop.value)){
        $("#tbPrTop").addClass("error");
        return false
    }
    else{
        $("#tbPrTop").removeClass("error");
    }

    if(!reAvailable.test(pAvailable.value)){
        $("#tbPrAvailable").addClass("error");
        return false
    }
    else{
        $("#tbPrAvailable").removeClass("error");
    }
    
    return true
}
function checkProductData() {
    var  pName= document.querySelector("#tbPrName");
    var  pPrice= document.querySelector("#tbPrPrice");
    var  pCamera= document.querySelector("#tbPrCamera");
    var  pRam= document.querySelector("#tbPrRam");
    var  pMemory= document.querySelector("#tbPrMemory");
    var  pOs= document.querySelector("#tbPrOs");
    var  pBrand= document.querySelector("#tbPrBrand");
    var  pTop= document.querySelector("#tbPrTop");
    var  pAvailable= document.querySelector("#tbPrAvailable");
 
    var reName = /^[a-zA-Z0-9\s,.]{3,}$/;
    var rePrice = /^[1-9][0-9]{1,}$/;
    var reCamera = /^([0-9]{1,3}(\s\+\s)*)*$/;
    var reRam = /^[1-9]{1,3}$/;
    var reMemory = /^[1-9]{1,3}$/;
    var reOs = /^(1|2)$/;
    var rebrand = /^(1|2|3|4|5)$/;
    var reTop = /^(1|0)$/;
    var reAvailable = /^(1|0)$/;

    if(!reName.test(pName.value)){
        $("#tbPrName").addClass("error");
        return false
    }
    else{
        $("#tbPrName").removeClass("error");
    }

    if(!rePrice.test(pPrice.value)){
        $("#tbPrPrice").addClass("error");
        return false
    }
    else{
        $("#tbPrPrice").removeClass("error");
    }

    if(!reCamera.test(pCamera.value)){
        $("#tbPrCamera").addClass("error");
        return false
    }
    else{
        $("tbPrCamera").removeClass("error");
    }
    

    if(!reRam.test(pRam.value)){
        $("#tbPrRam").addClass("error");
        return false
    }
    else{
        $("#tbPrRam").removeClass("error");
    }

    if(!reMemory.test(pMemory.value)){
        $("#tbPrMemory").addClass("error");
        return false
    }
    else{
        $("#tbPrMemory").removeClass("error");
    }

    if(!reOs.test(pOs.value)){
        $("#tbPrOs").addClass("error");
        return false
    }
    else{
        $("#tbPrOs").removeClass("error");
    }

    if(!rebrand.test(pBrand.value)){
        $("#tbPrBrand").addClass("error");
        return false
    }
    else{
        $("#tbPrBrand").removeClass("error");
    }

    if(!reTop.test(pTop.value)){
        $("#tbPrTop").addClass("error");
        return false
    }
    else{
        $("#tbPrTop").removeClass("error");
    }

    if(!reAvailable.test(pAvailable.value)){
        $("#tbPrAvailable").addClass("error");
        return false
    }
    else{
        $("#tbPrAvailable").removeClass("error");
    }
    
    return true
}


function izmeniProizvod(){
    $("#admin").removeClass("full");
    var idProduct = $(this).data("id");

    $.ajax({
        url: "models/admin/products/allProducts.php",
        method: "post",
        dataType: "json",
        data: {
            idProduct: idProduct
        },
        success: function (products) {
            var ispis="";
            for(let p of products) {
                if(p.idProduct == idProduct) {
                    ispis+=`<div class="row m-0 p-4">
            <div class="col">
            <form id="addProduct" action="models/admin/products/updateProduct.php" method="POST" class="text-left py-5" onsubmit="return checkProductUpdateData()">
                <div class="form-group">
                    <label for="productId">Product Id</label>
                    <input id="productId" type="text" class="form-control" name="productId" value="${p.idProduct}" readonly>
                </div>
                <div class="form-group">
                    <label for="tbPrName">Name</label>
                    <input id="tbPrName" type="text" class="form-control" name="tbPrName" value="${p.name}">
                </div>
                <div class="form-group">
                    <label for="tbPrPrice">Price</label>
                    <input id="tbPrPrice" type="text" class="form-control" name="tbPrPrice" value="${p.price}">
                </div>
                <div class="form-group">
                    <label for="tbPrTop">Is it a top product?</label>
                    <input id="tbPrTop" type="text" class="form-control" name="tbPrTop" value="${p.top}">
                </div>
                <div class="form-group">
                    <label for="tbPrAvailable">Is it available for selling?</label>
                    <input id="tbPrAvailable" type="text" class="form-control" name="tbPrAvailable" value="${p.naStanju}">
                </div>
                <button name="productUpButton" type="submit" class="btn bg-dark text-light right mb-2">Submit</button>
            </form>  
            </div>
    </div>`;
                }
            }
                
            $("#izmena").html(ispis);
            
        },
        error: function (err) {
            console.log(err);
    }
    });

}

function izmeniKorisnika() {
    $("#admin").removeClass("full");
    var idUser = $(this).data("id");
    
    $.ajax({
        url: "models/admin/users/allUsers.php",
        method: "post",
        dataType: "json",
        data: {
            id: idUser
        },
        success: function (users) {
            var ispis="";
            for(let u of users) {
                if(u.idUser == idUser) { 
                    ispis+=`<div class="row m-0 p-2">
            <div class="col">
            <form id="addUser" action="models/admin/users/updateUser.php" method="POST" class="text-left py-5" onsubmit="return checkUserData()">
                <div class="form-group">
                    <label for="userId">User Id</label>
                    <input id="userId" type="text" class="form-control" name="userId" value="${u.idUser}" readonly>
                </div>
                <div class="form-group">
                    <label for="tbFirstName">First Name</label>
                    <input id="tbFirstName" type="text" class="form-control" name="tbFirstName" value="${u.firstName}">
                </div>
                <div class="form-group">
                    <label for="tbLastName">Last Name</label>
                    <input id="tbLastName" type="text" class="form-control" name="tbLastName" value="${u.lastName}">
                </div>
                <div class="form-group">
                    <label for="tbEmail">Email</label>
                    <input id="tbEmail" type="text" class="form-control" name="tbEmail" value="${u.email}">
                </div>
                <div class="form-group">
                    <label for="tbPass">Password</label>
                    <input id="tbPass" type="password" class="form-control" name="tbPass" value="${u.pass}">
                </div>
                <div class="form-group">
                    <label for="tbAdresa">Address</label>
                    <input id="tbAdresa" type="text" class="form-control" name="tbAdresa" value="${u.address}">
                </div>
                <div class="form-group">
                    <label for="tbRole">Role</label>
                    <input id="tbRole" type="text" class="form-control" name="tbRole" value="${u.idRole}">
                </div>
                <button name="userUpButton" type="submit" class="btn bg-dark text-light right mb-2">Submit</button>
            </form>  
            </div>
    </div>`;
                }
            }
            $("#izmena").html(ispis);
            
        },
        error: function (err) {
            console.log(err);
    }
    });
}

function showPurchases(){
    $("#admin").addClass("full");
    $("#logovi").empty();
    $("#izmena").empty();
    var id=$(this).data("id");
    $.ajax({
        url: "models/admin/allPurchases.php",
        method: "post",
        dataType: "json",
        data: {
            idPurchase: id
        },
        success: function (purchases) {
            //console.log(purchases);
            purchaseCreation(purchases);
            
        },
        error: function (err) {
            console.log(err);
    }
    });
}

function purchaseCreation(purchases){
    let ispis = `<div class="row m-0 p-2">
   <div class="col-lg-3 d-none d-lg-block d-xl-block border-bottom border-dark text-right">First Name</div>
   <div class="col-lg-3 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Last Name</div>
   <div class="col-lg-3 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Product</div>
   <div class="col-lg-3 d-none d-lg-block d-xl-block border-bottom border-dark text-right">Amount</div>
   </div>`;
    for(let p of purchases) {
        ispis += `<div class="row m-0 p-2">
                  <div class="col-lg-3 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">First Name</span>${p.firstName}</div>
                  <div class="col-lg-3 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Last Name</span>${p.lastName}</div>
                  <div class="col-lg-3 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Product</span>${p.brName} ${p.name}</div>
                  <div class="col-lg-3 col-md-12 pt-2 text-right border-bottom border-dark"><span class="left d-lg-none d-xl-none">Amount</span>${p.amount}</div>
                  </div>`;
    }
    $("#adminIspis").html(ispis);
}

function obrisiKorisnika(id){
    var id=$(this).data("id");

    $.ajax({
        url: "models/admin/users/deleteUser.php",
        method: "post",
        dataType: "json",
        data: {
            id: id
        },
        success: function () {
            console.log('radi');
            showUsers();
            
        },
        error: function (err) {
            console.log(err);
    }
    });
    
    
}