function actualizarEtiquetas() {
  var e = document.getElementById("etiquetas");
    var strUser = e.options[e.selectedIndex].text;
  document.getElementById("tag").innerHTML = strUser;
}
function getselectedtag() {
  return document.getElementById("tag").innerHTML;
}

