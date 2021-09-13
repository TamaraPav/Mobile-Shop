window.onload = function (){
    $("#sendMessage").click(function(event){
        event.preventDefault();
        checkForm();
    });
}

function checkForm() {

    var poljeName = document.querySelector("#name");
    var poljeEmail = document.querySelector("#email");   
    var poljeModel = document.querySelector("#model");
    var dropBrand = document.querySelector("#fBrend");
    var poljeMessage = document.querySelector("#message");
    var displayErrors = document.querySelector("#err");


    var reName, reEmail, reModel;

    reName = /^[A-Z][a-z]{1,12}(\s[A-Z][a-z]{1,19})*$/;
    reModel = /^[A-Za-z0-9]{2,16}$/;
    reEmail = /^\w+([.-]?[\w\d]+)*@\w+([.-]?[\w]+)*(\.\w{2,4})+$/;

    var errors = [];


    if(poljeName.value == ""){
        poljeName.classList.add("error");
        errors.push("Name field cannot be empty!");
    }
    else{
        if(!reName.test(poljeName.value)){
            poljeName.classList.add("error");
            errors.push("Name is not valid, try again. Example: Jeffrey");
        }else{
            poljeName.classList.remove("error");
        }
    }


    if(poljeEmail.value == ""){
        poljeEmail.classList.add("error");
        errors.push("Email field cannot be empty!");

    }
    else{
        if(!reEmail.test(poljeEmail.value)){
            poljeEmail.classList.add("error");
            errors.push("Email is not valid, try again. Example: anna@gmail.com");
        }else{
            poljeEmail.classList.remove("error");
        }
    }
  

    if(poljeModel.value == ""){
        poljeModel.classList.add("error");
        errors.push("Model field cannot be empty!");

    }
    else{
        if(!reModel.test(poljeModel.value)){
            poljeModel.classList.add("error");
            errors.push("Model is not valid, try again. Example: 7edge");
        }else{
            poljeModel.classList.remove("error");
        }
    }

    if(dropBrand.value == 0){
        dropBrand.classList.add("error");
        errors.push("You need to choose a brand!");
    }
    else{        
        dropBrand.classList.remove("error");
    }

    if(poljeMessage.value == ""){
        poljeMessage.classList.add("error");
        errors.push("Message field cannot be empty!");
    }
    else{
        poljeMessage.classList.remove("error");
        }

        console.log(errors);

    if (errors.length !=0) {
        var x = "";
        for (i=0; i<errors.length; i++) {
            x +=  errors[i] + "<br>";
        }
        displayErrors.innerHTML = x;
    }
    else {
        alert("Message sent successfully!");
        displayErrors.innerHTML = "";
    }
}

