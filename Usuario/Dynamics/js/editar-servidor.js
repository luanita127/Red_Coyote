window.addEventListener("load",()=>{
    const editar = document.getElementById("editar");
    const form = document.getElementById("form-club");
    const portadaServer = document.getElementById("PortadaServer");
    const Portada = document.getElementById("Portada");
    const pfpServer = document.getElementById("pfpServer"); //Foto de perfil del server imagen
    const PFPServer = document.getElementById("PFPServer"); //Foto de perfil del server input

    Portada.addEventListener("change", e =>
    {
        if(e.target.files[0])
        {
            const reader = new FileReader();
            reader.onload = function (e){
                portadaServer.src = e.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    })

    PFPServer.addEventListener("change", e =>
    {
        if(e.target.files[0])
        {
            const reader = new FileReader();
            reader.onload = function (e){
                pfpServer.src = e.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    })

    editar.addEventListener("click",(e)=>{
        e.preventDefault();
        datosFORM = new FormData(form);
        fetch("../php/editar-servidor-insercion-datos.php",{
            method: "POST",
            body: datosFORM
        }).then((respuesta)=>{
            return respuesta.text();
        }).then((datosJSON)=>{
            console.log(datosJSON);
            window.location.href = "../php/servidor-creador.php"
        });
    });
});