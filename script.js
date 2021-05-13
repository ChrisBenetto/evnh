$(document).ready(function(){


  $('#cours').hide();
  $('#matiere').hide();
  $('#thematique').hide();
  $('#cible').hide();  
  $('#objectif').hide();
  $('#attentes').hide();
  $('#button').hide();
  $('#activite1').hide();
  $('#activite2').hide();
  $('#activite3').hide();
  $('#activite4').hide();
  $('#activite5').hide();
  $('#activite6').hide();
  $('#activite7').hide();
  $('#activite8').hide();
  $('#activite9').hide();
  $('#activite10').hide();

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
    $('#button').hide();
    

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
            var cours = $(this).val();
            $('#matiere').hide();
            $('#thematique').hide();
            $('#cible').hide();  
            $('#objectif').hide();
            $('#attentes').hide();
            $('#button').hide(); 
           
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
              var thematique = $(this).val();
              $('#cible').hide();  
              $('#objectif').hide();
              $('#attentes').show();
              $('#button').show();
              
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
            $('#button').hide();  
           
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


      $('#button').click(function(){
        var attentes = $('#attentes').val();
        console.log(attentes);
        if ($.trim($("#activite1").text()).length == 0)
        {

          $('<h2> Attente n°1 </h2>').appendTo('#activite1');
          $('<div id="domaine1">').html(attentes).appendTo('#activite1');
          $('<input type="hidden" name="domaine1" value="' + attentes + '">').html(attentes).appendTo('#activite1');
          $('<i class="remove1 fa fa-trash"></i>').appendTo('#activite1');
          $('#activite1').show();

    }else if ($.trim($("#activite2").text()).length == 0){

          $('<h2> Attente n°2 </h2>').appendTo('#activite2');
          $('<div id="domaine2">').html(attentes).appendTo('#activite2');
          $('<input type="hidden" name="domaine2" value="' + attentes + '">').html(attentes).appendTo('#activite2');
          $('<i class="remove2 fa fa-trash"></i>').appendTo('#activite2');
          $('#activite2').show();



    }else if ($.trim($("#activite3").text()).length == 0){

          $('<h2> Attente n°3 </h2>').appendTo('#activite3');
          $('<div id="domaine3">').html(attentes).appendTo('#activite3');
          $('<input type="hidden" name="domaine3" value="' + attentes + '">').html(attentes).appendTo('#activite3');
          $('<i class="remove3 fa fa-trash"></i>').appendTo('#activite3');
          $('#activite3').show();
          


    }else if ($.trim($("#activite4").text()).length == 0){

          $('<h2> Attente n°4 </h2>').appendTo('#activite4');
          $('<div id="domaine4">').html(attentes).appendTo('#activite4');
          $('<input type="hidden" name="domaine4" value="' + attentes + '">').html(attentes).appendTo('#activite4');
          $('<i class="remove4 fa fa-trash"></i>').appendTo('#activite4');
          $('#activite4').show();
          


    }else if ($.trim($("#activite5").text()).length == 0){

          $('<h2> Attente n°5 </h2>').appendTo('#activite5');
          $('<div id="domaine5">').html(attentes).appendTo('#activite5');
          $('<input type="hidden" name="domaine5" value="' + attentes + '">').html(attentes).appendTo('#activite5');
          $('<i class="remove5 fa fa-trash"></i>').appendTo('#activite5');
          $('#activite5').show();
          


    }else if ($.trim($("#activite6").text()).length == 0){

          $('<h2> Attente n°6 </h2>').appendTo('#activite6');
          $('<div id="domaine6">').html(attentes).appendTo('#activite6');
          $('<input type="hidden" name="domaine6" value="' + attentes + '">').html(attentes).appendTo('#activite6');
          $('<i class="remove6 fa fa-trash"></i>').appendTo('#activite6');
          $('#activite6').show();
          


    }else if ($.trim($("#activite7").text()).length == 0){

          $('<h2> Attente n°7 </h2>').appendTo('#activite7');
          $('<div id="domaine7">').html(attentes).appendTo('#activite7');
          $('<input type="hidden" name="domaine7" value="' + attentes + '">').html(attentes).appendTo('#activite7');
          $('<i class="remove7 fa fa-trash"></i>').appendTo('#activite7');
          $('#activite7').show();
          


    }else if ($.trim($("#activite8").text()).length == 0){

          $('<h2> Attente n°8 </h2>').appendTo('#activite8');
          $('<div id="domaine8">').html(attentes).appendTo('#activite8');
          $('<input type="hidden" name="domaine8" value="' + attentes + '">').html(attentes).appendTo('#activite8');
          $('<i class="remove8 fa fa-trash"></i>').appendTo('#activite8');
          $('#activite8').show();
          


    }else if ($.trim($("#activite9").text()).length == 0){

          $('<h2> Attente n°9 </h2>').appendTo('#activite9');
          $('<div id="domaine9">').html(attentes).appendTo('#activite9');
          $('<input type="hidden" name="domaine9" value="' + attentes + '">').html(attentes).appendTo('#activite9');
          $('<i class="remove9 fa fa-trash"></i>').appendTo('#activite9');
          $('#activite9').show();
          


    }else{

      $('<h2> Attente n°10 </h2>').appendTo('#activite10');
          $('<div id="domaine10">').html(attentes).appendTo('#activite10');
          $('<input type="hidden" name="domaine10" value="' + attentes + '">').html(attentes).appendTo('#activite10');
          $('<i class="remove10 fa fa-trash"></i>').appendTo('#activite10');
          $('#activite10').show();
          $('#button').prop("disabled",true);
    }
        $('.remove1').click(function(){
        $('#activite1').empty();
        $('#activite1').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove2').click(function(){
        $('#activite2').empty();
        $('#activite2').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove3').click(function(){
        $('#activite3').empty();
        $('#activite3').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove4').click(function(){
        $('#activite4').empty();
        $('#activite4').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove5').click(function(){
        $('#activite5').empty();
        $('#activite5').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove6').click(function(){
        $('#activite6').empty();
        $('#activite6').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove7').click(function(){
        $('#activite7').empty();
        $('#activite7').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove8').click(function(){
        $('#activite8').empty();
        $('#activite8').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove9').click(function(){
        $('#activite9').empty();
        $('#activite9').hide();
        $('#button').prop("disabled",false);
      });
        $('.remove10').click(function(){
        $('#activite10').empty();
        $('#activite10').hide();
        $('#button').prop("disabled",false);
      });

        });

     $('#searchAttentes').click(function(){
        $('#search').empty();
        $('#ajaxSearch').hide();

      });
     $('#rechercheActi').click(function(){
        var activite = $('#attentes').val();
        console.log(activite);
        $.ajax({
                        url:"load_data3.php",
                        dataType: "json",
                        method:"GET",  
                        data:{activite:activite},  
                                success:function(data){
                                  $('#ajaxSearch').html(data);
                                  $('#ajaxSearch').show();
                                

                }

       });
});
     $('#elevesValidatActi').change(function(){
     var eleves= $(this).val();
     $.ajax({
          url:"showElevesActi.php",
          dataType:"html",
          method:"GET",
          data:{eleves:eleves},
          success:function(data){
              $('#activite').html(data);
              $('<option selected="selected">Sélectionner l\'activité </option>').appendTo('#activite');
          }
     });
});
     $('.showActivite').change(function(){
        var activite = $(this).val();
         $.ajax({  
                url:"showActiviteAjax.php",
                dataType: "html",
                method:"GET",
                data:{activite:activite},  
                success:function(data){
                     
                     $('#result').html(data);
                     $('<p>Choisisser les attentes à ajouter</p>').prependTo('#result');
                }
           });
          });



     $('.activiteAttente').on("click" , function(){
          var attentes = $(this).text();
          console.log(attentes);
          $.ajax({
               url:"infoAttentes.php",
               dataType:"html",
               method:"GET",
               data:{attentes:attentes},
               success:function(result){
                    $('<p>').html(result).appendTo('.infoAttentes');
                    $(".infoAttentes").show();
               }
          });
     });
     $('.infoAttentes').on("click" , function(){
          $(".infoAttentes").empty();
     })
     $('#btnAttente1').on( "click", function(){
          var test = $('#acti1').html();
          console.log(test);
     });
     $('#afficherAttente').on("click" , function(){
          var copieAttente = $('#attentes').val();
          $('#textAttentes').remove();
          $('<p>').html(copieAttente).appendTo('#textAttentes');
     });
});
