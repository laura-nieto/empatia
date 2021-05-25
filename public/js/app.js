const input = document.getElementById('who-send');
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