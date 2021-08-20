const form = document.getElementById("form-borrar");

// SEND BUTTON
form.addEventListener('submit',(e)=>{
    e.preventDefault();
    swal({
        title: "¿Seguro que quiere borrar el dato?",
          text: "Una vez borrado no se podrán recuperar.",
          type: "warning",
          buttons: ["No Borrar", "Borrar"],
        }).then( value =>{
            if(value){
                form.submit();
            }
        })
})