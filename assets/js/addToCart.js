$(document).ready(function(){
    //console.log("x");
    $(".storage").click(addToCart);
    

});

function productsInCart() {
    return JSON.parse(localStorage.getItem("products"));
}
function addToCart(){
    let id = $(this).data("id");
    

    $.ajax({
        url: "models/korpa/cartGetUser.php",
        method: "post",
        dataType: "json",
        data: {
            zahtev: "sent"
        },
        success: function (data) {
        var idUser = data.idUser;
        console.log(idUser);
        
    
    var products = productsInCart();

    if(products) {

        if(isItInCart()){
            addOneMore();
        }else {
            addToLocalStorage();
        }
    } else {
        addItemToLocalStorage();
    }



function isItInCart(){ 
    x = products.filter(x=> x.id == id).length;
    return x;
    
    
}

function addToLocalStorage(){
    let products = productsInCart();
    products.push({
        id:id,
        idUser: idUser,
        q:1
    });
    localStorage.setItem("products", JSON.stringify(products));
    alert("Item is added to cart!");
}

function addOneMore() {
    let products = productsInCart();
    for (let i in products) {
        if(products[i].id ==id){
            products[i].q++;
            break;
        }
    }
    localStorage.setItem("products", JSON.stringify(products));
    alert("Item is added to cart!");
}

function addItemToLocalStorage(){
    let products = [];
    products[0] = {
        id:id,
        idUser: idUser,
        q:1
    };
    localStorage.setItem("products", JSON.stringify(products));
    alert("Item is added to cart!");
}
}
})
}
