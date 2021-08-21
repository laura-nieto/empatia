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
          text: "Una vez enviada la información, no se podrán cambiar las respuestas.",
          type: "warning",
          buttons: ["No enviar", "Enviar"],
        }).then( value =>{
            if(value){
                form.submit();
            }
        })
});

// PRUEBA VALANTI
var sumar = function (name) {
    let index1 = $(`input[name=${name}]`)[0],
        index2 = $(`input[name=${name}]`)[1],
        total = parseInt(index1.value) + parseInt(index2.value),
        nameReplace = name.replace('[','').replace(']','')
        id = $(`td#${nameReplace}`);
    
    if (total === 3 || isNaN(total)) {
        console.log('suma 3 o is nan')
        if (!id.hasClass('suma-error')) {
            id.addClass("suma-error");
        }
    }else{
        id.removeClass("suma-error");
    }
}