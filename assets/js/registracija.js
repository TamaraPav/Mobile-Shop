jQuery(document).ready(function($) {

    $("#registrujSe").click(checkReg);
    
});  
    function checkReg(){
    
        var firstName = document.querySelector("#tbFirstName");
        var lastName = document.querySelector("#tbLastName");
        var address = document.querySelector("#tbAddress");
        var email = document.querySelector("#tbEmailReg");
        var pass = document.querySelector("#tbPassReg");
        var againPass = document.querySelector("#tbPassAgain");
        var displayErrors = document.querySelector("#err");
    
        var reName = /^[A-Z][a-z]{2,20}$/;
        var reAddress = /^[a-zA-Z0-9\s,.]{3,}$/;
        var reEmail = /^([a-z0-9]+\.*)+@(gmail|hotmail|yahoo|ict\.edu)\.(com|rs)$/;
        var rePass = /^[a-z0-9]{6,20}$/;

        var errors = [];
    
        if(!reName.test(firstName.value)){
            $("#tbFirstName").addClass("error");
            errors.push("First name is not valid, try again. Example: Jeffrey");
        }
        else{
            $("#tbFirstName").removeClass("error");
        }

        if(!reName.test(lastName.value)){
            $("#tbLastName").addClass("error");
            errors.push("Last name is not valid, try again. Example: Smith");
        }
        else{
            $("#tbLastName").removeClass("error");
        }

        if(!reAddress.test(address.value)){
            $("#tbAddress").addClass("error");
            errors.push("Address is not valid, try again. Example: That street 2");
        }
        else{
            $("tbAddress").removeClass("error");
        }
        

        if(!reEmail.test(email.value)){
            $("#tbEmailReg").addClass("error");
            errors.push("Email is not valid, try again. Example: anna@gmail.com");
        }
        else{
            $("#tbEmailReg").removeClass("error");
        }

        if(!rePass.test(pass.value)){
            $("#tbPassReg").addClass("error");
            errors.push("Password has to be at least 6 characters long!");
            
        }
        else{
            $("#tbPassReg").removeClass("error");
        }

        if(pass.value != againPass.value){
            $("#tbPassAgain").addClass("error");
            errors.push("Passwords do not match!");
        }
        else{
            $("#tbPassAgain").removeClass("error");
        }
        if (errors.length !=0) {
            var x = "";
            for (i=0; i<errors.length; i++) {
                x +=  errors[i] + "<br>";
            }
            displayErrors.innerHTML = x;
            return false
        }
        else {
            return true
        }
        
    }