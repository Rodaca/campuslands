import { getCampers,nuevoCamper,deleteCamper,getRegion } from "./API.js";


addEventListener('DOMContentLoaded',()=>{
    cargarCampers();
    cargarRegion();
})

async function cargarCampers(){
    const campers = await getCampers();
    const tabla=document.querySelector('#datos');

    campers.forEach(element => {
        const {idCamper,nombreCamper,apellidoCamper,fechaNac,nombreReg}=element;
        tabla.innerHTML+=`
        <tr>
            <th scope="row">${idCamper}</th>
            <td>${nombreCamper}</td>
            <td>${apellidoCamper}</td>
            <td>${fechaNac}</td>
            <td>${nombreReg}</td>
            <td>
                <a href="#" class="delete btn btn-danger" id="${idCamper}">eliminar</a>
                <a class="btn btn-warning" href="CamperEdit.html?id=${idCamper}">Editar</a>
            </td>

        </tr>
        `
    });
    console.log(clientes);
}
async function cargarRegion(){
    const region = await getRegion();
    const select=document.querySelector("#idReg")
    select.innerHTML=""
    region.forEach(element => {
        const {idReg,nombreReg}=element;
        
        select.innerHTML+=`<option value="${idReg}">${nombreReg}</option>`
    });
}
const formulario =document.querySelector("#registro");
formulario.addEventListener('submit',agregarCamper); 

function agregarCamper(e) {
    

    const nombreCamper = document.querySelector('#nombreCamper').value
    const apellidoCamper = document.querySelector('#apellidoCamper').value
    const fechaNac = document.querySelector('#fechaNac').value
    const idReg = document.querySelector('#idReg').value
    const registro={
        nombreCamper,
        apellidoCamper,
        fechaNac,
        idReg
    }
    console.log(registro);
    
    
    nuevoCamper(registro);
    alert("Nuevo ingreso")
    location.reload();
}



const tabla=document.querySelector('#datos');
tabla.addEventListener('click',borrar);
function borrar(e) {
    if (e.target.classList.contains('delete')) {
        
        const id=e.target.getAttribute('id');
        console.log(id);
        deleteCamper(id);
        
        location.reload();
    }
    
    
}