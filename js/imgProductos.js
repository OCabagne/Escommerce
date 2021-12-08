document.addEventListener("DOMContentLoaded", function(){
    var imagenes = document.getElementsByClassName("agregaImg");
    var tituloProduc = document.getElementById("marca-modelo");
    var datosAJAX = document.getElementById("datosRecibidos");
    var urlImagenes = localStorage["urlIMG"];
    var modeloProduc = localStorage["modelo"];

    imagenesProducto();
    peticionDatosAjax();

    function imagenesProducto()
    {
        for(i=0; i<imagenes.length; i++)
        {
            var nodoImg = document.createElement("img");
            nodoImg.setAttribute("src",urlImagenes);
            imagenes[i].appendChild(nodoImg);
        }
        imagenes[imagenes.length-1].setAttribute("href", urlImagenes);
    }
    function peticionDatosAjax()
    {
        var datos = new FormData();
        var xhr = new XMLHttpRequest();
        datos.append("modelo",modeloProduc);
        datosAJAX.style.display = "none";
        tituloProduc.parentNode.childNodes[3].display = "none";
        xhr.open("POST","../class/ajaxIndex.php", true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status== 200)
            {
                var resultado = xhr.responseText;
                datosAJAX.innerHTML = resultado;
                var datos = JSON.parse(datosAJAX.innerHTML);
                datosAJAX.innerHTML = "";
                tituloProduc.innerHTML = datos["marca"]+" "+datos["modelo"];
                tituloProduc.parentNode.childNodes[5].innerHTML = datos["caracteristicas"];
                if(datos["oferta"] == "si")
                {
                    tituloProduc.parentNode.childNodes[3].display = "block";
                    tituloProduc.parentNode.childNodes[3].innerHTML = "OFERTA";
                }
            }
        }
        datosAJAX.innerHTML = "";
        xhr.send(datos);
    }
});