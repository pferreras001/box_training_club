function eliminarcolab(id){
    if (confirm("¿Estas seguro de querer eliminar este registro?")) {
        //ON SERVER
        //window.location.href = "/box_training_club/public/eliminar_colab/"+id;
        window.location.href = "/eliminar_colab/"+id;
    }              
}