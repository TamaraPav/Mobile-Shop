$(document).ready(function() {
        checkForProducts();
        document.querySelector("#sendToBase").addEventListener("click", send);

});

function displayCartData(){

    var products = JSON.parse(localStorage.getItem("products"));
    
    var filtered = [];
    
    for (let product of products) {

        filtered.push(product.id);

    }

    $.ajax({
        url: "models/admin/allProducts.php",
        method: "post",
        dataType: "json",
        data: {
            idProduct: filtered
        },
        success: function (data) {

            var showProducts = [];
            products = data.filter(p => {
                for (let prod of products) 
                {
                    if(prod.id == p.idProduct){ 
                        p.q = prod.q;
                        
                        return true;
                        
                    }
                    
                }
                
                return false;
            });
            itemCreation(products);
            
        },
        error: function (x,y,z) {
            showEmptyCart();
            $("#sendToBase").hide();
    }
    });
}

function itemCreation(products) {
    
        let html = ``;
        let br=1;
        for(let p of products) {
            html += "<tr><td>"+br+"</td>";
            
            html += `<td><img src="${p.srcMala}" style='height:20px' alt="${p.alt}" class="img-responsive center">${p.name}</td>
            <td>$${p.price}</td>
            <td>${p.q}</td>
            <td>$${p.price * p.q}</td>
            <td>
                <div>
                    <div class="p-1"><button onclick='removeFromCart(${p.idProduct})'>X</button> </div>
                </div>
            </td>
        </tr>`;
        br++;
        }
    
        $("#itemsInCart").html(html);
}


function showEmptyCart() {
    $("#itemsInCart").html("<tr><td class='center' colspan='6'><h5>Your cart is empty!</h5></td></tr>");
    $("#sendToBase").hide();
}

function removeFromCart(id) {
    let products = JSON.parse(localStorage.getItem("products"));
    let filtered = products.filter(p => p.id != id);

    localStorage.setItem("products", JSON.stringify(filtered));

    checkForProducts();
}
function checkForProducts() {
    let products = JSON.parse(localStorage.getItem("products"));

    if(products == null || products == 0)
        showEmptyCart();
    else
        displayCartData();
}



    
function send(e){
    e.preventDefault();
    console.log("radi");

    var products = JSON.parse(localStorage.getItem("products"));

    products.forEach( function(prod, index) {
        var idUser = prod.idUser;
        var idProduct = prod.id;
        var q = prod.q;
        console.log(idUser);
        $.ajax({
            url: "models/korpa/sendCartToBase.php",
            method: "post",
            dataType: "json",
            data:{
                write: "sent",
                idUser: idUser,
                idProduct: idProduct,
                amount: q
            },
            success: function(data){
                alert(data);
            },
            error: function (xhr, statusText, err) {
                console.log(xhr.status, statusText, err);
            }
        })
    });

    localStorage.removeItem("products");

}