// CREAR INPUTS CLIMA LABORAL
const divInside = $('.form--clima--div__email');

var typewatch = function(){
    var timer = 0;
    return function(callback){
        clearTimeout (timer);
        timer = setTimeout(callback, 1000);
    }  
}();

var crearInputs = function(){
    var value = $("input#who-send").val()
    for(i=0;i<value;i++){
        divInside.append('<div><label>E-mail</label><input type="email" name="email[]"></input></div>')
    }
    value = 0;
}

// CREAR INPUTS AGREGAR CATEGORIA
const divInsideOpc = $('.form--agregar--opciones');

var inputsOpciones = function(){
    var value = $("input#cant_opcion").val()
    for(i=0;i<value;i++){
        divInsideOpc.append('<div><label>Opcion</label><input type="text" name="opcion[]"></input></div>')
    }
    value = 0;
}

//TEMPORIZADOR
var salida = document.getElementById("temporizador"),
    tiempo = document.getElementById('tiempo'),
    minutos = tiempo.value,
    segundos = 0
    salida.innerHTML = tiempo.value

    intervalo = setInterval(function(){
    if (--segundos < 0){
        segundos = 59;
        minutos--;
    }
      
    if (!minutos && !segundos){
        clearInterval(intervalo);
        //document.getElementById("form-automatizacion").submit();
    }
    salida.innerHTML = minutos + ":" + (segundos < 10 ? "0" + segundos : segundos);
},1000);