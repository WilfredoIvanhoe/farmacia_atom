
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
});

$(document).ready(function() {
    $('select').material_select(); // Selects se inicializan 
});

$(document).ready(function(){
    var ing_max = 20;
    var wrapper = $('#ingredientes_wrapper');
    var btn = $("#agregar_ingredientes");
    var medidas = [$('<option>', {value: "y1", text: "mg"}), $('<option>', {value: "y2", text: "unidades"}),
                   $('<option>', {value: "y3", text: "ml"}), $('<option>', {value: "y4", text: "gotas"}),
                   $('<option>', {value: "y5", text: "grano"}), $('<option>', {value: "y6", text: "lt"})];
    var x = 0;

    $(btn).click(function(e){
        e.preventDefault();
        if(x < ing_max){
            x++;

            //Se crea el contenedor de ingredientes
            var input_field_ing = $('<div>', { class: 'input-field col s4 m5'});
                $(input_field_ing).appendTo('#ingredientes_wrapper');
            
            //Se crea el input de los ingredientes
            var input_ing = $('<input>', {id: 'ingrediente_'+x, class: 'ingrediente', name: 'ingrediente_'+x, 'data-num': x, type: "text"});
            var label_ing = $('<label>', {class: 'active', for: 'ingrediente_'+x});
                $(label_ing).text('Ingrediente Activo '+(x+1));

            //Se ingresan los elementos al contenedor 
            $(input_field_ing).append( input_ing);
            $(input_field_ing).append( label_ing);

            //Se crea el contenedor de concentraciones
            var input_field_con = $('<div>', { class: 'input-field col s4 m5'});
            $(input_field_con).appendTo('#ingredientes_wrapper');

            //Se crea el input de la concentracion
            var input_con = $('<input>', {id: 'concent_'+x, class: 'concent', name: 'concent_'+x, 'data-num': x, type: "text"});
                $(input_con).appendTo('#ingredientes_wrapper');
            var label_con = $('<label>', {class: 'active', for: 'concent_'+x});
                $(label_con).text('Concentración '+(x+1));
            
            //Se ingresan los elemenos al contenedor de ing
            $(input_field_con).append( input_con);
            $(input_field_con).append( label_con);


            //Se crea el contenedor de medidas
            var input_field_med = $('<div>', { class: 'input-field col s4 m2'});
            $(input_field_med).appendTo('#ingredientes_wrapper')
            

            //Se crea el select de las medidas para la concentracion
            var select_med = $('<select>', { id: 'med_'+x, class:'med', name: 'med_'+x});
            medidas.forEach(element => {
                //console.log(element);
                $(select_med).append(element);
            });
           

            var label_med = $('<label>', {for: 'med_'+x})
                $(label_med).text('Medida '+(x+1));

            $(input_field_med).append( select_med);
            $(select_med).material_select(); //Se inicializa por ser una clase de
            $(input_field_med).append( label_med);

            $('input[id=num_ing]').val(x+1);
        }
    });
});

