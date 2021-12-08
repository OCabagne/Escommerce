document.addEventListener("DOMContentLoaded", function(){
    var galeriaProducInd = document.getElementsByClassName("galeriaIMG");

    function clicImagenIndexProducto()
    {
        //GUARDAR EN EL LOCAL STORAGE
        //console.log(this.innerHTML);
       // console.log(typeof(this.innerHTML));
        localStorage.setItem("id",this.id);
    }
    for(f=0; f<galeriaProducInd.length; f++)
    {
        galeriaProducInd[f].addEventListener("click",clicImagenIndexProducto);
        galeriaProducInd[f].setAttribute("id", (100+f));
    }
});