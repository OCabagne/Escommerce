document.addEventListener("DOMContentLoaded", function(){
    var galeriaProducInd = document.getElementsByClassName("galeriaIMG");
    var respuesta = document.getElementById("resultado");
    for(f=0; f<galeriaProducInd.length; f++)
    {
        galeriaProducInd[f].addEventListener("click",clicImagenIndexProducto);
        //galeriaProducInd[f].setAttribute("id",f);
    }
    var json;

    function clicImagenIndexProducto()
    {
        var datos = new FormData();
        datos.append("modelo",String(this.innerHTML));
        var xhr = new XMLHttpRequest();
        xhr.open("POST","../class/ajaxIndex.php", false);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status== 200)
            {
                var resultado = xhr.responseText;
                respuesta.style.display = "none";
                respuesta.innerHTML = resultado;
                console.log(resultado);
            }
        }
        xhr.send(datos);

       //MUESTRA CARACTERISTICAS EN LOS PRODUCTOS
       {"precio":"0","marca":"Escommerce",
       "modelo":"Buttons tweed blazer","caracteristicas":"LORENT INSUT XD XD XD"}
       this.setAttribute("data-title", respuesta.innerHTML);
       respuesta.innerHTML="";
    }
});