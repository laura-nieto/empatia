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
const tableInput = $(':radio')

tableInput.click(function(){
    let name = $(this).attr('name');
    $(`#${name}`).append(`<div class="form--clima--div__cantidad padding-all"><label>Cantidad de opciones</label><input type="text" id="option_${name}" onKeyUp="typewatch(crearOption(${this.name}));"></div>`)
})

var crearOption = function(id){
    let value = $(`input#option_${id}`).val(),
        div_option = $(`#form--create--dato__option--${id}`);
    for (let i = 0; i < value; i++) {
        div_option.append(`<div class="padding-all form--create--dato__opciones"><label>Opción ${i+1}</label><input type="text" name="${id}[]"></input></div>`)
    }
}