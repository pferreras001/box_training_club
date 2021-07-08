function comprobarlink(){
    var link = document.getElementById("link_web").value;
    if (link.includes("http")) {
        alert("Por favor añade el link con el siguiente formato: www.paginaweb.com");
        console.log("devuelvo false");
        return false;
    }
    else{
        console.log("devuelvo true");
        return true;
    }
}