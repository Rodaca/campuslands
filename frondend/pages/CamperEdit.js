import { selectOneCamper, updateCamper } from "./API.js";

document.addEventListener("DOMContentLoaded", () => {
  datosCampers();
  editCampers();
  cargarRegion();
});

const edit_nombreCamper = document.querySelector("#nombreCamper");
const edit_apellidoCamper = document.querySelector("#apellidoCamper");
const edit_fechaNac = document.querySelector("#fechaNac");
const edit_idReg = document.querySelector("#idReg");

async function datosCampers() {
  try {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get("id");

    const datos = await selectOneCamper(id);
    console.log(datos[0]);
    edit_nombreCamper.value = datos[0].nombreCamper;
    edit_apellidoCamper.value = datos[0].apellidoCamper;
    edit_fechaNac.value = datos[0].fechaNac;
    edit_idReg.value = datos[0].idReg;
    
  } catch (error) {
    console.log(error);
  }
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
async function editCampers() {
  try {
    formularioEdit.addEventListener("submit", (e) => {
      e.preventDefault();
      const urlParams = new URLSearchParams(window.location.search);
      const id = urlParams.get("id");
      const dataJson = {
        idCamper: id,
        nombre_constructora: edit_nombreCamper.value,
        nit_constructora: edit_apellidoCamper.value,
        nombre_representante: edit_fechaNac.value,
        email_contacto: edit_idReg.value,
        
      };
      console.log(dataJson);
      updateCamper(dataJson);
      alert("Datos actualizados correctamente.");
      window.location = "Camper.html";
    });
  } catch (error) {
    console.log(error);
  }
}