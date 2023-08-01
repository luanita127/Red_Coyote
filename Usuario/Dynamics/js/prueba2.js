fetch("./prueba.php", {
    method: "POST",
    body: datosForm
}).then((respuesta)=>{
    console.log (respuesta.json());
})