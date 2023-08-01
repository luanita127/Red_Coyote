  /*Desarrolador: Luana Alvarez
  Propósito: Este código recibe la información del formulario en el archivo publicarProducto.php y la envía al archivo publicarProductoDB mediante el metodo
  fetch donde se guardará la información enviada. Por otro lado, este java hace la función del mapa interactivo mediante el uso de id´s y un mapeo; a su
  vez hace un preview de la imagen que se subirá reemplazando la original por la nueva; y genera alerts en caso de que no se reciba toda la información 
  requerida, solicitando al usuario que llene los campos faltantes.*/ 
window.addEventListener("load", () =>
{
    const defaultimg = "../../Statics/media/publicarProducto/img.jpg";
    const img = document.getElementById("default");
    const imagen = document.getElementById("img");
    const formulario = document.getElementById("form-producto");
    const publicar = document.getElementById("btn-publicar");

    /* Hace el prewiew de la imagen */
    imagen.addEventListener("change", e =>
    {
        if(e.target.files[0])
        {
            const reader = new FileReader();
            reader.onload = function (e){
                img.src = e.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    })

    /*Recibe la información del form de producto y la manda por POST*/
    publicar.addEventListener("click", (e) =>
    {
        e.preventDefault();
        datosForm = new FormData(formulario);
        fetch("../php/publicarProductoDB.php", {
            method: "POST",
            body: datosForm
        }).then((respuesta)=>{
            return respuesta.json();
        }).then ((datosJSON)=>{
            // console.log(datosJSON.nombre);
            // console.log(datosJSON.archivo);
            // console.log(datosJSON.descripcion);
            // console.log(datosJSON.costo);
            // console.log(datosJSON.fecha);
            // console.log(datosJSON.lugar);
            // console.log(datosJSON.hora);
            alert(datosJSON.mensaje);
        });

    })

    /*Mapa interactivo*/
    const mapa = document.getElementById("mapa");
    const back = document.getElementById("btn-back");
    const entrada = document.getElementById("Entrada");
    const sextos = document.getElementById("PatioSextos");
    const cuartos = document.getElementById("PatioCuartos");
    const quintos = document.getElementById("PatioQuintos");
    const pulpo = document.getElementById("Pulpo");
    const mesas = document.getElementById("Mesas");
    const canchas = document.getElementById("Canchas");
    const biblio = document.getElementById("Biblio");
    const pimpos = document.getElementById("Pimpos");
    const h = document.getElementById("h");
    const vestidores = document.getElementById("Vestidores");
    const lugar = document.getElementById("lugar")
    
    back.addEventListener("click", () =>{
        mapa.src = "../../Statics/media/puntosPrepa/mapa.jpg";
        lugar.value=("");
    })

    entrada.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/entrada.jpg";
        lugar.value=("Entrada");
    })

    sextos.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/sextos.jpg";
        lugar.value=("Patio de Sextos");
    })

    cuartos.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/cuartos.jpg";
        lugar.value=("Patio de Cuartos");
    })

    quintos.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/quintos.jpg";
        lugar.value=("Patio de Quintos");
    })

    pulpo.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/pulpo.jpg";
        lugar.value=("Pulpo");
    })

    mesas.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/mesas.jpg";
        lugar.value=("Mesas");
    })

    canchas.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/canchas.jpg";
        lugar.value=("Canchas");
    })

    biblio.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/biblio.jpg";
        lugar.value=("Biblioteca");
    })

    pimpos.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/pimpos.jpg";
        lugar.value=("Pimponeras");
    })

    h.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/h.jpg";
        lugar.value=("Los H");
    })

    vestidores.addEventListener("mouseover", (e)=>
    {
        mapa.src = "../../Statics/media/puntosPrepa/vestidores.jpg";
        lugar.value=("Vestidores");
    })
})