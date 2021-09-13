jQuery(document).ready(function($) {

$("#logujSe").click(checkLog);

});

function checkLog(){

    var email = document.querySelector("#tbEmail");
    var pass = document.querySelector("#tbPass");
    var displayErrors = document.querySelector("#err");

    var reEmail = /^([a-z0-9]+\.*)+@(gmail|hotmail|yahoo|ict\.edu)\.(com|rs)$/;
    var rePass = /^[a-z0-9]{6,20}$/;

    var errors = [];

    if(!reEmail.test(email.value)){
        $("#tbEmail").addClass("error");
        errors.push("Email is not correct!");
    }
    else{
        $("#tbEmail").removeClass("error");
    }
    if(!rePass.test(pass.value)){
        $("#tbPass").addClass("error");
        errors.push("Password is not correct!");
    }
    else{
        $("#tbPass").removeClass("error");
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