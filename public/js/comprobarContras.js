function comprobarContras(){
    var contra=document.getElementById("password").value;
    var contra2=document.getElementById("password2").value;
    if(contra===contra2){
        console.log(contra);
        console.log(contra2);
        return comprobarLongitud();
       }
    else{
        alert("Las contraseñas no coinciden");
        return false;
    }
}

function comprobarLongitud(){
    var contra=document.getElementById("password").value;
    if(contra.length<6){
        document.getElementById("valido").style.display = "none";
        document.getElementById("error").style.display = "block";
        return false;
    }
    else{
        document.getElementById("error").style.display = "none";
        document.getElementById("valido").style.display ="block";
        return true;
    }
}