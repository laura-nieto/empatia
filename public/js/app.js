// CREAR INPUTS CLIMA LABORAL
const divInside = $('.form--clima--div__email');

var typewatch = function(){
    var timer = 0;
    return function(callback){
        clearTimeout (timer);
        timer = setTimeout(callback, 1000);
    }  
};

var crearInputs = function(){
    let value = $("input#who-send").val()
    for(i=0;i<value;i++){
        divInside.append(`<div id="${i+1}"><label>Nombre</label><input type="text" name="nombre[]"></input><label>E-mail</label><input type="email" name="email[]"></input><button class="btn button--eliminarInput" onclick="event.preventDefault();eliminarInput(${i+1})">Eliminar</button></div>`)
    }
}

var eliminarInput = function(input) {
    let div = $(`div#${input}`);
    div.remove();
}

// CREAR INPUTS AGREGAR CATEGORIA
const checking = $(':checkbox')
var index=0

checking.click(function(){
    let name = $(this).attr('name')

    if (this.checked) {
        let divCrearInput = $(`#${name}`)
        divCrearInput.append(`<div class="form--clima--div__cantidad padding-all"><label>Cantidad de opciones</label><input type="text" id="option_${name}" onKeyUp="typewatch(crearOption(${this.name}));"></div>`)
    }else{
        let divOpciones = $(`#form--create--dato__option--${name}`)

        divOpciones.empty();
        $(`#${name}`).empty();
    }
   
})

var crearOption = function(id){
    let value = $(`input#option_${id}`).val(),
        div_option = $(`#form--create--dato__option--${id}`);
    for (let i = 0; i < value; i++) {
        var asd = $(`<div class="padding-all dg" id="borrar-${id}-${index}"><label>Opción</label><input type="text" name="${id}[]"></input><input type="button" class="btn-eliminar" onclick="event.preventDefault();eliminarInputOpcion(${index},${id})"></input></div>`)
        asd.appendTo(div_option)
        index+=1
    }
}

var eliminarInputOpcion = function(input,id) {
    let div = $(`div#borrar-${id}-${input}`);
    div.remove();
}

// var borrarSeleccion = function(id) {
//     let divOpciones = $(`#form--create--dato__option--${id}`),
//         inputCrear = $(`#${id}`),
//         radio = $(`input[name=${id}]`)
//     divOpciones.remove();
//     inputCrear.remove();
//     radio.removeAttr("checked")
// }