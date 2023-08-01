window.addEventListener("load", () =>
{
    const prueba = document.getElementById("prueba")
    const img = document.getElementById("img") 
    const back = document.getElementById("btn")
    prueba.addEventListener("mouseover", ()=>{
        img.src = "../Statics/media//puntosPrepa/patiocuartos.jpg"
    })

    back.addEventListener("click", () =>{
        img.src = "../Statics/media/puntosPrepa/patiosextos.jpg"
    })
})