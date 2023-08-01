/*Desarrolador: Luana Alvarez
  Propósito: Este código es el que hace toda la magia, recibe mediante fetch la información enviada de ventasDB.php, es decir, recibe el arreglo con todos 
  los registros en base de datos, este arreglo lo convertimos a un objeto y mediante un forEach() vamos recorriendo cada elemento (localidad) del arreglo, que a su
  vez crea los divs y despliega la información requerida, de esta forma estamos generando el mismo número de divs que de registros hay. Luego de esto con un 
  eventListener en el div que engloba a todos los productos y un target.dataset.id creamos una cookie de acuerdo al id de ese producto(id recibido en el fetch y 
  asignado con el forEach), cookie que se recupera en productoNuevo.php para poder hacer el despliegue de ese unico producto; y a su vez lo redirecciona a la
  página de este despliegue. Por último con un getElementById se reconoce el boton de "+" para que cuando se le de click se redirija al usuario a la vista de publicar
  un producto nuevo.*/ 

window.addEventListener("load", (e)=>{
    e.preventDefault();
    fetch("../php/ventasDB.php")
    .then((respuesta)=>{
        return respuesta.json();
    }).then((datosJSON)=>
    {
        const div = document.getElementById("producto");
        console.log(datosJSON);
        // console.log(datosJSON[0].Nombre);
        //let datos=[datosJSON.Foto, datosJSON.Nombre];
        // for(dato of datosJSON){
        datosJSON.forEach(function(element)
        {
            console.log(element);
            div.innerHTML+=`
            <div class="col-6">
                <div class="p-3">
                    <img src="${element.Foto}" class="img-fluid" alt="producto1" id="imagen" data-id="${element.id}">
                    <p>${element.Nombre}</p>
                </div>
            </div>`;
        })

            const productos = document.getElementById("productos");
            productos.addEventListener("click",(e)=>
            {
                let id = e.target.dataset.id;
                console.log(id)
                document.cookie = "producto=" + id + ";max-age=3600;";
                window.location.href="../php/productoNuevo.php";
            });
        const nuevo = document.getElementById("nuevo");
        nuevo.addEventListener("click",(e)=>{window.location.href="./publicarProducto.php";});    
    });

});