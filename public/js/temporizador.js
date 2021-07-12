//TEMPORIZADOR DE ENCUESTA AUTOMATIZACION
var salida = document.getElementById("temporizador"),
    tiempo = document.getElementById('tiempo'),
    minutos = tiempo.value,
    segundos = 0;
    salida.innerHTML = tiempo.value
const form = document.getElementById("form-automatizacion");

    intervalo = setInterval(function(){
        if (--segundos < 0){
            segundos = 59;
            minutos--;
        }
        if (!minutos && !segundos){
            clearInterval(intervalo);
            form.submit();
        }
        salida.innerHTML = minutos + ":" + (segundos < 10 ? "0" + segundos : segundos);
    },1000);

// SEND BUTTON
form.addEventListener('submit',(e)=>{
    e.preventDefault();
    swal({
        title: "¿Seguro que quieres enviar la información?",
          text: "Esta acción ya no se podrá deshacer.",
          type: "warning",
          buttons: ["No enviar", "Enviar"],
        }).then( value =>{
            if(value){
                form.submit();
            }
        })
})