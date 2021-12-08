document.addEventListener("DOMContentLoaded", function(){
    var galeriaProducInd = document.getElementsByClassName("galeriaIMG");

    function clicImagenIndexProducto()
    {
        //VARIABLES LOCALES DE FUNCION
        var urlSet = this.parentNode.parentNode.parentNode.childNodes[1].getAttribute("data-setbg");

        //GUARDAR EN EL LOCAL STORAGE

        localStorage.setItem("urlIMG", urlSet);
        //console.log(this.innerHTML);
       // console.log(typeof(this.innerHTML));
        localStorage.setItem("modelo",this.innerHTML);
    }
    for(f=0; f<galeriaProducInd.length; f++)
    {
        galeriaProducInd[f].addEventListener("click",clicImagenIndexProducto);
    }
});