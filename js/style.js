$(document).ready(function () {

    $('#h1').addClass('animated bounceInDown') 
    $('#person').addClass('animated flash') 

    $('._registro').mouseover(function(){
        $('._cuadro-regis').addClass('animated pulse')
    })
    $('._registro').mouseout(function(){
        $('._cuadro-regis').removeClass('animated pulse')
    })


    $("#getWeatherForcast").click(function(){
              
          var city = $("#city").val();
          var key  = '4de3768c62b67fe359758977a3efc069';
          
          $.ajax({
            url:'http://api.openweathermap.org/data/2.5/weather',
            dataType:'json',
            type:'GET',
            data:{q:city, appid: key, units: 'metric'},

            success: function(data){
              var wf = '';
              $.each(data.weather, function(index, val){

                wf += '<p><b>' + data.name + "</b><img src=img/"+ val.icon + ".png></p>"+ data.main.temp + '&deg;C ' + 
                ' | ' + val.main + ", " + val.description 

              });
            
              $(".ShowWeatherForcast").html(wf);
              $('.ShowWeatherForcast').addClass('animated flipInX') 
            }

          })

    });

    var pass = $('.password')
    $('.icono2').hide();

    $('.icono').click(function(){

      $('.icono').hide();
      $('.icono2').show();
      
        if(pass.attr('type') == 'text'){
            pass.attr('type','password')
        }else{
            pass.attr('type','text')
        }
    });
    $('.icono2').click(function(){

      $('.icono2').hide();
      $('.icono').show();
      
        if(pass.attr('type') == 'text'){
            pass.attr('type','password')
        }else{
            pass.attr('type','text')
        }
    });



});