function eliminar(id){
    if (confirm("¿Estas seguro de querer eliminar este registro?")) {
        window.location.href = "/box_training_club/public/delete/"+id;
    }
                   
}