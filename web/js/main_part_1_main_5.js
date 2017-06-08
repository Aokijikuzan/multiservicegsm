$("document").ready(function() { 
    $(".marq").ready(function() {
            $.ajax({
               type: 'get',
               url: ' http://127.0.0.1:8000/allMarque',
	       beforeSend: function() {
                   $(".marq option").remove(),$(".model option").remove(), $(".reparat option").remove(), $(".btnprix").prop('disabled', true);
               },
               success: function(data) {
		   $(".marq").append($('<option>', {value: 'choix', disabled:"disabled", selected : "selected", text: 'Choisir une marque'})),
                   $.each(data.marque, function(index,value) {
                       $(".marq").append($('<option>',{ value : value , text: value }));
                   });
               }
            });
    });


    $(".marq").change(function() {
            $.ajax({
               type: 'get',
               url: 'http://127.0.0.1:8000/modele/' + $(this).val(),
	       beforeSend: function() {
                   $(".model option").remove(), $(".reparat option").remove();
               },
               success: function(data) {
		   $(".model").append($('<option>', {value: 'choix', disabled:"disabled", selected : "selected", text: 'Choisir un modele'})),
                   $.each(data.modele, function(index,value) {
                       $(".model").append($('<option>',{ value : value , text: value }));
                   });
               }
            });
    });

    $(".model").change(function() {
            $.ajax({
               type: 'get',
               url: 'http://127.0.0.1:8000/'+ $(this).val()+'/reparation' ,
	       beforeSend: function() {
                   $(".reparat option").remove();
               },
               success: function(data) {
		   $(".reparat").append($('<option>', {value: 'choix', disabled:"disabled", selected : "selected", text: 'Choisir une reparation'})),
                   $.each(data.reparation, function(index,value) {
                       $(".reparat").append($('<option>',{ value : value , text: value }));
                   });
               }
            });
    });
});
