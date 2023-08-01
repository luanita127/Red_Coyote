/*Desarrollador: Eduardo Garduño 
Proposito: Este archivo es el encargado de que en registro.php al seleccionar la foto que querremos ocupar de perfil
muestre una vista previa de como se veria*/
window.addEventListener("load", ()=>{
    const fotoPerfil = document.getElementById("fotoPerfil");
    const foto = document.getElementById("foto");
    const agregar = document.getElementById("agregar");

    fotoPerfil.addEventListener("click", ()=>{
        foto.style.display="block";
        agregar.addEventListener("change", e =>{
            if(e.target.files[0]){
                const reader = new FileReader();
                reader.onload = function (e){
                    fotoPerfil.src = e.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        })
    })
})