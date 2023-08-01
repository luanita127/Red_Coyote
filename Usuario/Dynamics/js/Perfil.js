/*Desarrollador: Eduardo Garduño 
Proposito: Este archivo es el encargado de recibir toda la informacion que esta en perfil.php para que con peticiones 
fetch podamos editarla, estas mandan la informacion a un php que se encarga de hacerle peticiones a la base de datos para 
poder actualizarla y asi los datos de los usuarios pueda ser cambiada*/
window.addEventListener("load",()=>{
    const EDITAR = document.getElementById("Editar");
    const SALIR = document.getElementById("Salir");
    const listo = document.getElementById("listo");
    const fotitoPerfil = document.getElementById("editFotitoPerfil");
    const contraseña = document.getElementById("contraseña");
    const nombre = document.getElementById("nombre");
    const celular = document.getElementById("celular");
    const instagram = document.getElementById("instagram");
    const oculto = document.getElementById("oculto");
    const agregar = document.getElementById("agregar");
    const sesion = document.querySelectorAll(".sesion");
    const info = document.getElementsByClassName("info");
    const actualizar = document.createElement("div");
    const nomOculto = document.getElementById("nomOculto")
    const celOculto = document.getElementById("celOculto")
    const instOculto = document.getElementById("instOculto")

    SALIR.addEventListener("click", ()=>{
        window.location.href="../php/cerrarSesion.php";
    });
    EDITAR.addEventListener("click",()=>{
        EDITAR.style.display="none";
        listo.style.display="block";
        nomOculto.style.display="block";
        celOculto.style.display="block";
        instOculto.style.display="block";
        for(i=0; i<sesion.length; i++)
            sesion[i].style.display="none";
        fotitoPerfil.addEventListener("click",()=>{
            oculto.style.display="flex";
        })
    })
    agregar.addEventListener("change", e =>{
        if(e.target.files[0]){
            const reader = new FileReader();
            reader.onload = function (e){
                fotitoPerfil.src = e.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
        agregar.dataset.img = e.target.files[0]
        agregar.foto = agregar.files[0]
    })
    listo.addEventListener("click", ()=>{
        console.log(agregar.foto)
        const valorNom= nomOculto.value;
        const valorCel= celOculto.value;
        const valorInst= instOculto.value;
        EDITAR.style.display="block";
        listo.style.display="none";
        oculto.style.display="none";
        nomOculto.style.display="none";
        celOculto.style.display="none";
        instOculto.style.display="none";
        for(i=0; i<sesion.length; i++)
            sesion[i].style.display="block";
        let datosForm = new FormData();
        datosForm.append("nomImg", agregar.dataset.img);
        datosForm.append("img", agregar.foto);
        datosForm.append("nombre", valorNom);
        datosForm.append("celular", valorCel);
        datosForm.append("instagram", valorInst);
        fetch("./editar.php", {
            method: "POST",
            body: datosForm
        }).then((respuesta)=>{
            return respuesta.json();
        }).then((datosJSON)=>{
            alert(datosJSON.mensaje);
            window.location.reload();
        })
    })
});