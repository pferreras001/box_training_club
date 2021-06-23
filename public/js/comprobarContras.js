function comprobarContras(){
    var contra=document.getElementById("password").value;
    var contra2=document.getElementById("password2").value;
    if(contra===contra2){
        console.log(contra);
        console.log(contra2);
        return true;
       }
    else{
        alert("Las contraseñas no coinciden");
        return false;
    }
}