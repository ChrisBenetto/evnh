$(document).ready(function(){


    $('#cours').hide();
    $('#matiere').hide();
    $('#thematique').hide();
    $('#cible').hide();  
    $('#objectif').hide();
    $('#attentes').hide();
  
    $('input[type=radio][name=cycle]').change(function(){
      var cycle = $(this).val();
      $('#section').change(function(){
      var section = $(this).val();
      $('#cours').hide();
      $('#matiere').hide();
      $('#thematique').hide();
      $('#cible').hide();  
      $('#objectif').hide();
      $('#attentes').hide();
      
  
  //Cas de la formation Générale 
            if (section === "Formation générale")
             {
               $('#cours').show();
             $.ajax({  
                  url:"load_ajax.php",
                  dataType: "html",
                  method:"GET",  
                  data:{section:section},  
                  success:function(data){
  
                       $('#cours').html(data);
                       $('<option selected="selected">Sélectionner le cours</option>').appendTo('#cours'); 
  
                  }  
             });
  
   $('#cours').change(function(){
              $('#matiere').hide();
              $('#thematique').hide();
              $('#cible').hide();  
              $('#objectif').hide();
              $('#attentes').hide();
              $('#button').hide();  
             var cours = $(this).val();
             $('#matiere').show();
             $.ajax({  
                  url:"load_ajax1.php",
                  dataType: "html",
                  method:"GET",  
                  data:{cours:cours},  
                  success:function(data){  
                       $('#matiere').html(data);
                       $('<option selected="selected">Sélectionner la matière</option>').appendTo('#matiere');
                  }  
             });  
        });  
  
  
    $('#matiere').change(function(){ 
             var matiere = $(this).val();
             $('#thematique').hide();
             $('#cible').hide();  
             $('#objectif').hide();
             $('#attentes').show();
             $('#button').show();
             $.ajax({  
                  url:"load_ajax9.php",
                  dataType: "html",
                  method:"GET",  
                  data:{matiere:matiere , cycle:cycle},  
                  success:function(data){
                  console.log(data);  
                       $('#attentes').html(data);
                       $('<option selected="selected">Sélectionner l\'attente</option>').appendTo('#attentes');  
                  }
             });  
        });
  
         }
  
  
  //Cas des Capacites transversales
         else if( section === "Capacités transversales" ){
            $('#cours').show();
             $.ajax({  
                  url:"load_ajax.php",
                  dataType: "html",
                  method:"GET",  
                  data:{section:section},  
                  success:function(data){
  
                       $('#cours').html(data);
                       $('<option selected="selected">Sélectionner le cours</option>').appendTo('#cours'); 
  
                  }  
             });
              $('#cours').change(function(){
              $('#matiere').hide();
              $('#thematique').hide();
              $('#cible').hide();  
              $('#objectif').hide();
              $('#attentes').hide();
             var cours = $(this).val();
             $('#matiere').show();
             $.ajax({  
                  url:"load_ajax1.php",
                  dataType: "html",
                  method:"GET",  
                  data:{cours:cours},  
                  success:function(data){  
                       $('#matiere').html(data);
                       $('<option selected="selected">Sélectionner la matière</option>').appendTo('#matiere');
                  }  
             });  
        });
              $('#matiere').change(function(){
              $('#thematique').hide();
              $('#cible').hide();  
              $('#objectif').hide();
              $('#attentes').hide();  
             var matiere = $(this).val();
             $('#thematique').show();
             $.ajax({  
                  url:"load_ajax8.php",
                  dataType: "html",
                  method:"GET",  
                  data:{matiere:matiere},  
                  success:function(data){  
                       $('#thematique').html(data);
                       $('<option selected="selected">Sélectionner la thématique</option>').appendTo('#thematique');
                  }  
             });  
        });
  
              $('#thematique').change(function(){
  
                $('#cible').hide();  
                $('#objectif').hide();
                $('#attentes').show();
                var thematique = $(this).val();
             $.ajax({  
                  url:"load_ajax7.php",
                  dataType: "html",
                  method:"GET",
                  data:{thematique:thematique , cycle:cycle},
                  success:function(data){
                       $('#attentes').html(data);
                       $('<option selected="selected">Sélectionner l\'attente</option>').appendTo('#attentes');
                  }  
  
             });
           });
  
         }else
    {
  //Cas commun
             $('#cours').show();
             $.ajax({  
                  url:"load_ajax.php",
                  dataType: "html",
                  method:"GET",  
                  data:{section:section},  
                  success:function(data){
  
                       $('#cours').html(data);
                       $('<option selected="selected">Sélectionner le cours</option>').appendTo('#cours'); 
  
                  }  
             });

          
  
   $('#cours').change(function(){
              var cours = $(this).val();
              $('#matiere').hide();
              $('#thematique').hide();
              $('#cible').hide();  
              $('#objectif').hide();
              $('#attentes').hide();
              $('#matiere').show();

             $.ajax({  
                  url:"load_ajax1.php",
                  dataType: "html",
                  method:"GET",  
                  data:{cours:cours},  
                  success:function(data){  
                       $('#matiere').html(data);
                       $('<option selected="selected">Sélectionner la matière</option>').appendTo('#matiere');
                  }  
             });  
        });  
  
  
    $('#matiere').change(function(){ 
             var matiere = $(this).val();
             $('#thematique').hide();
             $('#cible').hide();  
             $('#objectif').hide();
             $('#attentes').hide();
             $('#button').hide();
             $('#thematique').show();
             $.ajax({  
                  url:"load_ajax2.php",
                  dataType: "html",  
                  method:"GET",  
                  data:{matiere:matiere},  
                  success:function(data){
                  console.log(data);  
                       $('#thematique').html(data);
                       $('<option selected="selected">Sélectionner la thématique</option>').appendTo('#thematique');  
                  }
             });  
        });
  
            $('#thematique').change(function(){  
             var thematique = $(this).val();
             $('#cible').hide();  
             $('#objectif').hide();
             $('#attentes').hide();
             $('#button').hide();
             $('#cible').show();
             $.ajax({  
                  url:"load_ajax3.php",
                  dataType: "html",
                  method:"GET",
                  data:{thematique:thematique , cycle:cycle},  
                  success:function(data){  
                       $('#cible').html(data);
                       $('<option selected="selected">Sélectionner la cible</option>').appendTo('#cible');
                  }
             });
        });
  
          $('#cible').change(function(){  
             var cible = $(this).val();
             $('#objectif').hide();
             $('#attentes').hide();
             $('#button').hide();
             $('#objectif').show();
             $.ajax({  
                  url:"load_ajax4.php",
                  dataType: "html",
                  method:"GET",
                  data:{cible:cible , cycle:cycle},
                  success:function(data){
                       $('#objectif').html(data);
                       $('<option selected="selected">Sélectionner l\'objectif</option>').appendTo('#objectif');
                  }  
             });
        });
  
        $('#objectif').change(function(){  
             var objectif = $(this).val();
             $('#attentes').show();
             $('#button').show();
             $.ajax({
                  url:"load_ajax5.php",
                  dataType: "html",
                  method:"GET",  
                  data:{objectif:objectif},
                  success:function(data){  
                       $('#attentes').html(data);
                       $('<option selected="selected">Sélectionner l\'attente</option>').appendTo('#attentes');
                  }
             });
        });
        }
    });
  });
});