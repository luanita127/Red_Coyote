window.addEventListener("load", ()=>{
    const principal = document.getElementById("pagPrincipal");
    const ventas = document.getElementById("ventas");
    const objPerdidos = document.getElementById("objPerdidos");
    const comunidad = document.getElementById("comunidad");
    const perfil = document.getElementById("fotitoPerfil");
    const perdi = document.getElementById("perder");

    principal.addEventListener("click", ()=>{
        window.location.href = "../php/Inicio.php"; //... debe de ir la ruta faltante
    })
    ventas.addEventListener("click", ()=>{
        window.location.href = "../php/ventas.php"; //... debe de ir la ruta faltante
    })
    objPerdidos.addEventListener("click", ()=>{
        window.location.href = "../php/objetos.php"; //... debe de ir la ruta faltante
    })
    comunidad.addEventListener("click", ()=>{
        window.location.href = "../php/comunidad.php";
    })
    perfil.addEventListener("click", ()=>{
        window.location.href = "./perfil.php";
    })
    perdi.addEventListener("click", ()=>{
        window.location.href = "../php/publicarObjeto.php";
    })
})