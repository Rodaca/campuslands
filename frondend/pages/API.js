const urlread = "http://localhost/ArTeM01-052/campuslands/backend/controlerCampers.php?op=read";
const urlreadOne = "http://localhost/ArTeM01-052/campuslands/backend/controlerCampers.php?op=readOne";
const urlinsert = "http://localhost/ArTeM01-052/campuslands/backend/controlerCampers.php?op=insert";
const urldelete = "http://localhost/ArTeM01-052/campuslands/backend/controlerCampers.php?op=delete";
const urlupdate = "http://localhost/ArTeM01-052/campuslands/backend/controlerCampers.php?op=update";
const urlregion = "http://localhost/ArTeM01-052/campuslands/backend/controlerRegion.php?op=read";



export const getCampers = async ()=>{
    try {
        const dato = await fetch(urlread);
        const datoJson = dato.json();
        return datoJson;
    } catch (error) {
        console.log(error);
    }
}
export const getRegion = async ()=>{
    try {
        const dato = await fetch(urlregion);
        const datoJson = dato.json();
        return datoJson;
    } catch (error) {
        console.log(error);
    }
}

export const nuevoCamper = async(registar)=>{
    try {
        await fetch(urlinsert,{
            method:"POST",
            body:JSON.stringify(registar),
            headers:{'Content-Type':'application/json'}
        })
    } catch (error) {
        console.log(error);
    }
}

export const deleteCamper = async(idCamper)=>{
    try {
        await fetch(`${urldelete}&id=${idCamper}`,{
            method:"DELETE"
        })
    } catch (error) {
        console.log(error);
    }
}

export async function selectOneCamper(id) {
    try {
      const response = await fetch(`${urlreadOne}&id=${id}`);
      const result = await response.json();
      return result;
    } catch (error) {
      console.log(error);
    }
  }
  
  export async function updateCamper(data) {
    try {
      const response = await fetch(urlupdate,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });
    } catch (error) {
      console.log(error);
    }
  }