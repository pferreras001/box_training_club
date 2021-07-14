function comprobarlink(){
    var link = document.getElementById("link_web").value;
    if(link===""){
       
       }
    else{
        if (link.includes("http")) {
            alert("Por favor añade el link con el siguiente formato: www.paginaweb.com");
            return false;
    }
        else{
            var expression = /[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
            var regex = new RegExp(expression);
            if(link.match(regex)){
               return true;
               }
            else{
               alert("Por favor añade el link con el siguiente formato: www.paginaweb.com");
                return false;
               }
        }
    }
}